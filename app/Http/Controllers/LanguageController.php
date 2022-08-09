<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    const PAGINATE_SIZE = 5;
    public function index(Request $request) {

        $text = null;
        if($request->has('text')) {
            $text = $request->text;
            $languages = Language::where('name', 'like', '%' . $text . '%')->orWhere('iso_code', 'like', '%' . $text . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $languages = Language::paginate(self::PAGINATE_SIZE);
        }

        return view('languages.index', ['languages' => $languages, 'text' => $text]);

    }

    public function create() {
        return view('languages.create');
    }

    public function store(Request $request) {
        $this->validateLanguage($request)->validate();

        if($route = $this->validateIsoCode($request)) {
            return $route;
        } else {
            $language = new Language();
            $language->name = $request->languageName;
            $language->iso_code = $request->languageIsoCode;
            $language->save();
    
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_created_successfully'));
        }
    }

    public function edit(Language $language) {
        return view('languages.create', ['language' => $language]);
    }

    public function update(Request $request, Language $language) {
        $this->validateLanguage($request)->validate();

        if($route = $this->validateIsoCode($request, $language->id)) {
            return $route;
        } else {
            $language->name = $request->languageName;
            $language->iso_code = $request->languageIsoCode;
            $language->save();

            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_updated_successfully'));
        }
    }

    public function delete(Request $request, Language $language) {
        if($language != null) {
            $language->delete();
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_deleted_successfully'));
        }

        return redirect()->route('languages.index')->with('danger', Lang::get('alerts.languages_deleted_error'));
    }

    private function validateLanguage($request) {
        return Validator::make($request->all(), [
            'languageName' => ['required', 'string', 'max:100'],
            'languageIsoCode' => ['required', 'string', 'max:7']
        ]);
    }

    private function validateIsoCode($request, $language_id = 0) {
        if(Language::where([['iso_code', $request->languageIsoCode], ['id', '!=', $language_id]])->exists()) {
            $request->flashExcept('languageIsoCode');
            return redirect()->back()->with('danger', Lang::get('alerts.languages_iso_code_exists_error'));
        }
    }
}
