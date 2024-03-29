@extends('Layout.userLayout')

@section('title', 'Task Manager')
@include('includes.navbar')

@section('content')
    <h2>This is Recycle Bin</h2>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    @foreach ($deletedTask as $task) 
        <div class="card mt-2">
            <div class="card-header">
                Task ID: {{ $task->id }}
                @if (Auth::user()->verified == 1) 
                    <div class="float-left"><a href="{{ route('restore',[$task->id]) }}" onclick="return confirm('Are you sure you want to restore the task?')" class="btn btn-sm btn-warning">Restore</a></div>
                @else
                    <button class="float-left disabled">Verify account to restore task from recycle bin</button>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <a href="{{ route('delete',[$task->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete the task permanently ?')">Delete</a>
            </div>
        </div>
    @endforeach

@endsection