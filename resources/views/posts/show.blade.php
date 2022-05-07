@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-5">
        <img src="/storage/{{$post->image}}" alt="" class="w-75 h-75"/>
    </div>
    <div class="col-7">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage()}}" alt="" class="w-75 rounded-circle" style="max-width: 40px">
                </div>
                <div class="font-weight-bold" style="text-decoration-line: none "><a href="/profile/{{$post->user->id}}"> {{$post->user->username}}</a></div>
                |<a href="#" class="pl-3 font-weight-bold"> Follow</a>
            </div>

        <hr>

        <span class="font-weight-bold" style="text-decoration-line: none "><a href="/profile/{{$post->user->id}}"> {{$post->user->username}}</a></span>
            <span><h3 class="">{{$post->book_title}}</h3></span>
        <p>{{$post->description}}</p>

        <div class="like" style="text-decoration-line: none ">Like | Dislike| Reply</a></div>

    </div>
    
    </div>


    </div>
</div>
</div>
<script>
    var token='{{Session::token()}}';
    var urlLike='{{route(like)}}'
</script>
@endsection
