@php
    use App\ErrorSession;
@endphp

@if(Session::has(ErrorSession::SUCCESS_COD))
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{__('alerts.successful_message')}}</strong> {{Session:get(ErrorSession::SUCCESS_COD)}}
                </div>
            </div>
        </div>
    </div>
@endif
