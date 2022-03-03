@extends('layouts.admin')

@section('content')
<div class="container">
   
    @foreach ($reviews as $review)
        <div class="container border border-dark">
            @dump($review)
            <div >
                <h1>title</h1>
                {{$review->title}}
            </div>
            <div >
                <h1>description</h1>
                {{$review->description}}
            </div>
            <div >
                <h1>vote</h1>
                {{$review->vote}}
            </div>
            <div >
                <h1>date</h1>
                {{$review->created_at}}
            </div>
        </div> 
       
    @endforeach
    {{$reviews->links()}}

</div>
@endsection

@section('title')
    Recensioni
@endsection