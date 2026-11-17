<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        return Karyawan::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|string|unique:karyawan',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'divisi' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:karyawan',
            'username' => 'required|string|unique:karyawan',
            'password' => 'required|string|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);

        return response()->json(Karyawan::create($data), 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([]);
        }

        return $karyawan;
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([]);
        }

        $data = $request->validate([
            'nik' => 'sometimes|required|string|unique:karyawan,nik,' . $karyawan->id,
            'nama' => 'sometimes|required|string',
            'no_hp' => 'sometimes|required|string',
            'divisi' => 'sometimes|required|string',
            'jenis_kelamin' => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'email' => 'sometimes|required|email|unique:karyawan,email,' . $karyawan->id,
            'username' => 'sometimes|required|string|unique:karyawan,username,' . $karyawan->id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $karyawan->update($data);
        return $karyawan;
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([]);
        }

        $karyawan->delete();
        return response()->noContent();
    }
}