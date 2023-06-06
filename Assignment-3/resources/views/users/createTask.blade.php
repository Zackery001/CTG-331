@extends('Layout.userLayout')

@section('title', 'Create')
@include('includes.navbar')

@section('content')

    @include('errors.error')
    <form class="form-group" action="{{ route('create.store') }}" method="POST">
        {{ csrf_field() }}
        <label for="">Title</label>
        <input class="form-control mt-2" name="title" placeholder="Enter Title Here (Limit 250)">
        <label for="">Description</label>
        <textarea type="password" class="form-control mt-2" name="description" placeholder="Enter Description Here" rows="7"></textarea>
        <button type="submit" name="submit" class="btn btn-sm btn-dark mt-2" value="Create">Submit</button>
    </form>

@endsection
