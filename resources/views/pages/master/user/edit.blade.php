@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Edit Data User</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="Masukkan Username" value="{{ $user->username }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Masukkan password Email user" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Role</label>
                                        <select name="role" id="role" class="form-control input-air-primary">
                                            <option value="{{ $user->role }}" selected hidden>Pilih Hak Akses</option>
                                            <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="Member" {{ $user->role === 'Member' ? 'selected' : '' }}>Member</option>
                                        </select>
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
