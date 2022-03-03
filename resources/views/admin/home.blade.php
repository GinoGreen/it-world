@extends('layouts.admin')

@section('content')
<div class="container">

    <h5>Bentornato --User--!</h5>

    <div class="it-dashboard-info">
        <div class="it-dashboard-top">
            <div class="it-dashboard-box it-title-small">
                <i class="it-dash-icon fa fa-user-circle-o" aria-hidden="true"></i>
                <p>Mostra Profilo</p>
            </div>
            <div class="it-dashboard-box it-title-small">
                <i class="it-dash-icon fa fa-bar-chart" aria-hidden="true"></i>
                <p>Anteprima Statistiche</p>
            </div>
            <div class="it-dashboard-box it-title-small">
                <i class="it-dash-icon fa fa-pencil-square-o" aria-hidden="true"></i>
                <p>Modifica Profilo</p>
            </div>
        </div>

        <div class="line-horizontal"></div>
    
        <div class="it-dashboard-bottom">
            <div class="it-dash-bottom-left">
                <h5 class="it-title-small">Le tue ultime recensioni</h5>
                <p>Recensione Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Recensione Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Recensione Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Recensione Lorem ipsum dolor sit amet consectetur adipisicing...</p>
                <p>Recensione Lorem ipsum dolor sit amet consectetur adipisicing...</p>               
            </div>

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