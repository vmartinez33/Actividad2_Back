<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class DirectorController extends Controller
{
    const PAGINATE_SIZE = 5;

    public function index(Request $request) {

        $directorName = null;
        if($request->has('directorName')) {
            $directorName = $request->directorName;
            $directors = Director::where('name', 'like', '%' . $directorName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $directors = Director::paginate(self::PAGINATE_SIZE);
        }

        return view('directors.index', ['directors' => $directors, 'directorName' => $directorName]);
    }

    public function create() {
        return view('directors.create');
    }

    public function store(Request $request) {
        $this->validateDirector($request)->validate();

        $director = new Director();
        $director->name = $request->directorName;
        $director->first_surname = $request->directorFirstSurname;
        $director->second_surname = $request->directorSecondSurname;
        $director->dni = $request->directorDni;
        $director->birth_date = $request->directorBirthDate;
        $director->nationality = $request->directorNationality;
        $director->save();

        return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_created_successfully'));
    }

    public function edit(Director $director) {
        return view('directors.create', ['director' => $director]);
    }

    public function update(Request $request, Director $director) {
        $this->validateDirector($request)->validate();

        $director->name = $request->directorName;
        $director->first_surname = $request->directorFirstSurname;
        $director->second_surname = $request->directorSecondSurname;
        $director->dni = $request->directorDni;
        $director->birth_date = $request->directorBirthDate;
        $director->nationality = $request->directorNationality;
        $director->save();

        return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_updated_successfully'));
    }

    public function delete(Request $request, Director $director) {
        if($director != null) {
            $director->delete();
            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_deleted_successfully'));
        }

        return redirect()->route('directors.index')->with('error', Lang::get('alerts.directors_deleted_error'));
    }

    private function validateDirector($request) {
        return Validator::make($request->all(), [
            'directorName' => ['required', 'string', 'max:50'],
            'directorFirstSurname' => ['required', 'string', 'max:50'],
            'directorSecondSurname' => ['nullable', 'string', 'max:50'],
            'directorDni' => ['required', 'string', 'between:9, 10'],
            //'directorBirthDate' => ['date_format:d/m/Y'],
            'directorNationality' => ['required', 'string', 'max:50']
        ]);
    }

}
