<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use DB;
use Image;

class SoalController extends Controller
{
    public function index(){

        $data_paket = DB::table('tbl_kategori_soal')
        ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
        ->join('tbl_role_soal','tbl_paket_soal.id_paket_soal','=','tbl_role_soal.id_paket_soal')
        ->where('tbl_role_soal.id_dosen', Auth::user()->id)
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

        DB::table('tbl_role_soal')->insert([
            'id_dosen' => Auth::user()->id,
            'id_paket_soal' => $kodeautopaket,
            'id_prodi' => Auth::user()->id_prodi,
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

        DB::table('tbl_soal_essay')
        ->where('id_paket_soal', $id)
        ->delete();

        DB::table('tbl_role_soal')
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

    public function get_data_matkul(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $db_sistemik = DB::connection('mysql2');

            $data_matkul = $db_sistemik->table('mat_kurikulum')
                        ->orWhere('kode_mk', 'LIKE', '%'.$cari.'%')
                        ->orWhere('nama_mk', 'LIKE', '%'.$cari.'%')
                        ->get();
    
            return response()->json($data_matkul);
        }

        $db_sistemik = DB::connection('mysql2');
        $data_matkul = $db_sistemik->table('mat_kurikulum')
                    ->where('kode_jurusan', Auth::user()->id_prodi)
                    ->get();

        return response()->json($data_matkul);
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

        $data_soal_essay = DB::table('tbl_paket_soal')
        ->join('tbl_soal_essay','tbl_paket_soal.id_paket_soal','=','tbl_soal_essay.id_paket_soal')
        ->where('tbl_paket_soal.id_paket_soal', $id)->get();

        return view('dosen.soal.input', compact('data_paket','data_soal','cek_role_soal','data_soal_essay'));
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
                'pilihan_e' => $request->pil_e,
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
                'pilihan_e' => $request->pil_e,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
        
        return back();

    }

    public function simpan_soal_essay(Request $request){

        if(!empty($request->gambar_essay)){
            $gambar = Image::make($request->gambar_essay)->fit(400)->encode('data-url');

            DB::table('tbl_soal_essay')->insert([
                'id_paket_soal' => $request->id_paket_soal,
                'soal_essay' => $request->soal_essay,
                'gambar_essay' => $gambar,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal_essay')->insert([
                'id_paket_soal' => $request->id_paket_soal,
                'soal_essay' => $request->soal_essay,
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
    public function hapus_soal_essay($id){

        DB::table('tbl_soal_essay')
        ->where('id_soal_essay', $id)
        ->delete();

        return back();
    }

    public function salin_soal($id){
        $data_soal = DB::table('tbl_soal')->where('id_soal', $id)->first();

        if(!empty($data_soal->gambar)){
            DB::table('tbl_soal')->insert([
                'id_paket_soal' => $data_soal->id_paket_soal,
                'soal' => $data_soal->soal,
                'pilihan_a' => $data_soal->pilihan_a,
                'pilihan_b' => $data_soal->pilihan_b,
                'pilihan_c' => $data_soal->pilihan_c,
                'pilihan_d' => $data_soal->pilihan_d,
                'pilihan_e' => $data_soal->pilihan_e,
                'kunci' => $data_soal->kunci,
                'nilai_soal' => $data_soal->nilai_soal,
                'gambar' => $data_soal->gambar,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal')->insert([
                'id_paket_soal' => $data_soal->id_paket_soal,
                'soal' => $data_soal->soal,
                'pilihan_a' => $data_soal->pilihan_a,
                'pilihan_b' => $data_soal->pilihan_b,
                'pilihan_c' => $data_soal->pilihan_c,
                'pilihan_d' => $data_soal->pilihan_d,
                'pilihan_e' => $data_soal->pilihan_e,
                'kunci' => $data_soal->kunci,
                'nilai_soal' => $data_soal->nilai_soal,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

        return back();
    }

    public function salin_soal_essay($id){
        $data_soal = DB::table('tbl_soal_essay')->where('id_soal_essay', $id)->first();

        if(!empty($data_soal->gambar_essay)){
            DB::table('tbl_soal_essay')->insert([
                'id_paket_soal' => $data_soal->id_paket_soal,
                'soal_essay' => $data_soal->soal_essay,
                'gambar_essay' => $data_soal->gambar_essay,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal_essay')->insert([
                'id_paket_soal' => $data_soal->id_paket_soal,
                'soal_essay' => $data_soal->soal_essay,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

        return back();
    }

    public function get_soal(Request $request){

        $data = DB::table('tbl_soal')->where('id_soal', $request->id_soal)->first();

        return response()->json($data);
    }

    public function get_soal_essay(Request $request){

        $data = DB::table('tbl_soal_essay')->where('id_soal_essay', $request->id_soal_essay)->first();

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
                'pilihan_e' => $request->pil_e,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                'gambar' => $gambar,
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
                'pilihan_e' => $request->pil_e,
                'kunci' => $request->kunci,
                'nilai_soal' => $request->nilai_soal,
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

        return back();
    }

    public function ubah_soal_essay(Request $request){

        if(!empty($request->gambar_essay)){
            $gambar = Image::make($request->gambar_essay)->fit(400)->encode('data-url');

            DB::table('tbl_soal_essay')
            ->where('id_soal_essay', $request->id_soal_essay)
            ->update([
                'soal_essay' => $request->soal_essay,
                'gambar_essay' => $gambar,
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }else{
            DB::table('tbl_soal_essay')
            ->where('id_soal_essay', $request->id_soal_essay)
            ->update([
                'soal_essay' => $request->soal_essay,
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

        return back();
    }

    public function role_soal($id){

        $id_prodi = Auth::user()->id_prodi;
        $id_dosen = Auth::user()->id;

        DB::table('tbl_role_soal')
        ->where([
                ['id_paket_soal', $id],
                ['id_dosen', $id_dosen],
                ['id_prodi', $id_prodi]
            ])
        ->update([
            'status' => 'aktif',
            "updated_at" => date('Y-m-d H:i:s'), 
        ]);

        return back();
    }

    public function hapus_role_soal($id){

        $id_prodi = Auth::user()->id_prodi;
        $id_dosen = Auth::user()->id;


        DB::table('tbl_role_soal')
        ->where([
            ['id_paket_soal', $id],
            ['id_dosen', $id_dosen],
            ['id_prodi', $id_prodi]
        ])
        ->update([
            'status' => 'nonaktif',
            "updated_at" => date('Y-m-d H:i:s'), 
        ]);

        return back();
    }

    public function cek_role_soal($id_paket,$id_prodi){

        $role = DB::select("select status from tbl_role_soal where id_paket_soal='".$id_paket."' and id_prodi='".$id_prodi."'");     
        $sorted_role = Arr::get($role,0);
        $sortedd_role = Arr::flatten($sorted_role);
        $data_role = Arr::get($sortedd_role,0); 
        
        if($data_role == "aktif"){
            return true;
        }else{
            return false;
        }
    }


}
