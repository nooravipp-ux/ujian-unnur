@extends('frame.index')
@section('title_1','active')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="glyphicon glyphicon-align-left"></i>&nbsp;<small>List Paket Ujian</small></h3>
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Paket Ujian</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    @foreach($data_paket as $item)
                    <?php
                      $cek_soal = DB::table('tbl_jawab_pg')->where('id_paket_soal', $item->id_paket_soal)->where('id_mhs', $id_mhs)->first();
                    ?>
                    <div class="form-group col-md-3 col-sm-3">

                        <div class="card border-secondary mb-2">
                            <div class="card-header text-white bg-secondary">Paket Soal</div>
                            <div class="card-body ">
                            <h5 class="card-title">{{ $item->nama_paket_soal }}</h5>
                            <p class="card-text">Kategori Soal : <b>{{ $item->nama_kategori_soal }}</b></p>
                            @if($cek_soal)
                              <p class="card-text">Status : Sudah Dikerjakan</p>
                              <a href="#" class="btn btn-danger btn-sm">Sudah Kerjakan</a>
                            @else
                              <p class="card-text">Status : Belum Dikerjakan</p>
                              <a href="{{ route('show.ujian', $item->id_paket_soal) }}" class="btn btn-primary btn-sm">Kerjakan</a>
                            @endif
                            </div>
                        </div>

                    </div>
                &nbsp;&nbsp;
                @endforeach
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