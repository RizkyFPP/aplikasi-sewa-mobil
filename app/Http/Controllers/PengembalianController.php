<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Mobil;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::all();
        return view('pengembalians.index', compact('pengembalians'));
    }

    public function create()
    {
        $peminjamans = Peminjaman::all();
        $mobils = Mobil::all();
        return view('pengembalians.create', compact(['mobils', 'peminjamans']));
    }

    public function store(Request $request)
    {
        
        $pengembalian = new Pengembalian([
            'peminjaman_id' => $request->input('peminjaman_id'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
            'km_awal' => $request->input('km_awal'),
            'km_akhir' => $request->input('km_akhir'),
        ]);

        $pengembalian->save();

        $peminjaman = Peminjaman::find($request->input('peminjaman_id'));
        $status_mobil = Mobil::find($peminjaman->mobil_id);
        $peminjaman->status_peminjaman = 'selesai';
        $status_mobil->status_peminjaman = 'tersedia';
        $status_mobil->save();
        $peminjaman->save();

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian created successfully');
    }

    public function show(Pengembalian $pengembalian)
    {
        return view('pengembalians.show', compact('pengembalian'));
    }

    public function edit(Pengembalian $pengembalian)
    {
        return view('pengembalians.edit', compact('pengembalian'));
    }

    public function update(Request $request, Pengembalian $pengembalian)
    {
        // Implement validation as needed
        $pengembalian->update($request->all());

        $this->updatePeminjamanStatus($pengembalian->peminjaman_id);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian updated successfully');
    }

    private function updatePeminjamanStatus($peminjamanId)
    {
        $peminjaman = Peminjaman::find($peminjamanId);
        if ($peminjaman) {
            $status = $peminjaman->pengembalians->isEmpty() ? 'sedang diproses' : 'selesai';
            $peminjaman->status_peminjaman = $status;
            $peminjaman->save();
        }
    }

    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian deleted successfully');
    }
}