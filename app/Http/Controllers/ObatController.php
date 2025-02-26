<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\obatM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = obatM::all();
        return view('admin.dataobat.obat', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dataobat.obatcreate');
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
            'nama_obat' => 'required',
            'stok' => 'required',
        ]);

        obatM::create($validatedData);

        return redirect()->route('obat.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    
    public function edit($id)
    {
        $obat = obatM::find($id);
        return view('admin.dataobat.obatedit', compact('obat'));
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
        $o = obatM::findOrFail($id);
        
        $o->update([
            'nama_obat' =>$request->nama_obat,
            'stok' =>$request->stok,
        ]);
        return redirect()->route('obat.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $o = obatM::findOrFail($id);
        $o->delete();

        return redirect()->route('obat.index')->with('success', 'Data berhasil dihapus.');
    }
}
