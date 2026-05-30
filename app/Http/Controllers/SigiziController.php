<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Pengukuran;
use App\Models\Pengguna;
use App\Models\Wilayah;
use App\Models\Posyandu;
use App\Models\Artikel;
use App\Models\Jadwal;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;

class SigiziController extends Controller {
    
    public function index() {
        try {
            // 1. Otomatis isi data akun ke MySQL jika masih kosong
            if (Schema::hasTable('penggunas') && DB::table('penggunas')->count() == 0) {
                $penggunas = [
                    ['username'=>'admin','password'=>'admin123','role'=>'admin','nama'=>'Admin Puskesmas','nip'=>'1234567890'],
                    ['username'=>'9876543210','password'=>'9876543210','role'=>'bidan','nama'=>'Bidan Sari Dewi','nip'=>'9876543210'],
                    ['username'=>'6101234567890001','password'=>'6101234567890001','role'=>'ortu','nama'=>'Ibu Rahayu','nik'=>'6101234567890001'],
                    ['username'=>'6101111222333444','password'=>'6101111222333444','role'=>'ortu','nama'=>'Ibu Fatimah','nik'=>'6101111222333444']
                ];
                DB::table('penggunas')->insert($penggunas);
            }

            // 2. Otomatis isi data wilayah jika masih kosong
            if (Schema::hasTable('wilayahs') && DB::table('wilayahs')->count() == 0) {
                $wilayahs = [
                    ['nama'=>'Sungai Durian'],
                    ['nama'=>'Kapur'],
                    ['nama'=>'Punggur Kecil'],
                    ['nama'=>'Seruat'],
                    ['nama'=>'Sei Ambawang']
                ];
                DB::table('wilayahs')->insert($wilayahs);
            }

            // 3. Ambil data asli langsung dari Model
            $users      = Pengguna::all();
            $wilayah    = Wilayah::all();
            $posyandu   = Posyandu::all();
            $artikel    = Artikel::all(); 
            $jadwal     = Jadwal::all(); 
            $anak       = Balita::all();
            $pengukuran = Pengukuran::all();
            $notifikasi = Notifikasi::all(); 

            return view('sigizi', compact('anak', 'pengukuran', 'users', 'wilayah', 'posyandu', 'artikel', 'jadwal', 'notifikasi'));

        } catch (Exception $e) {
            // Jika koneksi MySQL bermasalah, paksa tampilkan pesan error aslinya ke layar browser
            dd("Laravel gagal terhubung ke phpMyAdmin! Alasan error: " . $e->getMessage());
        }
    }

    // --- API STORE METHODS ---
    
