@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style=""  >
        <div class="col-md-5 "  >
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="margin-top: -3%" >

        </div>

        <div class="col-md-7" style="margin-top: 2%">

            <div class="d-flex justify-content-between align-items-baseline" >
                <div class="d-flex align-items-center pb-2">
                    <div class="h4" style="color:darkred">{{$user->username}} </div>

            <follow-button user-id="{{$user->id}}" follows="{{ $follows  }}"></follow-button>

                </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Book</a>
                @endcan


            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex"  >
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong>posts</div>
                <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong>followers</div>
                <div class="pr-3"><strong>{{$user->following->count()}}</strong>following</div>
            </div>
            <div class="pt-2">{{$user->profile->title}}</div>
            <div >{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url ??  'N/A'}}</a></div>
            <hr>

        </div>
    </div>

    <div class="row" style="width: 100%;padding-top: 2%;padding-left: 2px">
        @foreach($user->posts as $post)
            <div class="col-4" >
                <a href="/p/{{$post->id}}">  <img src="/storage/{{$post->image}}"  style="height:60%;width:80%"/></a>
            </div>
        @endforeach

    </div>




    </div>


@endsection
