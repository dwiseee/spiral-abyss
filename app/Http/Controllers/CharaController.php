<?php

namespace App\Http\Controllers;

use App\Models\Chara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $charas = DB::select("SELECT * FROM charas WHERE is_delete = 0");
        // return view('chara.index')
        //     ->with('charas', $charas);
        return view('chara.index')->with([
            'charas' => Chara::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chara.create');
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
            'charName' => 'required|min:3|max:25',
            'vision' => 'required|min:3',
            'nation' => 'required|min:3',
            'weapon' => 'required|min:3',
        ]);

        DB::insert('INSERT INTO charas(charName,vision,nation,weapon) VALUES (:charName, :vision , :nation, :weapon)',
        [
            'charName' => $request->charName,
            'vision' => $request->vision,
            'nation' => $request->nation,
            'weapon' => $request->weapon,
        ]
        );

        return redirect()->route('chara.index')
                        ->with('success','Character has been Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chara  $chara
     * @return \Illuminate\Http\Response
     */
    public function show(Chara $chara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chara  $chara
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('chara.edit')->with([
            'chara' => Chara::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chara  $chara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'charName' => 'required|min:3|max:25',
            'vision' => 'required|min:3',
            'nation' => 'required|min:3',
            'weapon' => 'required|min:3',
        ]);
        DB::update('UPDATE charas SET charName = :charName, vision = :vision,nation = :nation, weapon = :weapon WHERE id = :id',
        [
            'id' => $id,
            'charName' => $request->charName,
            'vision' => $request->vision,
            'nation' => $request->nation,
            'weapon' => $request->weapon,
        ]);

        // $chara = Chara::find($id);
        // $chara->charName = $request->charName;
        // $chara->vision = $request->vision;
        // $chara->nation = $request->nation;
        // $chara->weapon = $request->weapon;
        // $chara->save();

        return redirect()->route('chara.index')
                        ->with('success','Character has been Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chara  $chara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chara = Chara::find($id);
        $chara->delete();

        return back()->with('success','Character has been Deleted!');
    }
}
