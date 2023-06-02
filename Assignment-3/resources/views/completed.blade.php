@extends('Layout.userLayout')

@section('title', 'Completed')

@section('content')
    <h2>Hello User</h2>

    @foreach ($completedTask as $task) 
        <div class="card mt-2">
            <div class="card-header">
                Task ID: {{ $task->id }}
                <div class="float-left"><a href="{{ route('update.status',[$task->id,'pending']) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-warning">Mask as Complete</a></div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <a href="{{ route('delete',[$task->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </div>
        </div>
    @endforeach

@endsection