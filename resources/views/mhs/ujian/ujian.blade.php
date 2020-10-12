@extends('frame.index')
@section('title_1','active')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daftar Soal</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
              <h5><p id="waktu"><b>Waktu Pengerjaan :</b> <span id="time">00.00</span> Menit.</p></h5>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <table>
                            <tbody>
                              <form name="" action="{{ route('cek.jawaban') }}" method="POST">
                                @csrf
                                @foreach ($data_soal as $item)
                                        <input type="hidden" name="id_soal[]" value="{{ $item->id_soal }}">
                                        <input type="hidden" name="jumlah_soal" value="{{ $jumlah_soal }}">
                                        <input type="hidden" name="id_paket_soal" id="id_paket_soal" value="{{ $item->id_paket_soal }}">

                                        <tr>
                                            <td>{{ $no = $no+1 }}. </td>
                                            <td>{{ $item->soal }}</td>
                                        </tr>

                                        @if(!empty($item->gambar))
                                            <tr>
                                                <td></td>
                                                <td><img src="{{ $item->gambar }}" alt="" width="200" height="200"></td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td></td>
                                            <td>A. <input type="radio" value="A" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_a }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>B. <input type="radio" value="B" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_b }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>C. <input type="radio" value="C" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_c }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>D. <input type="radio" value="D" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_d }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>E. <input type="radio" value="E" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_e }}</td>
                                        </tr>
                                        @endforeach
                            </tbody>
                        </table>
                        <br>
                        <p><h5><b>Soal Essay :</b></h5></p>
                        <br>
                        <table>
                          <tbody>
                              @csrf
                              @foreach ($data_soal_essay as $item)
                                      <input type="hidden" name="id_soal_essay[]" value="{{ $item->id_soal_essay }}">
                                      <input type="hidden" name="jumlah_soal_essay" value="{{ $jumlah_soal_essay }}">

                                      <tr>
                                          <td>{{ $no_essay = $no_essay+1 }}. </td>
                                          <td>{{ $item->soal_essay }}</td>
                                      </tr>

                                      @if(!empty($item->gambar_essay))
                                          <tr>
                                              <td></td>
                                              <td style="height: 20%; width: 100%;"><img src="{{ $item->gambar_essay }}" alt="" width="200" height="200"></td>
                                          </tr>
                                      @endif

                                      <tr>
                                          <td></td>
                                          <td>
                                            {{-- <input type="radio" value="A" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_a }} --}}
                                            <textarea id="soal_essay" name="jawab_essay[{{ $item->id_soal_essay }}]" class="form-control" rows="3" placeholder="Isi Jawaban Dengan Benar!" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                                          </td>
                                      </tr>
                                      @endforeach
                          </tbody>
                      </table>
                        <br>
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda ?')">Selesai</button>
                        </form>
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
$(document).ready(function(){

  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
        		document.getElementById("waktu").innerHTML = "EXPIRED";
            document.myform.submit();
        }
    }, 1000);
}
var countDown = {{ $waktu_pengerjaan }} * 60,
        display = document.querySelector('#time');
    startTimer(countDown, display);
});
</script>
@endsection