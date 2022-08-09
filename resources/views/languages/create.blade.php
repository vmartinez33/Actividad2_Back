@extends('layouts.app')

@section('title')
    @isset($language)
        {{__('strings.edit_title.language')}}
    @else
        {{__('strings.create_title.language')}}
    @endisset
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($language)
                            <h1>{{__('strings.edit_title.language')}} {{$language->name}}</h1>
                        @else
                            <h1>{{__('strings.create_title.language')}}</h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($language)
                        <form name="edit_language" action="{{route('languages.update', $language)}}" method="POST">
                            @csrf
                    @else
                        <form name="create_language" action="{{route('languages.store')}}" method="POST">
                            @csrf
                    @endisset
                            <div class="mb-3">
                                <label for="languageName" class="form-label">{{__('strings.language_headers.name')}}</label>
                                <input id="languageName" name="languageName" type="text" placeholder="{{__('strings.language_placeholders.name')}}" 
                                class="form-control" required @isset($language) value="{{old('languageName', $language->name)}}" 
                                @else value="{{old('languageName')}}" @endisset>

                                <label for="languageIsoCode" class="form-label">{{__('strings.language_headers.iso_code')}}</label>
                                <input id="languageIsoCode" name="languageIsoCode" type="text" placeholder="{{__('strings.language_placeholders.iso_code')}}" 
                                class="form-control" required @isset($language) value="{{old('languageIsoCode', $language->iso_code)}}" 
                                @else value="{{old('languageIsoCode')}}" @endisset>

                            </div>
                            <input type="submit" value="@isset($language) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" 
                            class="btn btn-primary" name="createBtn">
                        </form>
                </div>
            </div>
        </div>    
    </div>  
@endsection