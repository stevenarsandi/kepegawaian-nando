@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Cuti'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('cuti.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Tambah Data Cuti</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label class="form-label" for="select-input-karyawan_id">Nama</label>
                                        <select name="karyawan_id" id="karyawan_id" class="form-control input-air-primary">
                                            <option value="">Pilih Nama Karyawan</option>
                                            @foreach($karyawan as $karyawan)
                                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="form-control" type="hidden" id="nama" name="nama" placeholder="Masukkan Nama Karyawan">
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Jabatan</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Member">Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan Cuti">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal Cuti">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah Hari Cuti</label>
                                        <input class="form-control" type="text" name="lama" placeholder="Masukkan Jumlah Hari Cuti">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#karyawan_id').change(function() {
                var id = $(this).val();
                if (id) {
                    // Kirim permintaan Ajax ke endpoint yang tepat
                    $.ajax({
                        url: "cuti/getdata/" + id + "/",
                        type: 'GET',
                        dataType: 'json',
                        success: function(karyawan) {
                            $('#nama').val(karyawan.nama);
                            if (karyawan.divisi) {
                                var divisiDropdown = '<option value="' + karyawan.divisi + '">' + karyawan.divisi + '</option>';
                                $('#divisi').html(divisiDropdown);
                            } else {
                                $('#divisi').empty(); // Mengosongkan dropdown divisi jika tidak ada data divisi
                            }
                            if (karyawan.jabatan) {
                                    var jabatanDropdown = '<option value="' + karyawan.jabatan + '">' + karyawan.jabatan + '</option>';
                                    $('#jabatan').html(jabatanDropdown);
                                } else {
                                    $('#jabatan').empty(); // Mengosongkan dropdown jabatan jika tidak ada data jabatan
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#nama').val(''); 
                    $('#divisi').val(''); 
                    $('#jabatan').val(''); 
                }
            });
        });
    </script>
