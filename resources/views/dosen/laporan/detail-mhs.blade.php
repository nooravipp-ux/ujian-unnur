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
              <h2>Detail Jawaban Mahasiswa</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>NIM</th>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <td>:</td>
                                    <td>{{ $data_mhs->name }}</td>
                                </tr>
                                <tr>
                                    <th>Prodi</th>
                                    <td>:</td>
                                    <td>{{ $data_mhs->id_prodi }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori Soal</th>
                                    <td>:</td>
                                    <td>{{ $data_mhs->nama_kategori_soal }}</td>
                                </tr>
                                <tr>
                                    <th>Paket Soal</th>
                                    <td>:</td>
                                    <td>{{ $data_mhs->nama_paket_soal }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Mengerjakan</th>
                                    <td>:</td>
                                    <td>{{ $data_mhs->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-sm-8">
                      <div class="card-box table-responsive">
                        <h5>&nbsp;&nbsp;Soal Pilihan Ganda</h5>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Soal</th>
                                <th>Kunci</th>
                                <th>Jawaban</th>
                                <th>Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data_jawab_pg as $item)
                            <tr>
                                <td>{{ $item->soal }}</td>
                                <td>{{ $item->kunci }}</td>
                                <td>{{ $item->pilihan }}</td>
                                <td>{{ $item->nilai_pilihan }}</td>
                            </tr>              
                            @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <h5>&nbsp;&nbsp;Penilaian</h5>
              <table class="table">
                  <tbody>
                      <tr>
                          <td>Jumlah Nilai Soal Pilihan Ganda</td>
                          <td>:</td>
                          <td>
                              <input type="text" class="form-control" id="nilai_pg" name="nilai_pg" value="{{ $data_nilai->nilai_pg }}" readonly>
                          </td>
                      </tr>
                      <tr>
                        <td>Jumlah Nilai Soal Essay</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" id="nilai_essay" name="nilai_essay">
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <button class="btn btn-success btn-sm">Update Nilai</button>
                      </td>
                      <td></td>
                      <td></td>
                  </tr>
                  </tbody>
              </table>

          </div>
          <div class="col-sm-8">
            <div class="card-box table-responsive">
              <h5>&nbsp;&nbsp;Soal Essay</h5>
              <table id="datatable-1" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                      <th>Soal</th>
                      <th>Jawaban</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data_jawab_essay as $item)
                  <tr>
                      <td>{{ $item->soal_essay }}</td>
                      <td>{{ $item->jawaban_essay }}</td>
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
  $(document).ready(function() {
      $('#datatable-1').DataTable();
  } );
</script>
@endsection