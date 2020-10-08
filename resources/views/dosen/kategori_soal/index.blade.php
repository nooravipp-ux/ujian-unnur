@extends('frame.index')
@section('title_1','active')
@section('title_2_kat','current-page')
@section('display','display: block;')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="glyphicon glyphicon-check"></i>&nbsp;<small>List Kategori Soal</small></h3>
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Kategori Soal</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpan">+ Tambah Data</button>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Kategori Soal</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($data_kategori as $item)
                  <tr>
                    <td>{{ $item->nama_kategori_soal }}</td>
                    <td>
                        <button id="btnUbah" data-toggle="modal" data-target="#modalUbah" onclick="tampilData('{{ $item->id_kategori_soal }}');" class="btn btn-success btn-sm">Ubah</button>
                        <a href="{{ route('hapus.kategori_soal',$item->id_kategori_soal) }}" class="btn btn-danger btn-sm" onclick="return confirm('apakah data ini akan di hapus?, {{ $item->nama_kategori_soal }}')">Hapus</a>
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
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalSimpanLabel">Tambah Data Kategori Soal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('simpan.kategori_soal') }}" method="POST">  
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Soal</label>
                        <input type="text" id="nama_kategori_soal" name="nama_kategori_soal" class="form-control"  placeholder="ex: Soal Ujian" required >
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

    <!-- Modal Ubah-->
    <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalUbahLabel">Ubah Data Kategori Soal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ubah.kategori_soal') }}" method="POST">  
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Soal</label>
                    <input type="text" class="form-control" id="nama_kategori_soal_ubah" name="nama_kategori_soal" placeholder="ex: Soal Ujian" required>
                    <input type="hidden" class="form-control" id="id_kategori_soal_ubah" name="id_kategori_soal" value="">
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Ubah</button>
            </div>
                </form>
        </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

@section('script')
<script>
    function tampilData (id) {
        var get_id = id;

        $.ajax({
				type : "GET",
				url:'{{route('get.kategori')}}',
				data:{'id_kategori_soal':get_id},
				success:function(data){
                    console.log(data.id_kategori_soal);
                    $("#id_kategori_soal_ubah").val(data.id_kategori_soal);
                    $("#nama_kategori_soal_ubah").val(data.nama_kategori_soal);
				}
			});
    }
</script>
@endsection