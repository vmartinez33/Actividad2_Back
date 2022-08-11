@extends('layouts.app')

@section('title')
    @isset($series)
        {{__('strings.edit_title.series')}}
    @else
        {{__('strings.create_title.series')}}
    @endisset
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($series)
                            <h1>{{__('strings.edit_title.series')}} {{$series->title}}</h1>
                        @else
                            <h1>{{__('strings.create_title.series')}}</h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($series)
                        <form name="edit_series" action="{{route('series.update', $series)}}" method="POST">
                            @csrf
                    @else
                        <form name="create_series" action="{{route('series.store')}}" method="POST">
                            @csrf
                    @endisset
                            <div class="mb-3">
                                <label for="seriesTitle" class="form-label">{{__('strings.series_headers.title')}}</label>
                                <input id="seriesTitle" name="seriesTitle" type="text" placeholder="{{__('strings.series_placeholders.title')}}" 
                                    class="form-control" required @isset($series) value="{{old('seriesTitle', $series->title)}}" 
                                    @else value="{{old('seriesTitle')}}" @endisset>
                                <label for="seriesPlatform" class="form-label">{{__('strings.series_headers.platform')}}</label>
                                <select class="form-select" id="seriesPlatform" name="seriesPlatform" required>
                                        @foreach($platforms as $platform)
                                            <option value="{{$platform->id}}" 
                                            @isset($series) {{ (old('seriesPlatform', $series->platform->id) == $platform->id ? 'selected':'') }}
                                            @else {{ (old('seriesPlatform') == $platform->id ? 'selected':'') }}
                                            @endisset> 
                                                {{$platform->name}} 
                                            </option>   
                                        @endforeach
                                    </select>
                                <br>
 
                                <label for="seriesDirector" class="form-label">{{__('strings.series_headers.director')}}</label>
                                <select class="form-select" id="seriesDirector" name="seriesDirector" required>
                                        @foreach($directors as $director)
                                            <option value="{{$director->id}}" 
                                            @isset($series) {{ (old('seriesDirector', $series->director->id) == $director->id ? 'selected':'') }}
                                            @else {{ (old('seriesDirector') == $director->id ? 'selected':'') }}
                                            @endisset> 
                                                {{$director->name . ' ' . $director->first_surname . ' ' . 
                                                  $director->second_surname . ' (' . $director->dni . ')'}} 
                                            </option>   
                                        @endforeach
                                    </select>
                                <br>
                                <label for="seriesActors[]" class="form-label">{{__('strings.series_headers.actors')}}</label>
                                @foreach ($actors as $actor) 
                                    <input type="checkbox" name="seriesActors[]" value="{{$actor->id}}" 
                                    @isset($series) 
                                        {{ in_array($actor->id, old('seriesActors', $series->actors()->allRelatedIds()->toArray())) ? 'checked':'' }}
                                    @else
                                        {{ in_array($actor->id, old('seriesActors', [])) ? 'checked':'' }}
                                    @endisset>
                                    {{$actor->name . ' ' . $actor->first_surname . ' ' . $actor->second_surname . ' (' . $actor->dni . ')'}}
                                    <br>
                                @endforeach
                                <br>
                                <label for="seriesAudioLanguages[]" class="form-label">{{__('strings.series_headers.audio_lang')}}</label>
                                @foreach ($languages as $lang) 
                                    <input type="checkbox" name="seriesAudioLanguages[]" value="{{$lang->id}}" 
                                    @isset($series) 
                                        {{ in_array($lang->id, old('seriesAudioLanguages', $series->audioLanguages()->allRelatedIds()->toArray())) ? 'checked':'' }}
                                    @else
                                        {{ in_array($lang->id, old('seriesAudioLanguages', [])) ? 'checked':'' }}
                                    @endisset> 
                                    {{$lang->name . ' (' . $lang->iso_code . ')'}}
                                    <br>
                                @endforeach 
                                <br>
                                <label for="seriesSubtitlesLanguages[]" class="form-label">{{__('strings.series_headers.subtitles_lang')}}</label>
                                @foreach ($languages as $lang) 
                                    <input type="checkbox" name="seriesSubtitlesLanguages[]" value="{{$lang->id}}" 
                                    @isset($series) 
                                        {{ in_array($lang->id, old('seriesSubtitlesLanguages', $series->subtitlesLanguages()->allRelatedIds()->toArray())) ? 'checked':'' }}
                                    @else
                                        {{ in_array($lang->id, old('seriesSubtitlesLanguages', [])) ? 'checked':'' }}
                                    @endisset> 
                                    {{$lang->name . ' (' . $lang->iso_code . ')'}}
                                    <br>
                                @endforeach 
                            </div>
                            <input type="submit" value="@isset($series) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" 
                            class="btn btn-primary" name="createBtn">
                        </form>
                </div>
            </div>
        </div>    
    </div>  
@endsection