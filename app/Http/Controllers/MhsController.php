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

        $data_paket = DB::table('tbl_kategori_soal')
                ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
                ->join('tbl_role_soal','tbl_paket_soal.id_paket_soal','=','tbl_role_soal.id_paket_soal')
                ->where([
                    ['tbl_role_soal.id_prodi', $id_prodi],
                    ['tbl_role_soal.status', 'aktif']
                    ])
                ->get();
 
        $id_mhs = Auth::user()->id;

        return view('mhs.ujian.index', compact('data_paket','id_mhs'));
    }

    public function tampil_ujian($id){
        
        $data_soal = DB::table('tbl_paket_soal')
                ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->inRandomOrder()
                ->get();
                
        $jumlah_soal = DB::table('tbl_paket_soal')
                ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->count();
        
        $data_soal_essay = DB::table('tbl_paket_soal')
                ->join('tbl_soal_essay','tbl_paket_soal.id_paket_soal','=','tbl_soal_essay.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->inRandomOrder()
                ->get();
                
        $jumlah_soal_essay = DB::table('tbl_paket_soal')
                ->join('tbl_soal_essay','tbl_paket_soal.id_paket_soal','=','tbl_soal_essay.id_paket_soal')
                ->where('tbl_paket_soal.id_paket_soal', $id)
                ->count();        

        $no = "0";
        $no_essay = "0";
        
        $waktu = DB::select("select waktu from tbl_paket_soal where id_paket_soal ='".$id."'");
        $sorted_waktu = Arr::get($waktu,0);
        $sortedd_waktu = Arr::flatten($sorted_waktu);
        $waktu_pengerjaan = Arr::get($sortedd_waktu,0);



        return view('mhs.ujian.ujian', compact('data_soal','jumlah_soal','no','no_essay','waktu_pengerjaan','data_soal_essay','jumlah_soal_essay'));
    }

   


    public function cek_jawaban(Request $request){
        //pilihan ganda
        $pilihan = $request->pilihan;
        $id_soal = $request->id_soal;
        $jumlah_soal = $request->jumlah_soal;
        $id_mhs = Auth::user()->id;

        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $hasil_nilai = 0;
        $hasil_pg = 0;
        //essay
        $jawaban_essay = $request->jawab_essay;
        $id_soal_essay = $request->id_soal_essay;
        $jumlah_soal_essay = $request->jumlah_soal_essay;


        if(empty($jumlah_soal_essay)){

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
                        //$hasil_nilai += $nilai_jawaban;
                        $hasil_nilai = $nilai_jawaban;
                        $hasil_pg += $nilai_jawaban;
                        
                    }else{
                        $salah++;
                        $hasil_nilai = 0;
                    }
                }
                //dump($hasil_nilai);
                DB::table('tbl_jawab_pg')->insert([
                    'id_mhs' => $id_mhs,
                    'id_paket_soal' => $request->id_paket_soal,
                    'id_soal' => $nomor,
                    'pilihan' => $jawaban,
                    'nilai_pilihan' => $hasil_nilai,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            }
            //dd($jumlah_soal);
        }else{

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
                        //$hasil_nilai += $nilai_jawaban;
                        $hasil_nilai = $nilai_jawaban;
                        $hasil_pg += $nilai_jawaban;
                        
                    }else{
                        $salah++;
                        $hasil_nilai = 0;
                    }
                }
                //dump($hasil_nilai);
                DB::table('tbl_jawab_pg')->insert([
                    'id_mhs' => $id_mhs,
                    'id_paket_soal' => $request->id_paket_soal,
                    'id_soal' => $nomor,
                    'pilihan' => $jawaban,
                    'nilai_pilihan' => $hasil_nilai,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            }

            for($i = 0; $i < $jumlah_soal_essay; $i++){

                $id_soal_essay_no = $id_soal_essay[$i];
    
                $jawab_essay = $jawaban_essay[$id_soal_essay_no];

                DB::table('tbl_jawab_essay')->insert([
                    'id_mhs' => $id_mhs,
                    'id_paket_soal' => $request->id_paket_soal,
                    'id_soal_essay' => $id_soal_essay_no,
                    'jawaban_essay' => $jawab_essay,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
                //dump($jawab_essay);
            }
            // dd($jumlah_soal_essay);

        }


        DB::table('tbl_nilai')->insert([
            'id_mhs' => $id_mhs,
            'id_paket_soal' => $request->id_paket_soal,
            'nilai_pg' => $hasil_pg,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
        
        return redirect('/mhs/ujian');
    }
}
