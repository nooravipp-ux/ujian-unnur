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
              <h2>Paket Soal : {{ $nama_paket }}</h2>
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
                    <th>Nama Mahasiswa</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($list_mhs as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                       <a href="{{ route('show.detail-mhs', [$item->id_mhs , $item->id_paket_soal]) }}" class="btn btn-primary btn-sm">Detail Jawaban Mahasiswa</a>
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