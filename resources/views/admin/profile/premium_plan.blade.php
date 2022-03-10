@extends('layouts.admin')

@section('content')
<div class="it-container-page">

   <section class="it-section-page row">
      <h1>Scegli tra i nostri piani</h1>
      @dump($plans)
   </section>

</div>
@endsection

@section('title')
   Piani
@endsection