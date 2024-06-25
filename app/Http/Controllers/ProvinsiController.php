<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ProvinsiController extends Controller
{
    public function index()
{
    $provinsi = Provinsi::withCount('kabupaten')
        ->with(['kabupaten' => function ($query) {
            $query->select('provinsi_id', DB::raw('SUM(jumlah_penduduk) as total_jumlah_penduduk'))
                  ->groupBy('provinsi_id');
        }])
        ->get();

    // Calculate total_jumlah_penduduk for each Provinsi
    foreach ($provinsi as $prov) {
        $total_jumlah_penduduk = $prov->kabupaten->sum('total_jumlah_penduduk');
        $prov->total_jumlah_penduduk = $total_jumlah_penduduk;
    }

    return view('provinsi.index', compact('provinsi'));
}


    public function show($id)
    {
        $provinsi = Provinsi::find($id);
        return $provinsi;
    }

    public function store(Request $request)
    {

            // Validate the request data
            $request->validate([
                'nama_provinsi' => 'required|string|max:255|unique:provinsi,nama_provinsi', // Ensure the name is unique
            ]);
    
            try {
                // Create a new Kabupaten record
                Provinsi::create([
                    'nama_provinsi' => $request->nama_provinsi,
                ]);
    
                // Redirect back with a success message
                return redirect()->back()->with('success', 'Data Provinsi berhasil ditambahkan.');
            } catch (QueryException $e) {
                // handle duplicate error
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->back()->withErrors(['error' => 'Data Provinsi sudah ada.']);
                }
              
                // Other errors
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

    }

    public function edit($id)
    {
        $provinsi = Provinsi::find($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::find($id);
        $provinsi->update($request->all());
        return redirect()->route('provinsi.index');
    }

    public function destroy($id)
    {
        Provinsi::find($id)->delete();
        return redirect()->route('provinsi.index');
    }

    
}