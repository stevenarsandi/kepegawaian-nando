@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah User'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Tambah Data User</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email user">
                                    </div>
                                    <div class="mb-4">
                                        <label class="ol-sm-2 col-form-label" for="role">Role</label>
                                        <select name="role" id="role" class="form-control input-air-primary">
                                            <option value="" selected hidden>Pilih Hak Akses</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Member">Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Masukkan Password user">
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
