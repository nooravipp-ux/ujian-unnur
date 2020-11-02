<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li class="@yield('title_dash')"><a href="{{ url('/dash') }}"><i class="fa fa-tachometer"></i>Dashboard</a>
            @can('manage-dosen')             
                <li class="@yield('title_1')"><a><i class="fa fa-clone"></i>Bank Soal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="@yield('display')">
                    <li class="@yield('title_2_soal')"><a href="{{ url('/dosen/paket_soal') }}">Soal</a></li>
                    <li class="@yield('title_2_lap')"><a href="{{ url('/dosen/laporan') }}">Laporan</a></li>
                    </ul>
                </li>
            @endcan
            @can('manage-mhs')
                <li class="@yield('title_1')"><a href="{{ url('/mhs/ujian') }}"><i class="fa fa-tasks"></i>Ujian</a>
            @endcan
            @can('manage-admin')
                <li class="@yield('title_1')"><a><i class="fa fa-clone"></i>Soal<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="@yield('display')">
                    <li class="@yield('title_2_kat')"><a href="{{ url('/dosen/kategori_soal') }}">Kategori Soal</a></li>
                    </ul>
                </li>    
                <li class="@yield('title_1')"><a href="{{ url('/admin/pengaturan') }}"><i class="fa fa-cogs"></i>Pengaturan</a>
            @endcan
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->