@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'PHK'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h2>Daftar Karyawan PHK</h2>
                </div>
                <div class="col-11 mx-5 text-end">
                    <a class="btn bg-gradient-success" href="{{ route('phkcreate') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Jenis PHK</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                <tr>
                                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{ $item->nama }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{ $item->jenis }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0 text-center">{{ $item->keterangan }}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-danger mx-1 btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $item->id }}"><i
                                                class="far fa-trash-alt" aria-hidden="true"></i></button>
                                            <a class="btn btn-info text-dark px-3" href="{{ route('phkedit', ['id' => $item->id]) }}"><i
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
            $('#deleteForm').attr('action', '/phk/' + postId);
            $('#deleteModal').modal('show');
        });
    });
    function closeModal() {
        $('#deleteModal').modal('hide');
    }
</script>