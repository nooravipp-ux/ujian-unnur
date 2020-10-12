@extends('frame.index')
@section('title_1','active')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="card col-md-4 col-sm-4">
        <div class="card-body">
          <h5 class="card-title">Pengaturan Dashboard Mahasiswa</h5>
            <table class="table">
                <tbody>
                    <th>Form Nilai</th>
                    <td>:</td>
                    <td>
                        @if($cek_status_form == true)
                        <a href="{{ route('update_nilai_mhs.nonaktif') }}" class="btn btn-danger btn-sm">Nonaktif</a>
                        @else
                        <a href="{{ route('update_nilai_mhs.aktif') }}" class="btn btn-primary btn-sm">Aktif</a>
                        @endif 
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection

@section('script')
<script>

</script>
@endsection