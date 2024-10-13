<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search !== '') {
            $dataProdi = Prodi::where('nama', 'like', '%' . $request->search . '%')->get();
        } else {
            $dataProdi = Prodi::orderBy('id', 'asc')->get();
        }

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $dataProdi
            ]);
        }
        return view("prodi.index", compact("dataProdi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Form untuk tambah prodi',
            ]);
        }

        return view("prodi.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:3|unique:prodis,nama'
            ],
            [
                'nama.required' => "Kolom harus diisi",
                'nama.min' => 'Minimal 3 karakter!',
                'nama.unique' => 'Nama prodi sudah ada! silahkan masukkan nama lain! '
            ]

        );

        $data = [
            'nama' => $request->input('nama'),
        ];
        //siman post ke database
        $prodi = Prodi::create($data);


        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan!',
                'data' => $prodi
            ], 201); // 201: Created
        }
        return redirect()->route('prodi.create')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $Prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Prodi $prodi)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $prodi
            ]);
        }

        return view('prodi.update', compact('prodi'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $Prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate(
            [
                'nama' => 'required|min:3|unique:prodis,nama'
            ],
            [
                'nama.required' => 'Nama prodi harus diisi!!',
                'nama.min' => 'Minimal 3 Karakter!',
                'nama.unique' => 'Nama prodi sudah ada! silahkan masukkan nama lain! '

            ]

        );
        // Update nama prodi
        $prodi->update(['nama' => $request->input('nama')]);


        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah!',
                'data' => $prodi
            ]);
        }
        return redirect()->route('prodi.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $Prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi, Request $request)
    {
        $prodi->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
        return redirect()->route('prodi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
