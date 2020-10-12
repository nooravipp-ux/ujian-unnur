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
          <h3><i class="glyphicon glyphicon-question-sign"></i>&nbsp;<small>List Paket Soal</small></h3>
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Paket Soal</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpan">+ Tambah Paket Soal</button>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama Paket Soal</th>
                    <th>Kategori Soal</th>
                    <th>Waktu Mengerjakan</th>
                    <th>Status Soal</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($data_paket as $item)
                    <tr>
                        <td>{{ $item->nama_paket_soal }}</td>
                        <td>{{ $item->nama_kategori_soal }}</td>
                        <td>{{ $item->waktu }} menit</td>
                        <td>
                            @if($item->status == "aktif")
                            <p class="btn btn-round btn-success btn-sm">Aktif</p>
                            @else
                            <p class="btn btn-round btn-danger btn-sm">Nonaktif</p>
                            @endif
                        </td>
                        <td>
                            <button id="btnUbah" data-toggle="modal" data-target="#modalUbah" onclick="tampilData('{{ $item->id_paket_soal }}');" class="btn btn-success btn-sm">Ubah</button>
                            <a href="{{ route('hapus.paket_soal',$item->id_paket_soal) }}" class="btn btn-danger btn-sm" onclick="return confirm('apakah data ini akan di hapus?, {{ $item->nama_paket_soal }}')">Hapus</a>
                            <a href="{{ route('show.input_soal',$item->id_paket_soal) }}" class="btn btn-primary btn-sm">Detail Soal</a>
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
        <h5 class="modal-title" id="modalSimpanLabel">Tambah Paket Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('simpan.paket_soal') }}" method="POST">  
            @csrf
                <div class="form-group">
                    <select name="kategori_soal" id="kategori_soal" class="js-example-basic-responsive" style="width: 50%"></select>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket Soal</label>
                    <input type="text" name="nama_paket_soal" id="nama_paket_soal" class="form-control" placeholder="ex: Bahasa Inggris">
                </div>
                <div class="form-group">
                    <label for="">Waktu Mengerjakan</label>
                    <input type="text" name="waktu" id="waktu" class="form-control" placeholder="ex: 60 *Satuan Menit">
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
            <form action="{{ route('ubah.paket_soal') }}" method="POST">  
                @csrf
            <div class="form-group">
                <div class="form-group">
                    <select name="kategori_soal" id="kategori_soal_ubah" class="js-example-basic-responsive" style="width: 50%"></select>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket Soal</label>
                    <input type="text" name="nama_paket_soal" id="nama_paket_soal_ubah" class="form-control" placeholder="ex: Bahasa Inggris">
                </div>
                <div class="form-group">
                    <label for="">Waktu Mengerjakan</label>
                    <input type="text" name="waktu" id="waktu_ubah" class="form-control" placeholder="ex: 60 *Satuan Menit">
                </div>
                <input type="hidden" class="form-control" id="id_paket_soal_ubah" name="id_paket_soal" value="">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    function tampilData (id) {
        var get_id = id;
        $.ajax({
				type : "GET",
				url:'{{route('get.paket')}}',
				data:{'id_paket_soal':get_id},
				success:function(data){
                    console.log(data.id_paket_soal);
                    $("#id_paket_soal_ubah").val(data.id_paket_soal);
                    $('#kategori_soal_ubah').append('<option value="'+ data.id_kategori_soal +'"selected>'+ data.nama_kategori_soal +'</option>');
                    $("#nama_paket_soal_ubah").val(data.nama_paket_soal);
                    $("#waktu_ubah").val(data.waktu);
				}
			});
    }
</script>
<script>
$(document).ready(function(){

    $('#kategori_soal').select2({
        placeholder: '- Pilih Kategori Soal -',
        ajax: {
            url: '{{ url('/dosen/soal/get_data_kategori') }}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(kategori) {
                        return {
                            id: kategori.id_kategori_soal,
                            text: kategori.nama_kategori_soal
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#kategori_soal_ubah').select2({
        placeholder: '- Pilih Kategori Soal -',
        ajax: {
            url: '{{ url('/dosen/soal/get_data_kategori') }}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(kategori) {
                        return {
                            id: kategori.id_kategori_soal,
                            text: kategori.nama_kategori_soal
                        }
                    })
                };
            },
            cache: true
        }
    });

});
</script>
@endsection