<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("search")){
            $search = $request->input("search");
            if($search == ""){
                $views = DB::select("SELECT * FROM meta");

                return view('meta.index')
                    ->with('views', $views);
        }else{
            $views = DB::select("SELECT * FROM meta WHERE 
            patch like '%{$search}%' or
            diff like '%{$search}%' or
            teamName like '%{$search}%' or
            teamDps like '%{$search}%';");
                return view('meta.index')
                    ->with('views', $views);
            }
        }else{
            $views = DB::select("SELECT * FROM meta");
            // dd($views());
    
            return view('meta.index')
                ->with('views', $views);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $meta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        //
    }
}
