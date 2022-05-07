@extends('layouts.app')

@section('content')
<div class="container">
<form  action="/p" enctype="multipart/form-data" method="post">
    @csrf
<div class="row align-items-baseline justify-content-between" >
    <h1 style="margin-left:30%;color: brown">Add New Book</h1>
</div>
    <div class="form-group row">
        <label for="book_title">Book Title</label>
        <div class="col-md-8 pl-5">
            <input id="book_title" type="text" class="form-control @error('book_title') is-invalid @enderror" name="book_title" value="{{ old('book_title') }}"  autocomplete="book_title" autofocus>
            @error('book_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    </div>
    <div class="form-group row">
        <label for="book_title" >Book Description</label>
        <div class="col-md-8">
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="book description" autofocus  rows="6"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                 </div>
    </div>

    <div class="form-group row">
        <label for="image" >Book Cover</label>
        <div class="col-md-8">
            <input type="file" class="form-control-file pl-4" id="image" name="image">
           @if($errors->has('image'))
               <strong>{{$errors->first('image')}}</strong>
               @endif
        </div>
    </div>


    <div class="row pt-4" >
        <button class="btn btn-primary " style="background: brown;margin-left: 10%">Add New Book</button>
    </div>
</form>
</div>
@endsection
