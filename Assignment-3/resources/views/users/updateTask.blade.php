@extends('Layout.userLayout')

@section('title', 'Update')

@section('content')

    @include('errors.error')
    <form class="form-group" action="{{ route('edit.update',[$task->id]) }}" method="POST">
        {{ csrf_field() }}
        <label for="">Title</label>
        <input class="form-control mt-2" name="title" placeholder="Enter Title Here (Limit 250)" value="{{ $task->title }}">
        <label for="">Description</label>
        <textarea class="form-control mt-2" name="description" placeholder="Enter Description Here" rows="7">{{ $task->description }}</textarea>
        <button type="submit" name="submit" class="btn btn-sm btn-dark mt-2" value="Create">Submit</button>
    </form>

@endsection
