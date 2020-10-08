<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KategoriSoalController extends Controller
{
    public function index() {

        $data_kategori = DB::table('tbl_kategori_soal')->get(); 

        return view('dosen.kategori_soal.index', compact('data_kategori'));
    }

    public function generate_id_kategori(){
        $no_urut_so = "";
        $no = 1;
        $no_urut = DB::select("select max(id_kategori_soal) as kode from tbl_kategori_soal");

        foreach($no_urut as $so){
            $kode = substr($so->kode,3,3);
            $tambah = $kode + 1;
            if($tambah < 10){
                return $no_urut_so = "KAT00".$tambah;
            }else if($so->kode == NULL){
                return $no_urut_so = sprintf("KAT001");
            }else{
                return $no_urut_so = "KAT".$tambah;
            }
        } 
    }

    public function simpan_kategori(Request $request){

        $this->validate($request, [
            'nama_kategori_soal' =>['required','unique:tbl_kategori_soal'],
        ]);

        $kodeautokategori = $this->generate_id_kategori();

        DB::table('tbl_kategori_soal')->insert([
            'id_kategori_soal' => $kodeautokategori ,
            'nama_kategori_soal' => $request->nama_kategori_soal,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect('/dosen/kategori_soal');
    }

    public function get_kategori(Request $request){
        $data = DB::table('tbl_kategori_soal')->where('id_kategori_soal', $request->id_kategori_soal)->first();

        return response()->json($data);
    }

    public function ubah_kategori(Request $request){

        DB::table('tbl_kategori_soal')
        ->where('id_kategori_soal', $request->id_kategori_soal)
        ->update([
            'nama_kategori_soal' => $request->nama_kategori_soal
        ]);

        return redirect('/dosen/kategori_soal');    
    }

    public function hapus_kategori($id){

        DB::table('tbl_kategori_soal')
        ->where('id_kategori_soal', $id)
        ->delete();

        return redirect('/dosen/kategori_soal');
    }

}


