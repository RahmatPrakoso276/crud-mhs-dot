<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use App\Models\Mahasiswa;
use App\Models\ProdI;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Cari mahasiswa berdasarkan NIM jika ada parameter 'search'
        if ($request->has('search') && $request->search !== '') {
            $dataMahasiswa = Mahasiswa::where('nim', 'like', '%' . $request->search . '%')->get();
        } else {
            $dataMahasiswa = Mahasiswa::orderBy('id', 'asc')->get();
        }

        // Cek apakah request mengharapkan JSON
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $dataMahasiswa
            ], 200);
        }

        // Kembalikan HTML view jika request dari browser
        return view('mahasiswa.index', compact('dataMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = Prodi::all();
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }

        return view("mahasiswa.create", compact("data"));
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
                'nim' => 'required|string|unique:mahasiswas,nim|regex:/^[0-9]+$/|min:4|max:12',
                'name' => 'required|string|regex:/^[a-zA-Z\s\']+$/|min:3|max:255',
                'whatsapp' => 'required|string|regex:/^\+?[0-9]+$/|min:10|max:15',
                'prodi_id' => 'required|exists:prodis,id',
            ],
            [
                'nim.unique' => 'NIM sudah ada! silahkan masukkan NIM lain! ',
                'nim.required' => 'NIM harus diisi!',
                'nim.regex' => 'NIM harus angka!',
                'nim.min' => 'nim harus minimal 4 angka!',
                'nim.max' => 'nim tidak boleh lebih dari 12 angka!',
                'name.required' => 'Kolom name harus diisi.',
                'name.regex' => 'Nama hanya boleh mengandung huruf, spasi, dan tanda petik tunggal.',
                'name.min' => 'Nama harus minimal 3 karakter.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'whatsapp.required' => 'Nomor WhatsApp harus diisi.',
                'whatsapp.regex' => 'Nomor WhatsApp hanya boleh berisi angka dan diawali dengan tanda "+" jika diperlukan.',
                'whatsapp.min' => 'Nomor WhatsApp harus minimal 10 karakter.',
                'whatsapp.max' => 'Nomor WhatsApp tidak boleh lebih dari 15 karakter.',
                'prodi_id.required' => 'Program studi harus dipilih.',
                'prodi_id.exists' => 'Program studi tidak valid.',
            ]
        );

        $data = [
            'nim' => $request->input('nim'),
            'name' => $request->input('name'),
            'whatsapp' => $request->input('whatsapp'),
            'prodi_id' => $request->input('prodi_id'),
        ];
        //siman post ke database
        $mahasiswa = Mahasiswa::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan!',
                'data' => $mahasiswa
            ], 201); // 201: Created
        }

        return redirect()->route('mahasiswa.create')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa, Request $request)
    {
        $dataProdi = Prodi::all();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'mahasiswa' => $mahasiswa,
                    'prodi' => $dataProdi
                ]
            ]);
        }

        return view("mahasiswa.update", compact("dataProdi", "mahasiswa"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate(
            [
                'nim' => [
                    'required',
                    'string',
                    'regex:/^[0-9]+$/',
                    'min:4',
                    'max:12',
                    // Abaikan validasi unique jika NIM milik mahasiswa yang sedang di-update
                    Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa->id),
                ],
                'name' => 'required|string|regex:/^[a-zA-Z\s\']+$/|min:3|max:255',
                'whatsapp' => 'required|string|regex:/^\+?[0-9]+$/|min:10|max:15',
                'prodi_id' => 'required|exists:prodis,id',
            ],
            [
                'nim.unique' => 'NIM sudah ada! silahkan masukkan NIM lain! ',
                'nim.required' => 'NIM harus diisi!',
                'nim.regex' => 'NIM harus angka!',
                'nim.min' => 'nim harus minimal 4 angka!',
                'nim.max' => 'nim tidak boleh lebih dari 12 angka!',
                'name.required' => 'Kolom name harus diisi.',
                'name.regex' => 'Nama hanya boleh mengandung huruf, spasi, dan tanda petik tunggal.',
                'name.min' => 'Nama harus minimal 3 karakter.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'whatsapp.required' => 'Nomor WhatsApp harus diisi.',
                'whatsapp.regex' => 'Nomor WhatsApp hanya boleh berisi angka dan diawali dengan tanda "+" jika diperlukan.',
                'whatsapp.min' => 'Nomor WhatsApp harus minimal 10 karakter.',
                'whatsapp.max' => 'Nomor WhatsApp tidak boleh lebih dari 15 karakter.',
                'prodi_id.required' => 'Program studi harus dipilih.',
                'prodi_id.exists' => 'Program studi tidak valid.',
            ]
        );

        $data = [
            'nim' => $request->input('nim'),
            'name' => $request->input('name'),
            'whatsapp' => $request->input('whatsapp'),
            'prodi_id' => $request->input('prodi_id'),
        ];
        // Update nama mahasiswa
        $mahasiswa->update($data);


        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah!',
                'data' => $mahasiswa
            ]);
        }

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa, Request $request)
    {
        $mahasiswa->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus');
    }
}
