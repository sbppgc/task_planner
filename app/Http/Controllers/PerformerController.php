<?php

namespace App\Http\Controllers;

use App\Performer;
use Illuminate\Http\Request;

class PerformerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Performer::All();
        return view('performer.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('performer.create');
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
            'position' => 'required',
        ]);
        $performer = new Performer([
            'name' => $request->get('name'),
            'position' => $request->get('position'),
        ]);
        $performer->save();
        return redirect('/performer')->with('success', 'Performer has been added');
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
        $performer = Performer::find($id);

        return view('performer.edit', compact('performer'));
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
            'position' => 'required',
        ]);

        $performer = Performer::find($id);
        $performer->name = $request->get('name');
        $performer->position = $request->get('position');
        $performer->save();

        return redirect('/performer')->with('success', 'Performer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $performer = Performer::find($id);

        if (!is_null($performer)) {
            $performer->delete();
            return response()->json(['code' => 0, 'msg' => 'Performer deleted successfully.']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Performer not found.']);
        }
    }
}
