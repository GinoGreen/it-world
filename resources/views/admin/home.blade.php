@extends('layouts.admin')

@section('content')
<div class="container">

    <h5 class="text-center">Bentornato {{Auth::user()->name}}</h5>

    <div class="it-dashboard-info">
        <div class="it-dashboard-top">
            <a href="{{ route('admin.show') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>Mostra Profilo</p>
                </div>
            </a>
            <a href="{{ route('admin.edit') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-pencil-square-o" aria-hidden="true"></i>
                    <p>Modifica Profilo</p>
                </div>
            </a>
            <a href="">
            <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Anteprima Statistiche</p>
                </div>
            </a>
            <a href="{{ route('admin.message') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-envelope" aria-hidden="true"></i>
                    <p>Messaggi</p>
                </div>
            </a>
            <a href="{{ route('admin.review') }}">
                <div class="it-dashboard-box it-title-small">
                    <i class="it-dash-icon fa fa-commenting" aria-hidden="true"></i>
                    <p>Dicono di te</p>
                </div>
            </a>
        </div>

        <div class="line-horizontal"></div>
    
        <div class="it-dashboard-bottom">
            @if ($reviews)
                <div class="it-dash-bottom-left">
                    <h5 class="it-title-small">Le tue ultime recensioni</h5>
                    @foreach ($reviews as $review)
                        <p>{{$review->description}}</p>
                    @endforeach             
                </div>
            @else
                <p>Non c'è niente da visualizzare</p>
            @endif

            <div class="it-dash-bottom-right">
                <h5 class="it-title-small">I tuoi ultimi messaggi</h5>
                <p>Messaggio Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Messaggio Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Messaggio Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Messaggio Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Messaggio Lorem ipsum dolor sit amet consectetur adipisicing...</p>
            </div>
        </div>
    </div>

</div>
@endsection

@section('title')
    Dashboard
@endsection