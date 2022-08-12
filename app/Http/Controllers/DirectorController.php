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

        $text = null;
        if($request->has('text')) {
            $text = $request->text;
            $directors = Director::where('name', 'like', '%' . $text . '%')->orWhere('first_surname', 'like', '%' . $text . '%')->
            orWhere('second_surname', 'like', '%' . $text . '%')->orWhere('dni', 'like', '%' . $text . '%')->
            orWhere('nationality', 'like', '%' . $text . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $directors = Director::paginate(self::PAGINATE_SIZE);
        }

        return view('directors.index', ['directors' => $directors, 'text' => $text]);
    }

    public function create() {
        return view('directors.create');
    }

    public function store(Request $request) {
        $this->validateDirector($request)->validate();
       
        if($route = $this->validateDni($request)) {
            return $route;
        }else {   
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
    }

    public function edit(Director $director) {
        return view('directors.create', ['director' => $director]);
    }

    public function update(Request $request, Director $director) {
        $this->validateDirector($request)->validate();

        if($route = $this->validateDni($request, $director->id)) {
            return $route;
        }else {   
            $director->name = $request->directorName;
            $director->first_surname = $request->directorFirstSurname;
            $director->second_surname = $request->directorSecondSurname;
            $director->dni = $request->directorDni;
            $director->birth_date = date('Y-m-d', strtotime($request->directorBirthDate));
            $director->nationality = $request->directorNationality;
            $director->save();

            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_updated_successfully'));
        }
    }

    public function delete(Request $request, Director $director) {
        if($director == null) {
            return redirect()->route('directors.index')->with('danger', Lang::get('alerts.directors_deleted_error'));
        } 
        elseif(count($director->series) > 0) {
            return redirect()->route('directors.index')->with('danger', Lang::get('alerts.directors_relation_exists')); 
        }

        $director->delete();
        return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_deleted_successfully'));
    }

    private function validateDirector($request) {
        return Validator::make($request->all(), [
            'directorName' => ['required', 'string', 'max:50'],
            'directorFirstSurname' => ['required', 'string', 'max:50'],
            'directorSecondSurname' => ['nullable', 'string', 'max:50'],
            'directorDni' => ['required', 'string', 'between:9, 10'],
            'directorBirthDate' => ['required', 'date', 'before:today'],
            'directorNationality' => ['required', 'string', 'max:50']
        ]);
    }

    private function validateDni($request, $director_id = 0) {
        if(Director::where([['dni', $request->directorDni], ['id', '!=', $director_id]])->exists()) {
            $request->flashExcept('directorDni');
            return redirect()->back()->with('danger', Lang::get('alerts.directors_dni_exists_error'));
        }
    }

}
