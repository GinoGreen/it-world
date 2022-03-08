@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="it-reviews-wrapper mt-5">
    <div class="row">
      
      @foreach ($reviews as $review)
      <div class="col-12 d-flex justify-content-between align-items-center">
        
        <div class="it-reviews-box mb-4">
          <div class="it-r-top">
            <div class="it-r-title">
                {{$review->title}}
            </div>
            <div class="it-r-vote">
                
                @for ($star = 0; $star < $review->vote; $star++ )
                  <span class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </span>
                @endfor

            </div>
          </div>
          <div class="it-r-bottom">
            <div class="it-r-description pt-3">
                {{$review->description}}
            </div>
            <div class="it-r-date">
                {{$review->created_at}}
            </div>
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