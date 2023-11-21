<?php
    namespace App\Http\Controllers;

    use App\Models\Peminjaman;
    use App\Models\Pelanggan;
    use App\Models\Mobil;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;

    class PeminjamanController extends Controller
    {
        public function index()
        {
            $peminjamans = Peminjaman::all();
            return view('peminjamans.index', compact('peminjamans'));
        }

        public function create()
        {
            $pelanggans = Pelanggan::all();
            $mobils = Mobil::all()->where('status_peminjaman', 'tersedia');
            return view('peminjamans.create', compact(['pelanggans', 'mobils']));
        }

        public function store(Request $request)
        {
           
            $peminjamans = new Peminjaman($request->all());
            $peminjamans->pelanggan_id = Auth::id();
            $start = Carbon::parse($request->tanggal_peminjaman);
            $end = Carbon::parse($request->tanggal_pengembalian);
            $totalDays = $end->diffInDays($start);

            $mobil = Mobil::find($request->mobil_id);
            $totalBiaya = $totalDays * $mobil->tarif_sewa;
            
            $peminjamans->total_biaya = $totalBiaya;

            $peminjamans->save();

            $status_mobil = Mobil::find($request->input('mobil_id'));
            $status_mobil->status_peminjaman = 'dipinjam';
            $status_mobil->save();

            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully');
        }

        public function show(Peminjaman $peminjaman)
        {
            return view('peminjamans.show', compact('peminjaman'));
        }

        public function edit(Peminjaman $peminjaman)
        {
            return view('peminjaman.edit', compact('peminjaman'));
        }

        public function update(Request $request, Peminjaman $peminjaman)
        {
            // Implement validation as needed
            $peminjaman->update($request->all());

            // Check if the status is complete or canceled
            if ($request->status_peminjaman === 'selesai' || $request->status_peminjaman === 'dibatalkan') {
                // If the status is complete or canceled, mark the car as available
                $this->markCarAsAvailable($peminjaman->mobil_id);
            }

            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman updated successfully');
        }

        private function markCarAsAvailable($mobilId)
        {
            // Logic to mark the car as available
            // Assuming 'status_peminjaman' is a field in the 'mobils' table
            $mobil = Mobil::find($mobilId);
            if ($mobil) {
                $mobil->update(['status_peminjaman' => 'sedang diproses']);
            }
        }

        public function destroy(Peminjaman $peminjaman)
        {
            $peminjaman->delete();

            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman deleted successfully');
        }

    }