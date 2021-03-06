<?php

namespace App\Http\Controllers;

use App\Performer;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Task::with('performer')->get();

        return view('task.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $performers = Performer::All();
        return view('task.create', compact('performers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'performer_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $task = new Task([
            'name' => $request->get('name'),
            'performer_id' => $request->get('performer_id'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
        ]);
        $task->save();

        return response()->json(['code' => 0, 'msg' => __('messages.task_added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $performers = Performer::All();

        return view('task.edit', compact('task', 'performers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'performer_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $task = Task::find($id);
        $task->name = $request->get('name');
        $task->performer_id = (int) $request->get('performer_id');
        $task->status = $request->get('status');
        $task->description = $request->get('description');

        $task->save();

        return response()->json(['code' => 0, 'msg' => __('messages.task_updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!is_null($task)) {
            $task->delete();
            return response()->json(['code' => 0, 'msg' => __('messages.task_deleted')]);
        } else {
            return response()->json(['code' => 1, 'msg' => __('messages.task_not_found')]);
        }
    }
}
