@extends('layouts.app')

@section('title')
    {{__('strings.list_title.director')}}    
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title.director')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{route('directors.create')}}">
                                {{__('strings.create_title.director')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="text" name="text" class="form-control" value="@isset($text) {{$text}} 
                            @endisset" placeholder="{{__('strings.director_search_placeholder')}}" type="text">
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if (count($directors) > 0)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.director_headers.name')}}</th>
                                    <th>{{__('strings.director_headers.first_surname')}}</th>
                                    <th>{{__('strings.director_headers.second_surname')}}</th>
                                    <th>{{__('strings.director_headers.dni')}}</th>
                                    <th>{{__('strings.director_headers.birth_date')}}</th>
                                    <th>{{__('strings.director_headers.nationality')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                    @foreach ($directors as $director)
                                        <tr>
                                            <td>
                                                {{$director->id}}
                                            </td>
                                            <td>
                                                {{$director->name}}
                                            </td>
                                            <td>
                                                {{$director->first_surname}}
                                            </td>
                                            <td>
                                                {{$director->second_surname}}
                                            </td>
                                            <td>
                                                {{$director->dni}}
                                            </td>
                                            <td>
                                                {{$director->birth_date->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                {{$director->nationality}}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Director">
                                                    <a class="btn btn-success" href="{{route('directors.edit', $director)}}">
                                                        {{__('strings.edit_btn')}}</a>
                                                    &nbsp;&nbsp;
                                                    <form id="delete-form-{{$director->id}}" action="{{route('directors.delete', [$director])}}" 
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
                                {{__('strings.no_directors')}}    
                            </div>                          
                        @endif
                    </div>

                    <div class="row my-3 pr-3">
                        <div class="col">

                        </div>
                        <div class="col">
                            <div class="float-right">
                                @if ($directors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$directors->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>    
@endsection