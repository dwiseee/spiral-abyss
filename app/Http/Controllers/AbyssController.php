<?php

namespace App\Http\Controllers;

use App\Models\Abyss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AbyssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('abyss.index')->with([
            'abyss' => Abyss::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abyss.create');
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
            'patch' => 'required|min:3|max:25',
            'diff' => 'required|min:3',
            'bestTeam' => 'required|min:3',
        ]);

        // $team = new Team;
        // $team->patch = $request->patch;
        // $team->diff = $request->diff;
        // $team->bestTeam = $request->bestTeam;
        // $team->save();
        
        DB::insert('INSERT INTO abysses(patch,diff,bestTeam) VALUES (:patch, :diff , :bestTeam)',
        [
            'patch' => $request->patch,
            'diff' => $request->diff,
            'bestTeam' => $request->bestTeam,
        ]
        );

        return redirect()->route('abyss.index')
                        ->with('success','Abyss has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abyss  $abyss
     * @return \Illuminate\Http\Response
     */
    public function show(Abyss $abyss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abyss  $abyss
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('abyss.edit')->with([
            'abyss' => Abyss::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abyss  $abyss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patch' => 'required|min:3|max:25',
            'diff' => 'required|min:3',
            'bestTeam' => 'required|min:3',
        ]);

        DB::update('UPDATE abysses SET patch = :patch, diff = :diff,bestTeam = :bestTeam WHERE id = :id',
        [
            'id' => $id,
            'patch' => $request->patch,
            'diff' => $request->diff,
            'bestTeam' => $request->bestTeam,
        ]);

        // $abyss = Abyss::find($id);
        // $abyss->patch = $request->patch;
        // $abyss->diff = $request->diff;
        // $abyss->bestTeam = $request->bestTeam;
        // $abyss->save();

        return redirect()->route('abyss.index')
                        ->with('success','Abyss has been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abyss  $abyss
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abyss = Abyss::find($id);
        $abyss->delete();

        return back()->with('success','Abyss has been Deleted!');
    }
}
