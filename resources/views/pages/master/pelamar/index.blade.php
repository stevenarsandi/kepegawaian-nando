@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pelamar'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h2>Daftar Pelamar</h2>
                </div>
                <div class="col-11 mx-5 text-end">
                    <a class="btn bg-gradient-success" href="{{ route('pelamarcreate') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">File</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form action="{{ route('pelamar') }}" method="GET" class="search-form">
                                <div style="display: inline-block; margin-left: -5px;">
                                    <input type="text" class="mx-5" name="search" placeholder="Ketik Untuk Mencari..." style="padding: 7px; border: 1px solid #ccc; border-radius: 5px 0 0 5px; width: 300px; font-size: 13px;">
                                    <button type="submit" style="padding: 8px 10px; background-color: #007bff; color: #fff; border: 1px solid #007bff; border-radius: 5px; cursor: pointer;  margin-left: -35px;"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                                @foreach($data as $key => $item)
                                <tr>
                                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{ $item->nama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center"><a href="{{ Storage::url('pelamar/'.$item->file) }}" style="color: blue;">{{ $item->file }}</a></p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-danger mx-1 btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $item->id }}"><i
                                                class="far fa-trash-alt" aria-hidden="true"></i></button>
                                            <a class="btn btn-info text-dark px-3" href="{{ route('pelamaredit', ['id' => $item->id]) }}"><i
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus Data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-delete').click(function () {
            var postId = $(this).data('id');
            $('#deleteForm').attr('action', '/pelamar/' + postId);
            $('#deleteModal').modal('show');
        });
    });
    function closeModal() {
        $('#deleteModal').modal('hide');
    }
</script>