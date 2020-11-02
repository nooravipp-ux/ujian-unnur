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
            <form action="{{ route('post.nilai') }}" method="POST">
              @csrf
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
                            <input type="text" class="form-control" id="nilai_essay" name="nilai_essay" value="{{ $data_nilai->nilai_essay }}">
                            <input type="hidden" id="id_mhs" name="id_mhs" value="{{ $data_mhs->id }}">
                            <input type="hidden" name="username" id="username" value="{{ $data_mhs->username }}">
                        </td>
                      </tr>
                      <tr>
                        <td>Total Nilai</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" id="total_nilai" name="total_nilai" value="{{ $data_nilai->nilai }}" readonly>
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
            </form>  

          </div>
          <div class="col-sm-8">
            <div class="card-box table-responsive">
              <h5>&nbsp;&nbsp;Soal Essay</h5>
              <table id="datatable-1" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                      <th>Soal</th>
                      <th>Jawaban</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data_jawab_essay as $item)
                  <tr>
                      <td>{{ $item->soal_essay }}</td>
                      <td>{{ $item->jawaban_essay }}</td>
                      <td>
                        <button id="btnView" data-toggle="modal" data-target="#modalView" onclick="tampilData('{{ $item->id_soal_essay }}');" class="btn btn-success btn-sm">Detail</button>
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

  <!-- Modal View-->
  <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalViewLabel">Detail Jawaban Essay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Soal</label>
            <textarea id="soal_essay" name="soal_essay" class="form-control" rows="3"  style="margin-top: 0px; margin-bottom: 0px; height: 200px;" readonly></textarea>
          </div>
          <div class="form-group">
            <label for="">Jawaban Essay</label>
            <textarea id="jawaban_essay" name="jawaban_essay" class="form-control" rows="3"  style="margin-top: 0px; margin-bottom: 0px; height: 200px;" readonly></textarea>
          </div>
        </div>
        <div class="modal-footer">
        
        </div>
    </div>
    </div>
</div>
<!-- End Modal -->

  

@endsection

@section('script')
<script>
  $(document).ready(function() {
      $('#datatable-1').DataTable();
  } );
</script>
<script>
  function tampilData (id) {
      var get_id = id;

      $.ajax({
      type : "GET",
      url:'{{route('get.data_jawab_essay')}}',
      data:{'id_soal_essay':get_id},
      success:function(data){
                  $("#soal_essay").val(data.soal_essay);
                  $("#jawaban_essay").val(data.jawaban_essay);
      }
    });
  }
</script>
@endsection