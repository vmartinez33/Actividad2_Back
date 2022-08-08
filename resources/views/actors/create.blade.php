@extends('layouts.app')

@section('title')
    @isset($actor)
        {{__('strings.edit_title.actor')}}
    @else
        {{__('strings.create_title.actor')}}
    @endisset
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($actor)
                            <h1>{{__('strings.edit_title.actor')}} {{$actor->name}}</h1>
                        @else
                            <h1>{{__('strings.create_title.actor')}}</h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($actor)
                        <form name="edit_actor" action="{{route('actors.update', $actor)}}" method="POST">
                            @csrf
                    @else
                        <form name="create_actor" action="{{route('actors.store')}}" method="POST">
                            @csrf
                    @endisset
                            <div class="mb-3">
                                <label for="actorName" class="form-label">{{__('strings.actor_headers.name')}}</label>
                                <input id="actorName" name="actorName" type="text" placeholder="{{__('strings.actor_placeholders.name')}}" 
                                    class="form-control" required @isset($actor) value="{{old('actorName', $actor->name)}}" 
                                    @else value="{{old('actorName')}}" @endisset>
                                <label for="actorFirstSurname" class="form-label">{{__('strings.actor_headers.first_surname')}}</label>
                                <input id="actorFirstSurname" name="actorFirstSurname" type="text" 
                                    placeholder="{{__('strings.actor_placeholders.first_surname')}}" class="form-control" required 
                                    @isset($actor) value="{{old('actorFirstSurname', $actor->first_surname)}}" 
                                    @else value="{{old('actorFirstSurname')}}" @endisset>
                                <label for="actorSecondSurname" class="form-label">{{__('strings.actor_headers.second_surname')}}</label>
                                <input id="actorSecondSurname" name="actorSecondSurname" type="text" 
                                    placeholder="{{__('strings.actor_placeholders.second_surname')}}" class="form-control" 
                                    @isset($actor) value="{{old('actorSecondSurname', $actor->second_surname)}}" 
                                    @else value="{{old('actorSecondSurname')}}" @endisset>
                                <label for="actorDni" class="form-label">{{__('strings.actor_headers.dni')}}</label>
                                <input id="actorDni" name="actorDni" type="text" 
                                    placeholder="{{__('strings.actor_placeholders.dni')}}" class="form-control" required 
                                    @isset($actor) value="{{old('actorDni', $actor->dni)}}" 
                                    @else value="{{old('actorDni')}}" @endisset>
                                <label for="actorBirthDate" class="form-label">{{__('strings.actor_headers.birth_date')}}</label>
                                <input id="actorBirthDate" name="actorBirthDate" type="date" 
                                    placeholder="{{__('strings.actor_placeholders.birth_date')}}" class="form-control" required 
                                    @isset($actor) value="{{old('actorBirthDate', $actor->birth_date)}}" 
                                    @else value="{{old('actorBirthDate')}}" @endisset>
                                <label for="actorNationality" class="form-label">{{__('strings.actor_headers.nationality')}}</label>
                                <input id="actorNationality" name="actorNationality" type="text" 
                                    placeholder="{{__('strings.actor_placeholders.nationality')}}" class="form-control" required 
                                    @isset($actor) value="{{old('actorNationality', $actor->nationality)}}" 
                                    @else value="{{old('actorNationality')}}" @endisset>
                            </div>
                            <input type="submit" value="@isset($actor) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" 
                            class="btn btn-primary" name="createBtn">
                        </form>
                </div>
            </div>
        </div>    
    </div>  
@endsection