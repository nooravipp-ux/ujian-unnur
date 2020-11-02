<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use DB;

class LaporanController extends Controller
{
    public function index(){

        $data_kategori = DB::table('tbl_kategori_soal')
                        ->get();

        return view('dosen.laporan.index', compact('data_kategori'));
    }

    public function get_data_paket($id){
        $data_paket = DB::table('tbl_paket_soal')
        ->join('tbl_role_soal','tbl_paket_soal.id_paket_soal','=','tbl_role_soal.id_paket_soal')
        ->where([
            ['id_kategori_soal', $id],
            ['id_dosen', Auth::user()->id],
            ['id_prodi', Auth::user()->id_prodi]
        ])
        ->get();

        return view('dosen.laporan.list-paket', compact('data_paket'));
    }

    public function get_data_mhs($id){

        $list_mhs = DB::table('tbl_paket_soal')
                    ->join('tbl_nilai','tbl_paket_soal.id_paket_soal','=','tbl_nilai.id_paket_soal')
                    ->join('users','tbl_nilai.id_mhs','=','users.id')
                    ->where('tbl_nilai.id_paket_soal', $id)
                    ->get();

        $nama = DB::select("select nama_paket_soal from tbl_paket_soal where id_paket_soal ='".$id."'");
        $sorted_paket = Arr::get($nama,0);
        $sortedd_paket = Arr::flatten($sorted_paket);
        $nama_paket = Arr::get($sortedd_paket,0);            

        return view('dosen.laporan.list-mhs', compact('list_mhs','nama_paket'));         
    }

    public function get_detail_mhs($id_mhs, $id_paket){

        
        $data_mhs = DB::table('tbl_kategori_soal')
                    ->select(
                        'users.id',
                        'users.username',
                        'users.name',
                        'users.id_prodi',
                        'tbl_kategori_soal.nama_kategori_soal',
                        'tbl_paket_soal.nama_paket_soal',
                        'tbl_nilai.created_at'
                    )
                    ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
                    ->join('tbl_nilai','tbl_paket_soal.id_paket_soal','=','tbl_nilai.id_paket_soal')
                    ->join('users','tbl_nilai.id_mhs','=','users.id')
                    ->where([
                        ['users.id', $id_mhs],
                        ['tbl_paket_soal.id_paket_soal', $id_paket]
                    ])
                    ->first();
        
        $data_jawab_pg = DB::table('tbl_paket_soal')
                    ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
                    ->join('tbl_jawab_pg','tbl_soal.id_soal','=','tbl_jawab_pg.id_soal')
                    ->where([
                        ['tbl_jawab_pg.id_mhs', $id_mhs],
                        ['tbl_paket_soal.id_paket_soal', $id_paket]
                        ])    
                    ->get();
        
        $data_jawab_essay = DB::table('tbl_paket_soal')
                    ->join('tbl_soal_essay','tbl_paket_soal.id_paket_soal','=','tbl_soal_essay.id_paket_soal')
                    ->join('tbl_jawab_essay','tbl_soal_essay.id_soal_essay','=','tbl_jawab_essay.id_soal_essay')
                    ->where([
                        ['tbl_jawab_essay.id_mhs', $id_mhs],
                        ['tbl_paket_soal.id_paket_soal', $id_paket]
                        ])    
                    ->get();
        $data_nilai = DB::table('tbl_nilai')
                    ->where([
                        ['id_mhs', $id_mhs],
                        ['id_paket_soal', $id_paket]
                        ])  
                    ->first();                          

        return view('dosen.laporan.detail-mhs', compact('data_mhs','data_jawab_pg','data_jawab_essay','data_nilai'));
    }

    public function get_data_jawaban_essay(Request $request){

        $data = DB::table('tbl_soal_essay')
                    ->join('tbl_jawab_essay','tbl_soal_essay.id_soal_essay','=','tbl_jawab_essay.id_soal_essay')
                    ->where([
                        ['tbl_jawab_essay.id_soal_essay', $request->id_soal_essay]
                        ])    
                    ->first();
        return response()->json($data);
    }

    public function confirm_nilai(Request $request){

        $nilai = $request->nilai_pg + $request->nilai_essay;

        $data_mhs = DB::table('users')->where('id',$request->id_mhs)->first();

        if($data_mhs->status == "calon"){
            DB::table('tbl_nilai')->where('id_mhs', $request->id_mhs)->update([
                'nilai_essay' => $request->nilai_essay,
                'nilai'=> $nilai
            ]);
    
            $db_pmb = DB::connection('mysql3');
    
            $update_nilai = $db_pmb->table('pmb_pendaftar')->where('id_test', $request->username)->update(['nilai_ujian' => $nilai]);
        }else{
            DB::table('tbl_nilai')->where('id_mhs', $request->id_mhs)->update([
                'nilai_essay' => $request->nilai_essay,
                'nilai'=> $nilai
            ]);
        }

        return back();    
    }
}
