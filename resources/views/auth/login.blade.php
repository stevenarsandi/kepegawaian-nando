@extends('layouts.app')

@section('content')
    
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-auto">
                            <div class="card card-plain">
                                <div class="card o-hidden border-0 pb-0 text-center">
                                    <div class="card-body">
                                        <h4 class="font-weight-bolder mt-4">Login</h4><hr>
                                        <p class="mb-4">Ketik email dan password anda untuk login!</p>
                                        <form role="form" method="POST" action="{{ route('login.perform') }}">
                                            @csrf
                                            @method('post')
                                            <div class="flex flex-col mb-3">
                                                <input type="email" name="email" class="form-control form-control-lg" value="" aria-label="Email" placeholder="Masukkan email / gmail">
                                                @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                            </div>
                                            <div class="flex flex-col mb-3">
                                                <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="" placeholder="Masukkan Password" >
                                                @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                            </div>
                                        
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                            </div>
                                        </form>
                                    </div><br><br>
                                    <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Belum punya Akun?
                                            <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Registrasi</a>
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
