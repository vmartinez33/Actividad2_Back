@extends('layouts.app')

@section('title')
    {{__('strings.list_title.language')}}    
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title.language')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{route('languages.create')}}">
                                {{__('strings.create_title.language')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="languageName" name="languageName" class="form-control" value="@isset($languageName) {{$languageName}} 
                            @endisset" placeholder="{{__('strings.language_search_placeholders.name')}}" type="text">
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if (count($languages) > 0)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.language_headers.name')}}</th>
                                    <th>{{__('strings.language_headers.isoCode')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                    @foreach ($languages as $language)
                                        <tr>
                                            <td>
                                                {{$language->id}}
                                            </td>
                                            <td>
                                                {{$language->name}}
                                            </td>
                                            <td>
                                                {{$language->iso_code}}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Language">
                                                    <a class="btn btn-success" href="{{route('languages.edit', $language)}}">
                                                        {{__('strings.edit_btn')}}</a>
                                                    &nbsp;&nbsp;
                                                    <form id="delete-form-{{$language->id}}" action="{{route('languages.delete', [$language])}}" 
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
                                {{__('strings.no_languages')}}    
                            </div>                          
                        @endif
                    </div>

                    <div class="row my-3 pr-3">
                        <div class="col">

                        </div>
                        <div class="col">
                            <div class="float-right">
                                @if ($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$languages->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>    
@endsection