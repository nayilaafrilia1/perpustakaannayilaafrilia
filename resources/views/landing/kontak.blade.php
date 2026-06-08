@extends('layouts.apptamu')

@section('title', 'Kontak')

@section('content')

<div class="row">

    <div class="col-md-5 mb-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <h4 class="font-weight-bold text-primary mb-4">
                    Informasi Kontak
                </h4>

                <p>
                    <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                    Indonesia
                </p>

                <p>
                    <i class="fas fa-phone text-success mr-2"></i>
                    0812-XXXX-XXXX
                </p>

                <p>
                    <i class="fas fa-envelope text-primary mr-2"></i>
                    perpustakaan@sekolah.sch.id
                </p>

                <hr>

                <h5 class="font-weight-bold mb-3">
                    Media Sosial
                </h5>

                <button class="btn btn-primary rounded-circle mr-2">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button class="btn btn-danger rounded-circle mr-2">
                    <i class="fab fa-instagram"></i>
                </button>

                <button class="btn btn-info rounded-circle">
                    <i class="fab fa-twitter"></i>
                </button>

            </div>

        </div>

    </div>

    <div class="col-md-7">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h4 class="font-weight-bold text-primary mb-4">
                    Kirim Pesan
                </h4>

                <form>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>

                    <button class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection