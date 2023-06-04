<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);
        return response()->json($mahasiswa);
    }
    public function __construct()
    {
    $this->middleware('auth:api')->except('index', 'show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:15',
            'nama' => 'required|string|max:150',
            'umur' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        $mahasiswa = Mahasiswa::create($validatedData);
        return response()->json([
            'message' => 'Mahasiswa created successfully',
            'data' => $mahasiswa
        ], 201);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:15',
            'nama' => 'required|string|max:150',
            'umur' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validatedData);
        return response()->json([
            'message' => 'Mahasiswa updated successfully',
            'data' => $mahasiswa
        ]);
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return response()->json([
            'message' => 'Mahasiswa deleted successfully'
        ], 204);
    }
}
