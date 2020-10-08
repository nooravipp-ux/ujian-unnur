<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\nilai;
use App\paket_soal;
use DB;

class MhsController extends Controller
{
    public function index_ujian(){

        $id_prodi = Auth::user()->id_prodi;

        $data_paket = DB::table('tbl_paket_soal')
                ->join('tbl_role_soal','tbl_paket_soal.id_paket_soal','=','tbl_role_soal.id_paket_soal')
                ->where('tbl_role_soal.id_prodi', $id_prodi)
                ->get();
 
        $id_mhs = Auth::user()->id;

        return view('mhs.ujian.index', compact('data_paket','id_mhs'));
    }

    public function tampil_ujian($id){
        
        $data_soal = DB::table('tbl_paket_soal')
                ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->get();
                
        $jumlah_soal = DB::table('tbl_paket_soal')
                ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->count();

        $no = "0";
        
        $waktu = DB::select("select waktu from tbl_paket_soal where id_paket_soal ='".$id."'");
        $sorted_waktu = Arr::get($waktu,0);
        $sortedd_waktu = Arr::flatten($sorted_waktu);
        $waktu_pengerjaan = Arr::get($sortedd_waktu,0);



        return view('mhs.ujian.ujian', compact('data_soal','jumlah_soal','no','waktu_pengerjaan'));
    }

   


    public function cek_jawaban(Request $request){

        $pilihan = $request->pilihan;
        $id_soal = $request->id_soal;
        $jumlah_soal = $request->jumlah_soal;
        //dd($jumlah_soal);

         $benar = 0;
         $salah = 0;
         $kosong = 0;
         $hasil_nilai = 0;

        for($i = 0; $i < $jumlah_soal; $i++){
            // nomor soal
            $nomor = $id_soal[$i];
            
            if(empty($pilihan[$nomor])){
                $kosong++;
            }else{
                //cek kunci jawaban
                $kunci = DB::select("select kunci from tbl_soal where id_soal ='".$nomor."'");
                $sorted_kunci = Arr::get($kunci,0);
                $sortedd_kunci = Arr::flatten($sorted_kunci);
                $kunci_jawaban = Arr::get($sortedd_kunci,0);

                //ambil nilai
                $nilai = DB::select("select nilai_soal from tbl_soal where id_soal ='".$nomor."'");
                $sorted_nilai = Arr::get($nilai,0);
                $sortedd_nilai = Arr::flatten($sorted_nilai);
                $nilai_jawaban = Arr::get($sortedd_nilai,0);         

                //jawabann yang di pilih
                $jawaban = $pilihan[$nomor];

                if($jawaban == $kunci_jawaban){
                    $benar++;
                    $hasil_nilai += $nilai_jawaban;
                }else{
                    $salah++;
                }
            }
            //dump($nilai_jawaban);
        }
        //dd($hasil_nilai);

            
        $id_mhs = Auth::user()->id;

        DB::table('tbl_nilai')->insert([
            'id_mhs' => $id_mhs,
            'id_paket_soal' => $request->id_paket_soal,
            'nilai' => $hasil_nilai,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
        
        return redirect('/mhs/ujian');
    }
}
