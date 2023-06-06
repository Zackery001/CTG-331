<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskManageController extends Controller
{

    public function index() //this is the index controller function
    {
        $allTask = Task::where('status', 'pending')
            ->where('delete', 'false')
            ->get();

        /*
        Retrieving tasks that have status of pending and delete set to false from the database
        Sending the retrieved tasks to welcome
        */

        return view('welcome', compact('allTask'));
    }
    public function create()
    {
        //Returning the page to create a new task
        return view('users.createTask');
    }

    public function store()
    {
        
        //Validation
        $this->validate(request(), [
            'title' => 'required|max:250',
            'description' => 'required|min:10'
        ]);

        //Creating a new task
        Task::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect()->route('welcome')->with('message', 'Task created successfully!');
    }

    public function completed()
    {
        /*
        Retrieving tasks that have status of completed from the database
        Sending the retrieved tasks to the completed page
        */
        $completedTask = Task::where('status', 'complete')->get();

        return view('completed', compact('completedTask'));
    }

    public function show($id)
    {
        /*
        Retrieving information about the data that the user has selected to update from the database
        Sending the retrieved tasks to the update task page
        */
        $task=Task::find($id);
        return view('users.updateTask', compact('task'));   
    }

    public function update($id)
    {
        //Validation
        $this->validate(request(), [
            'title' => 'required|max:250',
            'description' => 'required|min:10'
        ]);
        
        //Updating the data that the user has selected to update
        $task = Task::find($id);
        $task->update([         
            'title' => request('title'),
            'description' => request('description')               
        ]);

        return redirect()->route('welcome')->with('message', 'Task updated successfully!');
    }

    public function bin()
    {
        /*
        Retrieving tasks delete set to true from the database
        Sending the retrieved tasks to the recycle bin
        */
        $deletedTask = Task::where('delete', 'true')->get();
        return view('recycleBin', compact('deletedTask'));
    }

    public function remove($id)
    {

        //Updated the delete felid of the selected task to true
        $task = Task::find($id);

        $task->delete = 'true';
        $task->save();

        return redirect()->route('welcome')->with('message', 'Task moved to recycle bin.');
    }

    public function restore($id)
    {

        //Updated the delete felid of the selected task to false
        $task = Task::find($id);

        $task->delete = 'false';
        $task->save();


        return redirect()->back()->with('success', 'Task restored successfully.');
    }

    public function delete($id)
    {
        //Permanent Deletion Function
        Task::find($id)->delete();

        return redirect()->route('bin')->with('message', 'Task deleted successfully!');
    }

    
    public function updateStatus($id, $status)
    {
        $task = Task::find($id);

        $task->status = $status;
        $task->save();

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }

}