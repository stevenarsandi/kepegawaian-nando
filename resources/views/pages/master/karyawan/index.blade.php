@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Karyawan'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h2>Daftar Karyawan</h2>
                </div>
                <div class="col-11 mx-5 text-end">
                    <a class="btn bg-gradient-success" href="{{ route('karyawancreate') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Divisi
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $item->nama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $item->divisi }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $item->created_at }}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                            <a class="btn btn-info text-dark px-3" href="{{ route('karyawanedit', ['id' => $item->id]) }}"><i
                                                class="fas fa-pencil-alt text-dark" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
