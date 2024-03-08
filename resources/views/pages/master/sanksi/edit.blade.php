@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Sanksi'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('sanksi.update', ['id' => $sanksi->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Edit Data Sanksi</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama sanksi" value="{{ $sanksi->nama }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="{{ $sanksi->divisi }}" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama" {{ $sanksi->divisi === 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                                            <option value="Direktur" {{ $sanksi->divisi === 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                            <option value="Keuangan" {{ $sanksi->divisi === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Marketing" {{ $sanksi->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Kepala Lapangan"  {{ $sanksi->divisi === 'Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                                            <option value="Driver"  {{ $sanksi->divisi === 'Driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="Helper"  {{ $sanksi->divisi === 'Helper' ? 'selected' : '' }}>Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value=" {{ $sanksi->jabatan }}" selected hidden>Pilih Jabatan</option>
                                            <option value="Manager"  {{ $sanksi->jabatan === 'Manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="Supervisor" {{ $sanksi->jabatan === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            <option value="Member" {{ $sanksi->jabatan === 'Member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Sanksi</label>
                                        <input class="form-control" type="text" name="sanksi" placeholder="Masukkan Sanksi Yang Diterima" value="{{ $sanksi->sanksi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" placeholder="Masukkan keterangan Sanksi" value="{{ $sanksi->keterangan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal </label>
                                        <input class="form-control" type="date" name="tanggal" value="{{ $sanksi->tanggal }}">
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
