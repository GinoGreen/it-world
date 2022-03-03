@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="white-wrap-rvu">

      <div class="row">

        
        @foreach ($reviews as $review)
        <div class="col-12 d-flex justify-content-between align-items-center">
        
          <div class="circle-avatar-rvu"></div>
          
          <div class="wrap-secondary-rvu mb-4">
            <div >
                {{$review->title}}
            </div>
            <div >
                {{$review->description}}
            </div>
            <div >
                {{$review->vote}}
            </div>
            <div >
                {{$review->created_at}}
            </div>
          </div> 
       
        </div>
          @endforeach   
      </div>

      <div class="paginate">        
        {{$reviews->links()}}
      </div>

  </div>
</div>
@endsection

@section('title')
    Recensioni
@endsection