    public function storeBalita(Request $request) {
        try {
            $data = $request->all(); 
            unset($data['id']); // Hapus ID agar tidak bentrok dengan AUTO_INCREMENT

            // Konversi camelCase ke snake_case dan hapus key lamanya agar tidak dikirim ke MySQL
            if (isset($data['tglLahir'])) { 
                $data['tgl_lahir'] = $data['tglLahir']; 
                unset($data['tglLahir']);
            }
            if (isset($data['jenisKelamin'])) { 
                $data['jenis_kelamin'] = $data['jenisKelamin']; 
                unset($data['jenisKelamin']);
            }
            if (isset($data['namaIbu'])) { 
                $data['nama_ibu'] = $data['namaIbu']; 
                unset($data['namaIbu']);
            }
            if (isset($data['nikIbu'])) { 
                $data['nik_ibu'] = $data['nikIbu']; 
                unset($data['nikIbu']);
            }
            if (isset($data['noHP'])) { 
                $data['no_hp'] = $data['noHP']; 
                unset($data['noHP']);
            }
            
            $res = Balita::create($data); 
            return response()->json(['success' => true, 'data' => $res]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Balita.', 'error' => $e->getMessage()], 500);
        }
    }

    public function storePengukuran(Request $request) {
        try {
            $data = $request->all(); 
            unset($data['id']);

            // Tentukan id_anak dari berbagai kemungkinan request frontend
            $idAnak = $data['idAnak'] ?? $data['id_anak'] ?? $data['balita_id'] ?? 1;
            $data['id_anak'] = $idAnak; 
            
            // Bersihkan sisa-sisa key lama agar tidak menyebabkan error "Column not found"
            unset($data['idAnak'], $data['balita_id']);
            
            $res = Pengukuran::create($data); 
            return response()->json(['success' => true, 'data' => $res]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Pengukuran.', 'error' => $e->getMessage()], 500);
        }
    }


    public function storeWilayah(Request $request) { 
        try {
            $data = $request->all(); 
            unset($data['id']); 
            $res = Wilayah::create($data); 
            return response()->json(['success' => true, 'data' => $res]); 
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Wilayah.', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function storePosyandu(Request $request) { 
        try {
            $data = $request->all(); 
            unset($data['id']); 
            $res = Posyandu::create($data); 
            return response()->json(['success' => true, 'data' => $res]); 
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Posyandu.', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function storePengguna(Request $request) { 
    try {
        $data = $request->all(); 
        unset($data['id']);
        unset($data['idAnak']); // ← tambah ini
        $res = Pengguna::create($data); 
        return response()->json(['success' => true, 'data' => $res]); 
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Pengguna.', 'error' => $e->getMessage()], 500);
    }
}
    
    public function storeArtikel(Request $request) { 
        try {
            $data = $request->all(); 
            unset($data['id']); 
            $res = Artikel::create($data); 
            return response()->json(['success' => true, 'data' => $res]); 
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Artikel.', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function storeJadwal(Request $request) { 
        try {
            $data = $request->all(); 
            unset($data['id']); 
            $res = Jadwal::create($data); 
            return response()->json(['success' => true, 'data' => $res]); 
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Jadwal.', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function storeNotifikasi(Request $request) {
        try {
            $data = $request->all(); 
            unset($data['id']);

            if (isset($data['isRead'])) { 
                $data['is_read'] = $data['isRead']; 
                unset($data['isRead']);
            }
            
            $res = Notifikasi::create($data); 
            return response()->json(['success' => true, 'data' => $res]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data Notifikasi.', 'error' => $e->getMessage()], 500);
        }
    }
    public function destroyPengguna($id){
    \App\Models\Pengguna::findOrFail($id)->delete();
    return response()->json(['message' => 'Pengguna dihapus']);
    
}
// --- UPDATE METHODS ---

public function updateBalita(Request $request, $id) {
    try {
        $data = $request->all();
        unset($data['id']);
        if (isset($data['tglLahir']))     { $data['tgl_lahir']     = $data['tglLahir'];     unset($data['tglLahir']); }
        if (isset($data['jenisKelamin'])) { $data['jenis_kelamin'] = $data['jenisKelamin']; unset($data['jenisKelamin']); }
        if (isset($data['namaIbu']))      { $data['nama_ibu']      = $data['namaIbu'];      unset($data['namaIbu']); }
        if (isset($data['nikIbu']))       { $data['nik_ibu']       = $data['nikIbu'];       unset($data['nikIbu']); }
        if (isset($data['noHP']))         { $data['no_hp']         = $data['noHP'];         unset($data['noHP']); }
        Balita::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function updatePengukuran(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        if (isset($data['idAnak'])) { $data['id_anak'] = $data['idAnak']; unset($data['idAnak']); }
        Pengukuran::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function updateWilayah(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        Wilayah::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function updatePosyandu(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        Posyandu::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function updatePengguna(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        Pengguna::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}


public function updateArtikel(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        Artikel::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function updateJadwal(Request $request, $id) {
    try {
        $data = $request->all(); unset($data['id']);
        Jadwal::findOrFail($id)->update($data);
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

// --- DESTROY METHODS ---

public function destroyBalita($id) {
    try {
        Balita::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function destroyPengukuran($id) {
    try {
        Pengukuran::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function destroyWilayah($id) {
    try {
        Wilayah::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function destroyPosyandu($id) {
    try {
        Posyandu::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function destroyArtikel($id) {
    try {
        Artikel::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

public function destroyJadwal($id) {
    try {
        Jadwal::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}

}