@extends('layouts.painel')

@section('content')
    <input type="hidden" id="json_calendar" data-route="Sem Rota" value="{{$dados}}">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
