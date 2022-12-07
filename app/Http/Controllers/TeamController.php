<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = DB::select("SELECT * FROM teams WHERE is_delete = 0");
        return view('team.index')
            ->with('team', $teams);
        // return view('team.index')->with([
        //     'team' => Team::all(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
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
            'teamName' => 'required|min:3|max:25',
            'teamDps' => 'required|min:3',
            'teamReaction' => 'required|min:3',
        ]);

        // $team = new Team;
        // $team->teamName = $request->teamName;
        // $team->teamDps = $request->teamDps;
        // $team->teamReaction = $request->teamReaction;
        // $team->save();
        
        DB::insert('INSERT INTO teams(teamName,teamDps,teamReaction) VALUES (:teamName, :teamDps , :teamReaction)',
        [
            'teamName' => $request->teamName,
            'teamDps' => $request->teamDps,
            'teamReaction' => $request->teamReaction,
        ]
        );

        return redirect()->route('team.index')
                        ->with('success','Team has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('team.edit')->with([
            'team' => Team::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'teamName' => 'required|min:3|max:25',
            'teamDps' => 'required|min:3',
            'teamReaction' => 'required|min:3',
        ]);
        DB::update('UPDATE teams SET teamName = :teamName, teamDps = :teamDps,teamReaction = :teamReaction WHERE id = :id',
        [
            'id' => $id,
            'teamName' => $request->teamName,
            'teamDps' => $request->teamDps,
            'teamReaction' => $request->teamReaction,
        ]);
        // $team = Team::find($id);
        // $team->teamName = $request->teamName;
        // $team->teamDps = $request->teamDps;
        // $team->teamReaction = $request->teamReaction;
        // $team->save();

        return redirect()->route('team.index')
                        ->with('success','Team has been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ganti pake query
        $team = Team::find($id);
        $team->delete();

        return back()->with('success','Team has been Deleted Permanently!');

    }

    public function soft($id)
    {
        DB::update('UPDATE teams SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('team.index')->with('success', 'Team has been Deleted!');
    }
}
