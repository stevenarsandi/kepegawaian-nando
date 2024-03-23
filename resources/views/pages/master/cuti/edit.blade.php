@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Cuti'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('cuti.update', ['id' => $cuti->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Edit Data Cuti</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Cuti" value="{{ $cuti->nama }}">
                                    </div>
                                    <!-- <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="{{ $cuti->divisi }}" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama" {{ $cuti->divisi === 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                                            <option value="Direktur" {{ $cuti->divisi === 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                            <option value="Keuangan" {{ $cuti->divisi === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Marketing" {{ $cuti->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Kepala Lapangan"  {{ $cuti->divisi === 'Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                                            <option value="Driver"  {{ $cuti->divisi === 'Driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="Helper"  {{ $cuti->divisi === 'Helper' ? 'selected' : '' }}>Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value=" {{ $cuti->jabatan }}" selected hidden>Pilih Jabatan</option>
                                            <option value="Manager"  {{ $cuti->jabatan === 'Manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="Supervisor" {{ $cuti->jabatan === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="Member" {{ $cuti->jabatan === 'Member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>      -->
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan Cuti" value="{{ $cuti->keterangan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal Cuti" value="{{ $cuti->tanggal }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah Hari</label>
                                        <input class="form-control" type="text" name="lama" placeholder="Masukkan Jumlah Hari Cuti" value="{{ $cuti->lama }}">
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
