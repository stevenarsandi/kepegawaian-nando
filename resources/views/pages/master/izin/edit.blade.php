@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Izin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('izin.update', ['id' => $izin->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Edit Data Izin</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Izin" value="{{ $izin->nama }}">
                                    </div>
                                    <!-- <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="{{ $izin->divisi }}" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama" {{ $izin->divisi === 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                                            <option value="Direktur" {{ $izin->divisi === 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                            <option value="Keuangan" {{ $izin->divisi === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Marketing" {{ $izin->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Kepala Lapangan"  {{ $izin->divisi === 'Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                                            <option value="Driver"  {{ $izin->divisi === 'Driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="Helper"  {{ $izin->divisi === 'Helper' ? 'selected' : '' }}>Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value=" {{ $izin->jabatan }}" selected hidden>Pilih Jabatan</option>
                                            <option value="Manager"  {{ $izin->jabatan === 'Manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="Supervisor" {{ $izin->jabatan === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="Member" {{ $izin->jabatan === 'Member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>      -->
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan Izin" value="{{ $izin->keterangan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal Izin" value="{{ $izin->tanggal }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Lama Hari / Jam</label>
                                        <input class="form-control" type="text" name="lama" placeholder="Masukkan Jumlah Hari atau Jam Izin" value="{{ $izin->lama }}">
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
