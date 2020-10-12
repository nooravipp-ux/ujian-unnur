<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use DB;


class DashboardController extends Controller
{
    public function index(){

        $user = $this->cek_user(Auth::user()->id);


        $cek_status_form_nilai = DB::table('tbl_pengaturan')->first();
        $data_nilai_mhs = DB::table('tbl_kategori_soal')
                    ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
                    ->join('tbl_nilai','tbl_paket_soal.id_paket_soal','=','tbl_nilai.id_paket_soal')
                    ->where('tbl_nilai.id_mhs', Auth::user()->id)
                    ->get();
        
        return view('dashboard.index', compact('data_nilai_mhs','user','cek_status_form_nilai'));
    }

    public function cek_user($id){
        $data_user = DB::table('roles')
                    ->select('roles.name')
                    ->join('role_user','roles.id','=','role_user.role_id')
                    ->join('users','role_user.user_id','=','users.id')
                    ->where('users.id',$id)
                    ->first();
                    
        return $data_user;            
    } 
}
