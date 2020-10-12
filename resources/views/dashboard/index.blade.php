@extends('frame.index')
@section('title_dash','active')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  @if($user->name == "mhs")
    @if($cek_status_form_nilai->status == "aktif")
    <div class="">
        <div class="clearfix"></div>
  
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>List Nilai</h2>
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
                            <th>Kategori Soal</th>
                            <th>Paket Soal</th>
                            <th>Nilai Soal PG</th>
                            <th>Nilai Soal Essay</th>
                            <th>Jumlah Nilai</th>
                        </thead>
                        <tbody>
                            @foreach ($data_nilai_mhs as $item)
                            <tr>
                                <td>{{ $item->nama_kategori_soal }}</td>
                                <td>{{ $item->nama_paket_soal }}</td>
                                <td>{{ $item->nilai_pg }}</td>
                                <td>{{ $item->nilai_essay }}</td>
                                <td>{{ $item->nilai }}</td>
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
      @endif
    @endif      
</div>
<!-- /page content -->
@endsection

@section('script')
<script>

</script>
@endsection