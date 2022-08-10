@extends('layouts.app')

@section('title')
    {{__('strings.list_title.serie')}}    
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title.series')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{route('series.create')}}">
                                {{__('strings.create_title.series')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="text" name="text" class="form-control" value="@isset($text) {{$text}} 
                            @endisset" placeholder="{{__('strings.series_search_placeholder')}}" type="text">
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if (count($series) > 0)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.series_headers.title')}}</th>
                                    <th>{{__('strings.series_headers.platform')}}</th>
                                    <th>{{__('strings.series_headers.director')}}</th>
                                    <th>{{__('strings.series_headers.actors')}}</th>
                                    <th>{{__('strings.series_headers.audio_lang')}}</th>
                                    <th>{{__('strings.series_headers.subtitles_lang')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                    @foreach ($series as $serie)
                                        <tr>
                                            <td>
                                                {{$serie->id}}
                                            </td>
                                            <td>
                                                {{$serie->title}}
                                            </td>
                                            <td>
                                                {{$serie->platform->name}}
                                            </td>
                                            <td>
                                                {{$serie->director->name . ' ' . $serie->director->first_surname . ' ' . $serie->director->second_surname . ' (' . $serie->director->dni . ')'}}
                                            </td>
                                            <td>
                                                @foreach($serie->actors as $actor)
                                                    {{$actor->name . ' ' . $actor->first_surname . ' ' . $actor->second_surname . ' (' . $actor->dni . ')'}}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($serie->audioLanguages as $lang)
                                                    {{$lang->name . ' (' . $lang->iso_code . ')'}}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($serie->subtitlesLanguages as $lang)
                                                    {{$lang->name . ' (' . $lang->iso_code . ')'}}
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="serie">
                                                    <a class="btn btn-success" href="{{route('series.edit', $serie)}}">
                                                        {{__('strings.edit_btn')}}</a>
                                                    &nbsp;&nbsp;
                                                    <form id="delete-form-{{$serie->id}}" action="{{route('series.delete', [$serie])}}" 
                                                        method="post" style="display: inline-block;">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">{{__('strings.delete_btn')}}</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        @else
                            <div class="alert alert-warning mt-3">
                                {{__('strings.no_series')}}    
                            </div>                          
                        @endif
                    </div>

                    <div class="row my-3 pr-3">
                        <div class="col">

                        </div>
                        <div class="col">
                            <div class="float-right">
                                @if ($series instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$series->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>    
@endsection