@extends('layouts.app')

@section('content')
<div class="container">
    <form  action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row align-items-baseline justify-content-between" >
            <h1 style="margin-left:30%;color: brown">Edit Profile</h1>
        </div>
        <div class="form-group row">
            <label for="title">Title</label>
            <div class="col-md-8 pl-5">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
       <!-- <div class="form-group row">
            <label for="description" >Description</label>
            <div class="col-md-7">
                <textarea type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description')  ?? $user->profile->description}}"  autocomplete="description" autofocus  rows="6"  ></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            </div>
        </div>-->

        <div class="form-group row">
            <label for="url">Description </label>
            <div class="col-md-8 pl-5">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')  ?? $user->profile->description}}"  autocomplete="description" autofocus>
                @error('description')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        <div class="form-group row">
            <label for="url">Url</label>
            <div class="col-md-8 pl-5">
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url')  ?? $user->profile->url}}"  autocomplete="url" autofocus>
                @error('url')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="image" >Profile Image</label>
            <div class="col-md-8">
                <input type="file" class="form-control-file pl-4" id="image" name="image">
                @if($errors->has('image'))
                    <strong>{{$errors->first('image')}}</strong>
                @endif
            </div>
        </div>


        <div class="row pt-4" >
            <button class="btn btn-primary ">Save Profile</button>
        </div>
    </form>

</div>
@endsection
