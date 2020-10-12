@extends('frame.index')
@section('title_1','active')
@section('title_2_soal','current-page')
@section('display','display: block;')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="glyphicon glyphicon-question-sign"></i>&nbsp;<small>List Soal</small></h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row col-md-4 col-sm-4">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Paket Soal</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Kategori Soal</th>
                            <td>:</td>
                            <td>{{ $data_paket->nama_kategori_soal }}</td>
                        </tr>
                        <tr>
                            <th>Paket Soal</th>
                            <td>:</td>
                            <td>{{ $data_paket->nama_paket_soal }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Mengerjakan</th>
                            <td>:</td>
                            <td>{{ $data_paket->waktu }} Menit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Role Soal</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <table class="table">
                      <tbody>
                          <tr>
                              <th>Ilmu Komputer Dan Informatika</th>
                              <td>
                                  @if($cek_role_soal == true)
                                   <a href="{{ route('hapus.role_soal',$data_paket->id_paket_soal) }}" class="btn btn-danger btn-sm">Nonaktif</a>
                                  @else
                                   <a href="{{ route('simpan.role_soal',$data_paket->id_paket_soal) }}" class="btn btn-primary btn-sm">Aktifasi</a>
                                  @endif  
                                </td>
                          </tr>
                      </tbody>
                      </table>
              </div>
            </div>
          </div>

      </div>

      <div class="row col-md-8 col-sm-8">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Soal</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpan">+ Tambah Soal</button>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th>Soal</th>
                            <th>Kunci Jawaban</th>
                            <th>Nilai Soal</th>
                            <th>Action</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($data_soal as $item)
                            <tr>
                                <td>{{ $item->soal }}</td>
                                <td>{{ $item->kunci }}</td>
                                <td>{{ $item->nilai_soal }}</td>
                                <td>
                                    <button id="btnUbah" data-toggle="modal" data-target="#modalUbah" onclick="tampilData('{{ $item->id_soal }}');" class="btn btn-success btn-sm">Ubah</button>
                                    <a href="{{ route('hapus.soal',$item->id_soal) }}" class="btn btn-danger btn-sm" onclick="return confirm('apakah data ini akan di hapus?, {{ $item->soal }}')">Hapus</a>
                                    <a href="{{ route('salin.soal',$item->id_soal) }}" class="btn btn-warning btn-sm">Salin Soal</a>
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
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Soal Essay</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpanEssay">+ Tambah Soal Essay</button>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        <table id="datatable-1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Soal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($data_soal_essay as $item)
                            <tr>
                                <td>{{ $item->soal_essay }}</td>
                                <td>
                                    <button id="btnUbah" data-toggle="modal" data-target="#modalUbahEssay" onclick="tampilDataEssay('{{ $item->id_soal_essay }}');" class="btn btn-success btn-sm">Ubah</button>
                                    <a href="{{ route('hapus.soal_essay',$item->id_soal_essay) }}" class="btn btn-danger btn-sm" onclick="return confirm('apakah data ini akan di hapus?, {{ $item->soal_essay }}')">Hapus</a>
                                    <a href="{{ route('salin.soal_essay',$item->id_soal_essay) }}" class="btn btn-warning btn-sm">Salin Soal</a>
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

  <!-- Modal -->
  <div class="modal fade" id="modalSimpan" tabindex="-1" role="dialog" aria-labelledby="modalSimpanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalSimpanLabel">Tambah Data Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('simpan.soal') }}" method="POST" enctype="multipart/form-data">  
            @csrf
                <div class="form-group">
                    <label for="">Soal</label>
                    <textarea id="soal" name="soal" class="form-control" rows="3" placeholder="ex: Ibukota Indonesia ?" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                    <input type="hidden" name="id_paket_soal" id="id_paket_soal" value="{{ $data_paket->id_paket_soal }}">
                </div>
                <div class="form-group">
                    <label for="">Pilihan A</label>
                    <textarea id="pil_a" name="pil_a" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan B</label>
                    <textarea id="pil_b" name="pil_b" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan C</label>
                    <textarea id="pil_c" name="pil_c" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan D</label>
                    <textarea id="pil_d" name="pil_d" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan E</label>
                    <textarea id="pil_e" name="pil_e" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Kunci Jawaban</label>
                    <p>
                        <input type="radio" class="flat" name="kunci" id="kunciA" value="A" checked="" required />
                        Pilihan A
                        &nbsp;
                        <input type="radio" class="flat" name="kunci" id="kunciB" value="B" />
                        Pilihan B
                        &nbsp;
                        <input type="radio" class="flat" name="kunci" id="kunciC" value="C" />
                        Pilihan C
                        &nbsp;
                        <input type="radio" class="flat" name="kunci" id="kunciD" value="D" />
                        Pilihan D
                        &nbsp;
                        <input type="radio" class="flat" name="kunci" id="kunciE" value="E" />
                        Pilihan E
                    </p>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Nilai Soal</label>
                        <input type="text" id="nilai_soal" name="nilai_soal" class="form-control"  placeholder="ex: 70" required >
                    </div>
                    <div class="form-group col-md-7">
                        <label for="">Gambar Soal</label>
                        <input type="file" id="gambar" name="gambar" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
            </form>
    </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal essay -->
