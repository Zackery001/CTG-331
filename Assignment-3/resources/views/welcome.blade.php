@extends('Layout.userLayout')

@section('title', 'Task Manager')
@include('includes.navbar')

@section('content')

    @if(Auth::check())
        <h2>Hello {{ Auth::user()->username }}</h2>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @foreach ($allTask as $task) 
        <div class="card mt-2">
            <div class="card-header">
                Task ID: {{ $task->id }}
                <div class="float-left"><a href="{{ route('update.status',[$task->id,'complete']) }}" onclick="return confirm('Are you sure you want to set task status as completed?')" class="btn btn-sm btn-dark">Mark as Complete</a></div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                @if(Auth::user()->verified == 1)
                    <a href="{{ route('edit.show',[$task->id]) }}" class="btn btn-sm btn-light">Update</a>
                @else
                    <a href="#" class="btn btn-sm btn-light disabled">Update</a>
                @endif
                <a href="{{ route('remove',[$task->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to move the task to recycle bin?')">Remove</a>
            </div>
        </div>
    @endforeach

@endsection