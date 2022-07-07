<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Posisi::all();
        return view('dashboard.posisi', [
            'positions' => $positions,
            'title' => 'Available Position'
        ]);
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

        $validatedData = $request->validate([
            'posisi' => 'required|max:255'
        ]);

        $posisi = Posisi::create([
            'nama' => $validatedData['posisi']
        ]);

        return back()->with('success', $posisi->nama . ' Created Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posisi $position)
    {
        $position->delete();
        return back()->with('success', $position->nama . ' Deleted Successfully');
    }

    //tampilan view trash
    public function trash()
    {
        $trashed = Posisi::onlyTrashed()->get();
        // dd($trashed);
        return view('trash.posisi', [
            'positions' => $trashed,
            'title' => 'Deleted Position',
        ]);
    }

    // merestore data
    public function restore(Posisi $posisi)
    {
        $posisi->restore();
        return redirect('/trash/position')->with('success', $posisi->nama . ' have been Restored');
    }
}
