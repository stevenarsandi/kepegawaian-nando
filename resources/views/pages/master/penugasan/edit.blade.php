@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Penugasan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('penugasan.update', ['id' => $penugasan->id]) }}" enctype="multipart/form-data">
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
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Cuti" value="{{ $penugasan->nama }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="divisi">Divisi</label>
                                        <select name="divisi" id="divisi" class="form-control input-air-primary">
                                            <option value="{{ $penugasan->divisi }}" selected hidden>Pilih Divisi</option>
                                            <option value="Direktur Utama" {{ $penugasan->divisi === 'Direktur Utama' ? 'selected' : '' }}>Direktur Utama</option>
                                            <option value="Direktur" {{ $penugasan->divisi === 'Direktur' ? 'selected' : '' }}>Direktur</option>
                                            <option value="Keuangan" {{ $penugasan->divisi === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                            <option value="Marketing" {{ $penugasan->divisi === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Kepala Lapangan"  {{ $penugasan->divisi === 'Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                                            <option value="Driver"  {{ $penugasan->divisi === 'Driver' ? 'selected' : '' }}>Driver</option>
                                            <option value="Helper"  {{ $penugasan->divisi === 'Helper' ? 'selected' : '' }}>Helper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal Cuti" value="{{ $penugasan->tanggal }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tujuan</label>
                                        <input class="form-control" type="text" name="tujuan" placeholder="Masukkan Tujuan Karyawan Yang Ditugaskan" value="{{ $penugasan->tujuan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Surat Tugas</label>
                                        <input class="form-control" type="file" name="surattugas" value="{{ $penugasan->surattugas }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <select name="keterangan" id="keterangan" class="form-control input-air-primary">
                                            <option value=" {{ $penugasan->keterangan }}" selected hidden>Pilih keterangan</option>
                                            <option value="Belum Selesai"  {{ $penugasan->keterangan === 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                            <option value="Selesai" {{ $penugasan->keterangan === 'Selesai' ? 'selected' : '' }}>Selesai</option>
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
