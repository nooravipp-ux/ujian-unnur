<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Image;

class SoalController extends Controller
{
    public function index(){

        $data_paket = DB::table('tbl_kategori_soal')
        ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
        ->get(); 

        return view('dosen.soal.index', compact('data_paket'));
    }

    public function generate_id_paket(){
        $no_urut_so = "";
        $no = 1;
        $no_urut = DB::select("select max(id_paket_soal) as kode from tbl_paket_soal");

        foreach($no_urut as $so){
            $kode = substr($so->kode,3,3);
            $tambah = $kode + 1;
            if($tambah < 10){
                return $no_urut_so = "PKT00".$tambah;
            }else if($so->kode == NULL){
                return $no_urut_so = sprintf("PKT001");
            }else{
                return $no_urut_so = "PKT".$tambah;
            }
        } 
    }

    public function simpan_paket(Request $request){

        $kodeautopaket = $this->generate_id_paket();

        DB::table('tbl_paket_soal')->insert([
            'id_paket_soal' => $kodeautopaket,
            'id_kategori_soal' => $request->kategori_soal,
            'nama_paket_soal' => $request->nama_paket_soal,
            'waktu' =>$request->waktu,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect('/dosen/paket_soal');
    }

    public function ubah_paket(Request $request){

        DB::table('tbl_paket_soal')
        ->where('id_paket_soal', $request->id_paket_soal)
        ->update([
            'id_kategori_soal' => $request->kategori_soal,
            'nama_paket_soal' => $request->nama_paket_soal,
            'waktu' => $request->waktu
        ]);

        return redirect('/dosen/paket_soal');    
    }

    public function hapus_paket($id){

        DB::table('tbl_paket_soal')
        ->where('id_paket_soal', $id)
        ->delete();

        DB::table('tbl_soal')
        ->where('id_paket_soal', $id)
        ->delete();

        return redirect('/dosen/paket_soal');
    }

    public function get_paket(Request $request){
        $data = DB::table('tbl_kategori_soal')
        ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
        ->where('tbl_paket_soal.id_paket_soal', $request->id_paket_soal)->first();

        return response()->json($data);
    }

    public function get_data_kategori(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_kategori = DB::table('tbl_kategori_soal')
            ->where('id_kategori_soal', 'LIKE', '%'.$cari.'%')
            ->orWhere('nama_kategori_soal', 'LIKE', '%'.$cari.'%')
            ->get();
    
            return response()->json($data_kategori);
        }

        $data_kategori = DB::table('tbl_kategori_soal')->get();

        return response()->json($data_kategori);
    }

    public function tampil_input_soal($id){

        $id_prodi = Auth::user()->id_prodi;

        $cek_role_soal = $this->cek_role_soal($id,$id_prodi);

        $data_paket = DB::table('tbl_kategori_soal')
        ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
        ->where('tbl_paket_soal.id_paket_soal', $id)->first();

        $data_soal = DB::table('tbl_paket_soal')
        ->join('tbl_soal','tbl_paket_soal.id_paket_soal','=','tbl_soal.id_paket_soal')
        ->where('tbl_paket_soal.id_paket_soal', $id)->get();

        return view('dosen.soal.input', compact('data_paket','data_soal','cek_role_soal'));
    }

    public function simpan_soal(Request $request){

        if(!empty($request->gambar)){
            $gambar = Image::make($request->gambar)->fit(400)->encode('data-url');

            DB::table('tbl_soal')->insert([
                'id_paket_soal' => $request->id_paket_soal,
                'soal' => $request->soal,
                'pilihan_a' => $request->pil_a,
                'pilihan_b' => $request->pil_b,
                'pilihan_c' => $request->pil_c,
                'pilihan_d' => $request->pil_d,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                'gambar' => $gambar,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal')->insert([
                'id_paket_soal' => $request->id_paket_soal,
                'soal' => $request->soal,
                'pilihan_a' => $request->pil_a,
                'pilihan_b' => $request->pil_b,
                'pilihan_c' => $request->pil_c,
                'pilihan_d' => $request->pil_d,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
        
        return back();

    }

    public function hapus_soal($id){

        DB::table('tbl_soal')
        ->where('id_soal', $id)
        ->delete();

        return back();
    }

    public function get_soal(Request $request){

        $data = DB::table('tbl_soal')->where('id_soal', $request->id_soal)->first();

        return response()->json($data);
    }

    public function ubah_soal(Request $request){

        if(!empty($request->gambar)){
            $gambar = Image::make($request->gambar)->fit(400)->encode('data-url');

            DB::table('tbl_soal')
            ->where('id_soal', $request->id_soal)
            ->update([
                'soal' => $request->soal,
                'pilihan_a' => $request->pil_a,
                'pilihan_b' => $request->pil_b,
                'pilihan_c' => $request->pil_c,
                'pilihan_d' => $request->pil_d,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                'gambar' => $gambar,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal')
            ->where('id_soal', $request->id_soal)
            ->update([
                'soal' => $request->soal,
                'pilihan_a' => $request->pil_a,
                'pilihan_b' => $request->pil_b,
                'pilihan_c' => $request->pil_c,
                'pilihan_d' => $request->pil_d,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

        return back();
    }

    public function role_soal($id){

        $id_prodi = Auth::user()->id_prodi;

        DB::table('tbl_role_soal')->insert([
            'id_paket_soal' => $id,
            'id_prodi' => $id_prodi,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return back();
    }

    public function hapus_role_soal($id){

        $id_prodi = Auth::user()->id_prodi;

        DB::table('tbl_role_soal')
        ->where([
            ['id_paket_soal', $id],
            ['id_prodi', $id_prodi]
        ])
        ->delete();

        return back();
    }

    public function cek_role_soal($id_paket,$id_prodi){
        $data_role = DB::table('tbl_role_soal')
        ->where([
            ['id_paket_soal', $id_paket],
            ['id_prodi', $id_prodi]
        ])
        ->count();
        
        if($data_role == "1"){
            return true;
        }else{
            return false;
        }
    }
}
