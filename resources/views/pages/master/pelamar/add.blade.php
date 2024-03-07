@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Pelamar'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('pelamar.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Tambah Data Pelamar</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama pelamar">
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Divisi Yang Dilamar</option>
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Jabatan Yang Dilamar</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Member">Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat pelamar">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggallahir" placeholder="Masukkan Tanggal Lahir pelamar">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">No Telepon</label>
                                        <input class="form-control" type="text" name="notelepon" placeholder="Masukkan Nomor Telepon pelamar" minlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">NIK</label>
                                        <input class="form-control" type="text" name="nik" placeholder="Masukkan Nomor Induk pelamar" minlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email pelamar">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">File</label>
                                        <input class="form-control" type="file" name="file">
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
    @endsection
