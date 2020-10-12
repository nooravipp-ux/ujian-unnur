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
              <h2>List Paket Soal</h2>
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
                    <th>Paket Soal</th>
                    <th>Yang Sudah Mengerjakan</th>
                    <th>Status Soal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data_paket as $item)
                <?php
                $jumlah = DB::table('tbl_paket_soal')
                          ->join('tbl_nilai', 'tbl_paket_soal.id_paket_soal','=','tbl_nilai.id_paket_soal')
                          ->where('tbl_paket_soal.id_paket_soal', $item->id_paket_soal)
                          ->get();
                ?>
                  <tr>
                    <td>{{ $item->nama_paket_soal }}</td>
                    <td>{{ $jumlah->count() }} Mahasiswa</td>
                    <td>
                      @if($item->status == "aktif")
                      <p class="btn btn-round btn-success btn-sm">Aktif</p>
                      @else
                      <p class="btn btn-round btn-danger btn-sm">Nonaktif</p>
                      @endif
                    </td>
                    <td>
                       <a href="{{ route('show.list-mhs', $item->id_paket_soal) }}" class="btn btn-primary btn-sm">List Mahasiswa</a>
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