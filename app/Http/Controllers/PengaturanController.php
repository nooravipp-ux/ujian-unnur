<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use DB;

class PengaturanController extends Controller
{
    public function index_pengaturan(){

        $id = '1';
        $cek_status_form = $this->cek_setting_form_nilai($id);

        return view('admin.pengaturan.index', compact('cek_status_form'));
    }

    public function cek_setting_form_nilai($id){

        $role = DB::select("select status from tbl_pengaturan where id='".$id."'");     
        $sorted_role = Arr::get($role,0);
        $sortedd_role = Arr::flatten($sorted_role);
        $data_role = Arr::get($sortedd_role,0); 
        
        if($data_role == "aktif"){
            return true;
        }else{
            return false;
        }
    }

    public function update_nilai_mhs_aktif(){

        $id = '1';
        DB::table('tbl_pengaturan')
        ->where('id',$id)
        ->update([
            'status' => 'aktif',
        ]);

        return back();
    }

    public function update_nilai_mhs_nonaktif(){

        $id = '1';
        DB::table('tbl_pengaturan')
        ->where('id',$id)
        ->update([
            'status' => 'nonaktif',
        ]);

        return back();
    }
}
