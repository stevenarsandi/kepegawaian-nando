@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Penugasan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('penugasan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Tambah Data Penugasan</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Karyawan" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama">Direktur Utama</option>
                                            <option value="Direktur">Direktur</option>
                                            <option value="Keuangan">Keuangan</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Kepala Lapangan">Kepala Lapangan</option>
                                            <option value="Driver">Driver</option>
                                            <option value="Helper">Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Penugasan</label>
                                        <input class="form-control" type="date" name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tujuan</label>
                                        <input class="form-control" type="text" name="tujuan" placeholder="Masukkan Tujuan Karyawan Yang Ditugaskan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Surat Tugas</label>
                                        <input class="form-control" type="file" name="surattugas">
                                        @error('surattugas')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="keterangan" value="Belum Selesai">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="created_by" value="{{ old('id', auth()->user()->username) }}">
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-light me-1" style="width: 100px;" onclick="history.back()" type="button">Tutup</button>
                            <button class="btn btn-primary" style="width: 130px;" type="submit">Simpan</button>
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