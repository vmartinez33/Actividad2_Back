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
@endsection
