@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Karyawan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('karyawan.update', ['id' => $karyawan->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Edit Data Karyawan</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Karyawan" value="{{ $karyawan->nama }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="{{ $karyawan->divisi }}" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama" {{ $karyawan->divisi === 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                                            <option value="Direktur" {{ $karyawan->divisi === 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                            <option value="Keuangan" {{ $karyawan->divisi === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Marketing" {{ $karyawan->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Kepala Lapangan"  {{ $karyawan->divisi === 'Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                                            <option value="Driver"  {{ $karyawan->divisi === 'Driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="Helper"  {{ $karyawan->divisi === 'Helper' ? 'selected' : '' }}>Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value=" {{ $karyawan->jabatan }}" selected hidden>Pilih Jabatan</option>
                                            <option value="Manager"  {{ $karyawan->jabatan === 'Manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="Supervisor" {{ $karyawan->jabatan === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="Member" {{ $karyawan->jabatan === 'Member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control input-air-primary">
                                            <option value="{{ $karyawan->jeniskelamin }}" selected hidden>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki" {{ $karyawan->jeniskelamin === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ $karyawan->jeniskelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat karyawan" value="{{ $karyawan->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggallahir" placeholder="Masukkan Tanggal Lahir karyawan" value="{{ $karyawan->tanggallahir }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">No Telepon</label>
                                        <input class="form-control" type="text" name="notelepon" placeholder="Masukkan Nomor Telepon karyawan" minlength="10" value="{{ $karyawan->notelepon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">NIK</label>
                                        <input class="form-control" type="text" name="nik" placeholder="Masukkan Nomor Induk karyawan" minlength="10" value="{{ $karyawan->nik }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email karyawan" value="{{ $karyawan->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                        <select name="status" id="status" class="form-control input-air-primary">
                                            <option value="{{ $karyawan->status }}" selected hidden>Pilih Status Karyawan</option>
                                            <option value="Pegawai Tetap" {{ $karyawan->status === 'Pegawai Tetap' ? 'selected' : '' }}>Pegawai Tetap</option>
                                            <option value="Training" {{ $karyawan->status === 'Training' ? 'selected' : '' }}>Training</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="updated_by" value="{{ old('id', auth()->user()->username) }}">
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
