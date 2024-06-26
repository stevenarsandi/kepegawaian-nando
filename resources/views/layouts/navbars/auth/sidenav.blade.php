<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <span class="ms-4 font-weight-bold" style="font-size: 18px;">PT.Musi Energi</span><br>
            <span class="ms-6 font-weight-bold" style="font-size: 18px;">Sukses Indah</span>
        </a>
    </div>
    <hr class="horizontal dark mt-3">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-home text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li><hr class="horizontal dark mt-3">
        @can('view-admin-menu')
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Pengaturan Akun</h6>
                </div>
            </li>
        @endcan
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil Pengguna</span>
                </a>
            </li>
        @can('view-admin-menu')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user') == true ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manajemen User</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'karyawan') == true ? 'active' : '' }}" href="{{ url('/karyawan') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-user-plus text-dark text-sm opacity-10"></i>
                </div>
                    <span class="nav-link-text ms-1">Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'pelamar') == true ? 'active' : '' }}" href="{{ url('/pelamar') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                        <i class="fa fa-id-card text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pelamar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'sanksi') == true ? 'active' : '' }}" href="{{ url('/sanksi') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="fa fa-warning text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Sanksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ str_contains(request()->url(), 'reward') == true ? 'active' : '' }}" href="{{ url('/reward') }}">
                <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                <i class="fa fa-money text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Reward</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'phk') == true ? 'active' : '' }}" href="{{ url('/phk') }}">
            <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-user-times text-dark text-sm opacity-10"></i>
        </div>
            <span class="nav-link-text ms-1">PHK</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'penugasan') == true ? 'active' : '' }}" href="{{ url('/penugasan') }}">
            <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-truck text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Penugasan</span>
    </a>
    </li>
    <div class="ps-4">
        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Approval</h6>
    </div>
    <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'approveizin') == true ? 'active' : '' }}" href="{{ url('/approveizin') }}">
            <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                <i class="fa fa-handshake text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Approval Izin</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'approvecuti') == true ? 'active' : '' }}" href="{{ url('/approvecuti') }}">
            <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                <i class="fa fa-handshake text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Approval Cuti</span>
        </a>
    </li>
@endcan
@can('view-member-menu')
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Karyawan</h6>
</li>
<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'absen') == true ? 'active' : '' }}" href="{{ url('/absen') }}">
        <div
        class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
        <i class="fa fa-address-book-o text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Absensi</span>
</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'izin') == true ? 'active' : '' }}" href="{{ url('/izin') }}">
        <div
        class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
        <i class="fa fa-file-text text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Izin</span>
</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'cuti') == true ? 'active' : '' }}" href="{{ url('/cuti') }}">
        <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
            <i class="fa fa-file-text text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Cuti</span>
    </a>
</li>
@endcan
@can('view-direktur-menu')
<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->url(), 'laporan') == true ? 'active' : '' }}" href="{{ url('/laporan') }}">
        <div
        class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
        <i class="fa fa-book text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Laporan</span>
</a>
</li>
</ul>
</div>
@endcan
</aside>
