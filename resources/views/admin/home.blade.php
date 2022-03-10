@extends('layouts.admin')

@section('content')
<div class="container">

    <h5 class="text-center">Bentornato {{Auth::user()->name}}</h5>

    <div class="it-dashboard-info">
        <div class="it-dashboard-top row">
            <a class:="col-12" href="{{ route('admin.show') }}">
                <div class="it-dashboard-box it-title-small ">
                    <i class="it-dash-icon fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>Mostra Profilo</p>
                </div>
            </a>
            <a class:="col-12" href="{{ route('admin.edit') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-pencil-square-o" aria-hidden="true"></i>
                    <p>Modifica Profilo</p>
                </div>
            </a>
            <a class:="col-12" href="{{ route('admin.statistic') }}">
            <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Anteprima Statistiche</p>
                </div>
            </a>
            <a class:="col-12" href="{{ route('admin.message') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-envelope" aria-hidden="true"></i>
                    <p>Messaggi</p>
                </div>
            </a>
            <a class:="col-12" href="{{ route('admin.review') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-commenting" aria-hidden="true"></i>
                    <p>Dicono di te</p>
                </div>
            </a>
            <a class:="col-12" href="{{ route('admin.subscription') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-commenting" aria-hidden="true"></i>
                    <p>Dicono di te</p>
                </div>
            </a>
        </div>

        <div class="line-horizontal"></div>
    
        <div class="it-dashboard-bottom row">
            @if (Auth::user()->reviews)
                <div class="it-dash-bottom-left col-12 col-lg-5 mb-lg-0">
                    <h5 class="it-title-small">Le tue ultime recensioni</h5>
                    @foreach (Auth::user()->reviews as $review)
                        <p>{{ $review->description }}</p>
                    @endforeach             
                </div>
            @endif

            @if (Auth::user()->messages)
                <div class="it-dash-bottom-right col-12 col-lg-5">
                    <h5 class="it-title-small">I tuoi ultimi messaggi</h5>
                    @foreach (Auth::user()->messages as $message)
                        <p>{{ $message->message }}</p>
                    @endforeach             
                </div>
            @endif
        </div>
    </div>

</div>
@endsection

@section('title')
    Dashboard
@endsection