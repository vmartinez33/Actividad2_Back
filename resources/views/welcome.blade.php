@extends('layouts.app')


@section('title')
    {{ __('strings.home_title') }}
@endsection

@section('content')
    <div class="title m-b-md">
        {{ __('strings.home_title') }}
    </div>

    <div class="card text-center">
        <div class="card-header">
          {{__('strings.platform_card_header')}}
        </div>
        <div class="card-body">
          <p class="card-text">{{__('strings.platform_card_text')}}</p>
          <a href="{{route('platforms.index')}}" class="btn btn-primary">{{__('strings.list_title.platform')}}</a>
        </div>
    </div>
    <div class="card text-center">
      <div class="card-header">
        {{__('strings.actor_card_header')}}
      </div>
      <div class="card-body">
        <p class="card-text">{{__('strings.actor_card_text')}}</p>
        <a href="{{route('actors.index')}}" class="btn btn-primary">{{__('strings.list_title.actor')}}</a>
      </div>
     <div class="card text-center">
        <div class="card-header">
          {{__('strings.director_card_header')}}
        </div>
        <div class="card-body">
          <p class="card-text">{{__('strings.director_card_text')}}</p>
          <a href="{{route('directors.index')}}" class="btn btn-primary">{{__('strings.list_title.director')}}</a>
        </div>
    </div>
    <div class="card text-center">
      <div class="card-header">
        {{__('strings.language_card_header')}}
      </div>
      <div class="card-body">
        <p class="card-text">{{__('strings.language_card_text')}}</p>
        <a href="{{route('languages.index')}}" class="btn btn-primary">{{__('strings.list_title.language')}}</a>
      </div>
  </div>

  </div>
@endsection
