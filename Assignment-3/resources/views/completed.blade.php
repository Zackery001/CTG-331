@extends('Layout.userLayout')

@section('title', 'Completed')
@include('includes.navbar')

@section('content')
    <h2>Welcome to Completed Task Page</h2>

    @foreach ($completedTask as $task) 
        <div class="card mt-2">
            <div class="card-header">
                Task ID: {{ $task->id }}
                <div class="float-left"><a href="{{ route('update.status',[$task->id,'pending']) }}" onclick="return confirm('Are you sure you want to send task back to pending?')" class="btn btn-sm btn-warning">Back to pending</a></div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <a href="{{ route('remove',[$task->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to move the task to recycle bin?')">Remove</a>
            </div>
        </div>
    @endforeach

@endsection