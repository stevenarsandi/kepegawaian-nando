@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Laporan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('laporan.export') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h3>Unduh Laporan</h3>
                            </div>
                        </div>
                            <div id="alert">
                                @include('components.alert')
                            </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="report_type">Laporan</label>
                                        <select name="report_type" id="report_type" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Laporan yang Mau Di Export</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Cuti">Cuti</option>
                                            <option value="Absensi">Absensi</option>
                                            <option value="Data Karyawan">Data Karyawan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Awal</label>
                                        <input class="form-control" type="date" id="start_date" name="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                        <input class="form-control" type="date" id="end_date" name="end_date">
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" style="width: 130px;" type="submit">Export</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.text-danger').fadeOut('hard'); // Menghilangkan pesan error dengan efek fade
            }, 3000); // Menghilangkan pesan error setelah 3 detik (3000 milidetik)
        });
    </script>
    @endsection