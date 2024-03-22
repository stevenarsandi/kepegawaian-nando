@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Absen'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('absen.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="text-start">
                                <h4>Absensi Diri</h4><hr>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                        <input class="form-control" type="text" name="nama" value="{{ old('id', auth()->user()->username) }}" readonly placeholder="Harap Mengisi Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Checkin / Checkout</label>
                                        <select name="status" id="status" class="form-control input-air-primary" required>
                                            <option value="" selected hidden>Pilih Status Checkin/Checkout</option>
                                            <option value="Check in">Check in</option>
                                            <option value="Check out">Check out</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jam</label>
                                        <input class="form-control" type="text" name="jam" placeholder="Masukkan Jam Checkin/Checkout" value="{{ $jam }}" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal Checkin/Checkout" value="{{ $tanggal }}" readonly required>
                                    </div>
                                    <!-- <div class="form-group text-center">
                                        <video id="video" width="640" height="480" autoplay></video>
                                        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
                                        <img id="captured-image" src="" width="640" height="480" style="display:none;">
                                    </div>
                                    <div class="text-center">
                                        <button id="snap" onclick="capturePhoto()" class="btn btn-primary">Ambil Foto</button>
                                    </div> -->
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script>
        // const video = document.getElementById('video');
        // const canvas = document.getElementById('canvas');
        // const snapButton = document.getElementById('snap');

        // navigator.mediaDevices.getUserMedia({ video: true })
        //     .then(stream => {
        //         video.srcObject = stream;
        //     })
        //     .catch(err => {
        //         console.error('Error accessing camera:', err);
        //     });

        // snapButton.addEventListener('click', function() {
        //     const context = canvas.getContext('2d');
        //     canvas.width = video.videoWidth;
        //     canvas.height = video.videoHeight;
        //     context.drawImage(video, 0, 0, canvas.width, canvas.height);

        //     const formData = new FormData();
        //     canvas.toBlob(blob => {
        //         formData.append('foto', blob, 'photo.jpg');

        //         fetch('{{ route("absen.store") }}', {
        //             method: 'POST',
        //             body: formData,
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             console.log('Response from server:', data);
        //             alert('Foto berhasil diambil dan disimpan.');
        //         })
        //         .catch(error => {
        //             console.error('Error sending photo to server:', error);
        //             alert('Terjadi kesalahan saat mengirim foto.');
        //         });
        //     }, 'image/jpeg');
        // });
        </script>
        
        @endsection