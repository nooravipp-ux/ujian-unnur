@extends('frame.index')
@section('title_1','active')
@section('content')
@section('css')
<style>
    .jawaban {
        font-size: x-large;
        border: solid rgb(184, 184, 184);
        border-radius: 10px;
        padding-left: 10px;
        width: 140%;
    }
</style>
@endsection
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
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-12 text-center"
                        style="background: rgb(47, 170, 214);color: white;border-radius: 10px">
                        <h5>
                            <p id="waktu"><b>Waktu Pengerjaan :</b> <span id="time">00.00</span> Menit.</p>
                        </h5>
                    </div>
                    <h5><b>Soal Pilihan Ganda : {{ $jumlah_soal }}</b></h5>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-8">
                                <table>
                                    <tbody>
                                        <form name="" action="{{ route('cek.jawaban') }}"
                                            method="POST">
                                            @csrf
                                            @foreach($data_soal as $item)
                                                <input type="hidden" name="id_soal[]" value="{{ $item->id_soal }}">
                                                <input type="hidden" name="jumlah_soal" value="{{ $jumlah_soal }}">
                                                <input type="hidden" name="id_paket_soal" id="id_paket_soal"
                                                    value="{{ $item->id_paket_soal }}">

                                                <div class="row" style="border: solid;border-radius: 16px">
                                                    <div class="col-5"
                                                        style="text-align: center;border-right: solid;padding: 2em 2em;padding-left: 1em;">
                                                        <h4>
                                                            @if(!empty($item->gambar))
                                                                <img src="{{ $item->gambar }}" alt="" width="300"
                                                                    height="300"
                                                                    style="box-shadow: 10px 10px 10px grey">
                                                            @endif
                                                        </h4>
                                                    </div>
                                                    <div class="col-5">
                                                        <h4 class="card-subtitle mb-2 text-muted"
                                                            style="border-bottom: double grey;font-size: 24px;line-height: 2">
                                                            {{ $item->soal }}
                                                        </h4>
                                                        <p class="jawaban">A. <input type="radio" value="A"
                                                                name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_a }}
                                                        </p>
                                                        <p class="jawaban">B. <input type="radio" value="B"
                                                                name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_b }}
                                                        </p>
                                                        <p class="jawaban">C. <input type="radio" value="C"
                                                                name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_c }}
                                                        </p>
                                                        <p class="jawaban">D. <input type="radio" value="D"
                                                                name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_d }}
                                                        </p>
                                                        <p class="jawaban">E. <input type="radio" value="E"
                                                                name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_e }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        </form>
                                    </tbody>
                                </table>
                                <br>
                                <p>
                                    <h5><b>Soal Essay : {{$jumlah_soal_essay}}</b></h5>
                                </p>
                                <br>
                                <table>
                                    <tbody>
                                        @csrf
                                        @foreach($data_soal_essay as $item)
                                            <input type="hidden" name="id_soal_essay[]"
                                                value="{{ $item->id_soal_essay }}">
                                            <input type="hidden" name="jumlah_soal_essay"
                                                value="{{ $jumlah_soal_essay }}">

                                            <tr>
                                                <td>{{ $no_essay = $no_essay+1 }}. </td>
                                                <td>{{ $item->soal_essay }}</td>
                                            </tr>

                                            @if(!empty($item->gambar_essay))
                                                <tr>
                                                    <td></td>
                                                    <td style="height: 20%; width: 100%;"><img
                                                            src="{{ $item->gambar_essay }}" alt="" width="200"
                                                            height="200"></td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{-- <input type="radio" value="A" name="pilihan[{{ $item->id_soal }}]">&nbsp;{{ $item->pilihan_a }}
                                                    --}}
                                                    <textarea id="soal_essay"
                                                        name="jawab_essay[{{ $item->id_soal_essay }}]"
                                                        class="form-control" rows="3"
                                                        placeholder="Isi Jawaban Dengan Benar!"
                                                        style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <button type="submit" class="btn btn-success btn-sm"
                                    onclick="return confirm('Apakah Anda yakin dengan jawaban Anda ?')">Selesai</button>
                            </div>
                            <div class="col-sm-4">
                                <table>
                                    <tbody>
                                        <div
                                            style="padding:  10px; border: double #fff 15px; color: #fff; background: #b90000;">
                                            <p style="font-weight: bold;">Silahkan kerjakan soal yang telah di siapkan.
                                                Harap dipatuhi peraturan berikut!</p>
                                            <ul>
                                                <li>Jangan mereload/refresh browser (jawaban akan hilang)</li>
                                                <li>Jangan menekan tombol back/menu dashboard (jawaban akan hilang)</li>
                                                <li>Jangan menekan tombol selesai saat mengerjakan soal, kecuali saat
                                                    anda telah selesai mengerjakan seluruh soal</li>
                                                <li>Perhatikan sisa waktu ujian, sistem akan mengumpulkan jawaban saat
                                                    waktu sudah selesai</li>
                                                <li>Waktu ujian akan dimulai saat "<b>Mulai Mengerjakan
                                                        Soal!</b>" di klik</li>
                                                <li>Dilarang bekerjasama dengan teman</li>
                                            </ul>
                                        </div>
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
<!-- /page content -->

@endsection

{{-- @section('script')
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
@endsection--}}
