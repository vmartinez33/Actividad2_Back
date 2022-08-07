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
          Plataformas
        </div>
        <div class="card-body">
          <p class="card-text">Listado y gestión de las plataformas creadas en BBDD.</p>
          <a href="{{route('platforms.index')}}" class="btn btn-primary">Listado de plataformas</a>
        </div>
    </div>
@endsection
