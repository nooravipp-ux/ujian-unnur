@extends('frame.index')
@section('title_1','active')
@section('title_2_lap','current-page')
@section('display','display: block;')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="glyphicon glyphicon-check"></i>&nbsp;<small>Laporan</small></h3>
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List Kategori Soal</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Kategori Soal</th>
                    <th>Paket Soal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data_kategori as $item)
                <?php
                  $jumlah = DB::table('tbl_kategori_soal')
                          ->join('tbl_paket_soal','tbl_kategori_soal.id_kategori_soal','=','tbl_paket_soal.id_kategori_soal')
                          ->join('tbl_role_soal','tbl_paket_soal.id_paket_soal','=','tbl_role_soal.id_paket_soal')
                          ->where([
                            ['tbl_kategori_soal.id_kategori_soal', $item->id_kategori_soal],
                            ['tbl_role_soal.id_prodi', Auth::user()->id_prodi],
                            ['tbl_role_soal.id_dosen', Auth::user()->id]
                            ])
                          ->get();
                ?>
                  <tr>
                    <td>{{ $item->nama_kategori_soal }}</td>
                    <td>{{ $jumlah->count() }} Paket</td>
                    <td>
                       <a href="{{ route('show.list-paket', $item->id_kategori_soal) }}" class="btn btn-primary btn-sm">List Paket Soal</a>
                    </td>
                  </tr>              
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- /page content -->

  

@endsection

@section('script')
<script>
   
</script>
@endsection