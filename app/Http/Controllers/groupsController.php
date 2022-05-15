<?php

namespace App\Http\Controllers;

use App\Models\groups;
use Illuminate\Http\Request;

class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = groups::orderBy('id', 'desc')->paginate(4);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');

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
            'nama_grup' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        $groups = new groups();

        $groups->nama_grup = $request->nama_grup;
        $groups->description = $request->description;

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = groups::where('id', $id,)->first();

        return view('groups.show', ['group' => $group]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = groups::where('id', $id,)->first();

        return view('groups.edit', ['group' => $group]);    }

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
            'nama_grup' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        groups::find($id)->update([
            'nama_grup' => $request->nama_grup,
            'description' => $request->description,
        ]);

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        groups::find($id)->delete();
        return redirect('/groups');
    }
}
