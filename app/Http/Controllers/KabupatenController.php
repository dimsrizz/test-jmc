<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class KabupatenController extends Controller
{
    public function index()
    {
        try {
            $kabupaten = Kabupaten::with('provinsi')->get();
            $provinsi = Provinsi::all();
            return view('kabupaten.index', compact('kabupaten', 'provinsi'));
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@index: ' . $e->getMessage());
            return back()->withError('Terjadi kesalahan saat memuat data.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateKabupaten($request);
            Kabupaten::create($validatedData);
            return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return $this->handleQueryException($e);
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@store: ' . $e->getMessage());
            return back()->withError('Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function show(Kabupaten $kabupaten)
    {
        try {
            return $kabupaten->load('provinsi');
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@show: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat memuat data Kabupaten.'], 500);
        }
    }

    public function edit(Kabupaten $kabupaten)
    {
        try {
            $provinsi = Provinsi::all();
            return view('kabupaten.edit', compact('kabupaten', 'provinsi'));
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@edit: ' . $e->getMessage());
            return back()->withError('Terjadi kesalahan saat memuat halaman edit.');
        }
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        try {
            $validatedData = $this->validateKabupaten($request, $kabupaten->id);
            $kabupaten->update($validatedData);
            return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil diperbarui.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return $this->handleQueryException($e);
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@update: ' . $e->getMessage());
            return back()->withError('Terjadi kesalahan saat memperbarui data.')->withInput();
        }
    }

    public function destroy(Kabupaten $kabupaten)
    {
        try {
            $kabupaten->delete();
            return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@destroy: ' . $e->getMessage());
            return back()->withError('Terjadi kesalahan saat menghapus data.');
        }
    }

    public function filter(Request $request)
    {
        try {
            $search = $request->input('search');
            $kabupaten = Kabupaten::query()
                ->when($search, function ($query) use ($search) {
                    return $query->where('nama_kabupaten', 'like', "%{$search}%")
                        ->orWhereHas('provinsi', function ($q) use ($search) {
                            $q->where('nama_provinsi', 'like', "%{$search}%");
                        });
                })
                ->with('provinsi')
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'nama_kabupaten' => $item->nama_kabupaten,
                        'jumlah_penduduk' => $item->jumlah_penduduk,
                        'nama_provinsi' => $item->provinsi->nama_provinsi
                    ];
                });

            return response()->json($kabupaten);
        } catch (\Exception $e) {
            Log::error('Error in KabupatenController@filter: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat memfilter data.'], 500);
        }
    }

    private function validateKabupaten(Request $request, $id = null)
    {
        return $request->validate([
            'provinsi_id' => 'required|exists:provinsi,id',
            'nama_kabupaten' => 'required|string|max:255|unique:kabupaten,nama_kabupaten,' . $id,
            'jumlah_penduduk' => 'required|integer|min:0',
        ]);
    }

    private function handleQueryException(QueryException $e)
    {
        Log::error('Database error: ' . $e->getMessage());
        if ($e->getCode() == 23000) {
            return back()->withErrors(['duplicate' => 'Nama Kabupaten sudah ada.'])->withInput();
        }
        return back()->withErrors(['error' => 'Terjadi kesalahan database.'])->withInput();
    }
}