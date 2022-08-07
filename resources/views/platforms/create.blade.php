@extends('layouts.app')

@section('title')
    @isset($platform)
        {{__('strings.edit_title')}}
    @else
        {{__('strings.create_title')}}
    @endisset
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($platform)
                            <h1>{{__('strings.edit_title')}} {{$platform->name}}</h1>
                        @else
                            <h1>{{__('strings.create_title')}}</h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($platform)
                        <form name="edit_platform" action="{{route('platforms.update', $platform)}}" method="POST">
                            @csrf
                    @else
                        <form name="create_platform" action="{{route('platforms.store')}}" method="POST">
                            @csrf
                    @endisset
                            <div class="mb-3">
                                <label for="platformName" class="form-label">{{__('strings.name_header')}}</label>
                                <input id="platformName" name="platformName" type="text" placeholder="{{__('strings.name_placeholder')}}" 
                                class="form-control" required @isset($platform) value="{{old('platformName', $platform->name)}}" 
                                @else value="{{old('platformName')}}" @endisset>
                            </div>
                            <input type="submit" value="@isset($platform) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" 
                            class="btn btn-primary" name="createBtn">
                        </form>
                </div>
            </div>
        </div>    
    </div>  
@endsection