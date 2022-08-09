@extends('layouts.app')

@section('title')
    {{__('strings.list_title.actor')}}    
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title.actor')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{route('actors.create')}}">
                                {{__('strings.create_title.actor')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="actorName" name="actorName" class="form-control" value="@isset($actorName) {{$actorName}} 
                            @endisset" placeholder="{{__('strings.actor_search_placeholders.name')}}" type="text">
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if (count($actors) > 0)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.actor_headers.name')}}</th>
                                    <th>{{__('strings.actor_headers.first_surname')}}</th>
                                    <th>{{__('strings.actor_headers.second_surname')}}</th>
                                    <th>{{__('strings.actor_headers.dni')}}</th>
                                    <th>{{__('strings.actor_headers.birth_date')}}</th>
                                    <th>{{__('strings.actor_headers.nationality')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                    @foreach ($actors as $actor)
                                        <tr>
                                            <td>
                                                {{$actor->id}}
                                            </td>
                                            <td>
                                                {{$actor->name}}
                                            </td>
                                            <td>
                                                {{$actor->first_surname}}
                                            </td>
                                            <td>
                                                {{$actor->second_surname}}
                                            </td>
                                            <td>
                                                {{$actor->dni}}
                                            </td>
                                            <td>
                                                {{$actor->birth_date->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                {{$actor->nationality}}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="actor">
                                                    <a class="btn btn-success" href="{{route('actors.edit', $actor)}}">
                                                        {{__('strings.edit_btn')}}</a>
                                                    &nbsp;&nbsp;
                                                    <form id="delete-form-{{$actor->id}}" action="{{route('actors.delete', [$actor])}}" 
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
                                {{__('strings.no_actors')}}    
                            </div>                          
                        @endif
                    </div>

                    <div class="row my-3 pr-3">
                        <div class="col">

                        </div>
                        <div class="col">
                            <div class="float-right">
                                @if ($actors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$actors->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>    
@endsection