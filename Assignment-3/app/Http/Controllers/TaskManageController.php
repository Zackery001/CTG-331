<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskManageController extends Controller
{
    public function create()
    {
        return view('users.createTask');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:250',
            'description' => 'required|min:10'
        ]);

        Task::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect()->route('welcome')->with('message', 'Task created successfully!');
    }

    public function index()
    {
        $allTask = Task::where('status', 'pending')
                    ->where('delete', 'false')
                    ->get();
        
        return view('welcome', compact('allTask'));
    }

    public function completed()
    {
        $completedTask = Task::where('status', 'complete')->get();

        return view('completed', compact('completedTask'));
    }

    public function bin()
    {
        $deletedTask = Task::where('delete', 'true')->get();       
        return view('recycleBin', compact('deletedTask'));
    }

    public function show($id)
    {
        $task=Task::find($id);
        return view('users.updateTask', compact('task'));   
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|max:250',
            'description' => 'required|min:10'
        ]);
        
        $task = Task::find($id);
        $task->update([         
            'title' => request('title'),
            'description' => request('description')               
        ]);

        return redirect()->route('welcome')->with('message', 'Task updated successfully!');
    }

    public function delete($id)
    {
        Task::find($id)->delete();

        return redirect()->route('bin')->with('message', 'Task deleted successfully!');
    }

    public function remove($id)
    {

        $task = Task::find($id);

        $task->delete = 'true';
        $task->save();

        return redirect()->route('welcome')->with('message', 'Task moved to recycle bin.');
    }

    public function restore($id)
    {

        $task = Task::find($id);

        $task->delete = 'false';
        $task->save();


        return redirect()->back()->with('success', 'Task restored successfully.');
    }
    
    public function updateStatus($id, $status)
    {
        $task = Task::find($id);

        $task->status = $status;
        $task->save();

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }

}