<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class ActorController extends Controller
{
    const PAGINATE_SIZE = 5;
    public function index(Request $request) {

        $actorName = null;
        if($request->has('actorName')) {
            $actorName = $request->actorName;
            $actors = Actor::where('name', 'like', '%' . $actorName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $actors = Actor::paginate(self::PAGINATE_SIZE);
        }

        return view('actors.index', ['actors' => $actors, 'actorName' => $actorName]);

    }

    public function create() {
        return view('actors.create');
    }

    public function store(Request $request) {
        $this->validateActor($request)->validate();

        $actor = new Actor();
        $actor->name = $request->actorName;
        $actor->first_surname = $request->actorFirstSurname;
        $actor->second_surname = $request->actorSecondSurname;
        $actor->dni = $request->actorDni;
        $actor->birth_date = $request->actorBirthDate;
        $actor->nationality = $request->actorNationality;
        $actor->save();

        return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_created_successfully'));
    }

    public function edit(Actor $actor) {
        return view('actors.create', ['actor' => $actor]);
    }

    public function update(Request $request, Actor $actor) {
        $this->validateActor($request)->validate();

        $actor->name = $request->actorName;
        $actor->first_surname = $request->actorFirstSurname;
        $actor->second_surname = $request->actorSecondSurname;
        $actor->dni = $request->actorDni;
        $actor->birth_date = $request->actorBirthDate;
        $actor->nationality = $request->actorNationality;
        $actor->save();

        return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_updated_successfully'));
    }

    public function delete(Request $request, Actor $actor) {
        if($actor != null) {
            $actor->delete();
            return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_deleted_successfully'));
        }

        return redirect()->route('actors.index')->with('error', Lang::get('alerts.actors_deleted_error'));
    }

    private function validateActor($request) {
        return Validator::make($request->all(), [
            'actorName' => ['required', 'string', 'max:50'],
            'actorFirstSurname' => ['required', 'string', 'max:50'],
            'actorSecondSurname' => ['nullable', 'string', 'max:50'],
            'actorDni' => ['required', 'string', 'between:9,10'],
            'actorBirthDate' => ['required', 'date', 'before:today'],
            'actorNationality' => ['required', 'string', 'max:50']
        ]);
    }
}