<div class="modal fade" id="modalSimpanEssay" tabindex="-1" role="dialog" aria-labelledby="modalSimpanEssayLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalSimpanEssayLabel">Tambah Data Soal Essay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('simpan.soal_essay') }}" method="POST" enctype="multipart/form-data">  
            @csrf
                <div class="form-group">
                    <label for="">Soal</label>
                    <textarea id="soal_essay" name="soal_essay" class="form-control" rows="3" placeholder="ex: Ibukota Indonesia ?" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    <input type="hidden" name="id_paket_soal" id="id_paket_soal" value="{{ $data_paket->id_paket_soal }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="">Gambar Soal</label>
                        <input type="file" id="gambar_essay" name="gambar_essay" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
            </form>
    </div>
    </div>
</div>
<!-- End Modal -->

  <!-- Modal -->
  <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalUbahLabel">Ubah Data Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('ubah.soal') }}" method="POST" enctype="multipart/form-data">  
            @csrf
                <div class="form-group">
                    <label for="">Soal</label>
                    <textarea id="soal_ubah" name="soal" class="form-control" rows="3" placeholder="ex: Ibukota Indonesia ?" style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                    <input type="hidden" name="id_soal" id="id_soal" value="">
                </div>
                <div class="form-group">
                    <label for="">Pilihan A</label>
                    <textarea id="pil_a_ubah" name="pil_a" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan B</label>
                    <textarea id="pil_b_ubah" name="pil_b" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan C</label>
                    <textarea id="pil_c_ubah" name="pil_c" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan D</label>
                    <textarea id="pil_d_ubah" name="pil_d" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Pilihan E</label>
                    <textarea id="pil_e_ubah" name="pil_e" class="form-control" rows="3" placeholder="ex: Jakarta." style="margin-top: 0px; margin-bottom: 0px; height: 50px;"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Kunci Jawaban</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="kunci" id="kunciA_ubah" value="A" />
                        <label class="form-check-label" for="">Pilihan A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="kunci" id="kunciB_ubah" value="B" />
                        <label class="form-check-label" for="">Pilihan B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="kunci" id="kunciC_ubah" value="C" />
                        <label class="form-check-label" for="">Pilihan C</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="kunci" id="kunciD_ubah" value="D" />
                        <label class="form-check-label" for="">Pilihan D</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="kunci" id="kunciE_ubah" value="E" />
                        <label class="form-check-label" for="">Pilihan E</label>
                    </div>             
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Nilai Soal</label>
                        <input type="text" id="nilai_soal_ubah" name="nilai_soal" class="form-control"  placeholder="ex: 70" required >
                    </div>
                    <div class="form-group col-md-7">
                        <label for="">Gambar Soal</label>
                        <input type="file" id="gambar_ubah" name="gambar" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
            </form>
    </div>
    </div>
</div>
<!-- End Modal -->

  <!-- Modal essay ubah -->
  <div class="modal fade" id="modalUbahEssay" tabindex="-1" role="dialog" aria-labelledby="modalUbahEssayLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalUbahEssayLabel">Ubah Data Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('ubah.soal_essay') }}" method="POST" enctype="multipart/form-data">  
            @csrf
                <div class="form-group">
                    <label for="">Soal</label>
                    <textarea id="soal_essay_ubah" name="soal_essay" class="form-control" rows="3" placeholder="ex: Ibukota Indonesia ?" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                    <input type="hidden" name="id_soal_essay" id="id_soal_essay" value="">
                </div>
                
                <div class="form-row">

                    <div class="form-group col-md-7">
                        <label for="">Gambar Soal</label>
                        <input type="file" id="gambar_essay_ubah" name="gambar_essay" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
            </form>
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
				url:'{{route('get.soal')}}',
				data:{'id_soal':get_id},
				success:function(data){
                    console.log(data.id_soal);
                    $("#id_soal").val(data.id_soal);
                    $("#soal_ubah").val(data.soal);
                    $("#pil_a_ubah").val(data.pilihan_a);
                    $("#pil_b_ubah").val(data.pilihan_b);
                    $("#pil_c_ubah").val(data.pilihan_c);
                    $("#pil_d_ubah").val(data.pilihan_d);
                    $("#pil_e_ubah").val(data.pilihan_e);
                    $("#nilai_soal_ubah").val(data.nilai_soal);

                    if(data.kunci == "A"){
                        $("#kunciA_ubah").attr('checked', true);
                    }else if(data.kunci == "B"){
                        $("#kunciB_ubah").attr('checked', true);
                    }else if(data.kunci == "C"){
                        $("#kunciC_ubah").attr('checked', true);
                    }else if(data.kunci == "D"){
                        $("#kunciD_ubah").attr('checked', true);
                    }else{
                        $("#kunciE_ubah").attr('checked', true);
                    }
                    
				}
			});
    }
    function tampilDataEssay (id) {
        var get_id = id;
        
        $.ajax({
				type : "GET",
				url:'{{route('get.soal_essay')}}',
				data:{'id_soal_essay':get_id},
				success:function(data){
                    console.log(data.id_soal_essay);
                    $("#id_soal_essay").val(data.id_soal_essay);
                    $("#soal_essay_ubah").val(data.soal_essay);
                   
				}
			});
    }
</script>
@endsection