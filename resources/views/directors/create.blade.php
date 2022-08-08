@extends('layouts.app')

@section('title')
    @isset($director)
        {{__('strings.edit_title.director')}}
    @else
        {{__('strings.create_title.director')}}
    @endisset
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($director)
                            <h1>{{__('strings.edit_title.director')}} {{$director->name}}</h1>
                        @else
                            <h1>{{__('strings.create_title.director')}}</h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($director)
                        <form name="edit_director" action="{{route('directors.update', $director)}}" method="POST">
                            @csrf
                    @else
                        <form name="create_director" action="{{route('directors.store')}}" method="POST">
                            @csrf
                    @endisset
                            <div class="mb-3">
                                <label for="directorName" class="form-label">{{__('strings.director_headers.name')}}</label>
                                <input id="directorName" name="directorName" type="text" placeholder="{{__('strings.director_placeholders.name')}}" 
                                class="form-control" required @isset($director) value="{{old('directorName', $director->name)}}" 
                                @else value="{{old('directorName')}}" @endisset>

                                <label for="directorFirstSurname" class="form-label">{{__('strings.director_headers.firstSurname')}}</label>
                                <input id="directorFirstSurname" name="directorFirstSurname" type="text" placeholder="{{__('strings.director_placeholders.firstSurname')}}" 
                                class="form-control" required @isset($director) value="{{old('directorFirstSurname', $director->first_surname)}}" 
                                @else value="{{old('directorFirstSurname')}}" @endisset>

                                <label for="directorSecondSurname" class="form-label">{{__('strings.director_headers.secondSurname')}}</label>
                                <input id="directorSecondSurname" name="directorSecondSurname" type="text" placeholder="{{__('strings.director_placeholders.secondSurname')}}" 
                                class="form-control" @isset($director) value="{{old('directorSecondSurname', $director->second_surname)}}" 
                                @else value="{{old('directorSecondSurname')}}" @endisset>

                                <label for="directorDni" class="form-label">{{__('strings.director_headers.dni')}}</label>
                                <input id="directorDni" name="directorDni" type="text" placeholder="{{__('strings.director_placeholders.dni')}}" 
                                class="form-control" required @isset($director) value="{{old('directorDni', $director->dni)}}" 
                                @else value="{{old('directorDni')}}" @endisset>

                                <label for="directorBirthDate" class="form-label">{{__('strings.director_headers.birthDate')}}</label>
                                <input id="directorBirthDate" name="directorBirthDate" type="date" placeholder="{{__('strings.director_placeholders.birthDate')}}" 
                                class="form-control" required @isset($director) value="{{old('directorBirthDate', $director->birth_date)}}" 
                                @else value="{{old('directorBirthDate')}}" @endisset>

                                <label for="directorNationality" class="form-label">{{__('strings.director_headers.nationality')}}</label>
                                <input id="directorNationality" name="directorNationality" type="text" placeholder="{{__('strings.director_placeholders.nationality')}}" 
                                class="form-control" required @isset($director) value="{{old('directorNationality', $director->nationality)}}" 
                                @else value="{{old('directorNationality')}}" @endisset>

                            </div>
                            <input type="submit" value="@isset($director) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" 
                            class="btn btn-primary" name="createBtn">
                        </form>
                </div>
            </div>
        </div>    
    </div>  
@endsection