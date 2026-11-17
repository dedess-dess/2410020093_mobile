<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class PengajuanCutiController extends Controller
{
    public function index()
    {
        return PengajuanCuti::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'hak_cuti' => 'sometimes|integer',
            'sisa_cuti' => 'required|integer',
            'ambil_cuti' => 'required|integer|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'sometimes|in:menunggu,disetujui,ditolak',
        ]);

        return response()->json(PengajuanCuti::create($data), 201);
    }

    public function show($id)
    {
        $cuti = PengajuanCuti::find($id);

        if (!$cuti) {
            return response()->json([]);
        }

        return $cuti;
    }

    public function update(Request $request, $id)
    {
        $cuti = PengajuanCuti::find($id);

        if (!$cuti) {
            return response()->json([]);
        }

        $data = $request->validate([
            'karyawan_id' => 'sometimes|required|exists:karyawan,id',
            'hak_cuti' => 'sometimes|integer',
            'sisa_cuti' => 'sometimes|required|integer',
            'ambil_cuti' => 'sometimes|required|integer|min:1',
            'tanggal_mulai' => 'sometimes|required|date',
            'tanggal_akhir' => 'sometimes|required|date',
            'alasan' => 'sometimes|required|string',
            'status' => 'sometimes|in:menunggu,disetujui,ditolak',
        ]);

        $cuti->update($data);
        return $cuti;
    }

    public function destroy($id)
    {
        $cuti = PengajuanCuti::find($id);

        if (!$cuti) {
            return response()->json([]);
        }

        $cuti->delete();
        return response()->noContent();
    }
}