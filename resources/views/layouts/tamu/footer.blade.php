<footer class="main-footer bg-white border-top mt-5">

    <div class="container py-4">

        <div class="row">

            {{-- Logo & Deskripsi --}}
            <div class="col-md-4 mb-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center mr-2"
                         style="width:45px; height:45px;">
                        <i class="fas fa-book-reader text-white"></i>
                    </div>

                    <div>
                        <h5 class="font-weight-bold text-primary mb-0">
                            Perpustakaan Digital
                        </h5>

                        <small class="text-muted">
                            Sekolah Modern Indonesia
                        </small>
                    </div>

                </div>

                <p class="text-muted text-justify">
                    Sistem perpustakaan digital sekolah yang membantu siswa
                    dan guru mengakses informasi buku dengan lebih cepat,
                    modern, dan efisien.
                </p>

            </div>

            {{-- Menu Cepat --}}
            <div class="col-md-4 mb-4">

                <h5 class="font-weight-bold text-dark mb-3">
                    Menu Cepat
                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-muted">
                            <i class="fas fa-angle-right mr-2"></i>
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/katalog') }}" class="text-muted">
                            <i class="fas fa-angle-right mr-2"></i>
                            Katalog Buku
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/kategori') }}" class="text-muted">
                            <i class="fas fa-angle-right mr-2"></i>
                            Kategori Buku
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/kontak') }}" class="text-muted">
                            <i class="fas fa-angle-right mr-2"></i>
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>

            {{-- Kontak --}}
            <div class="col-md-4 mb-4">

                <h5 class="font-weight-bold text-dark mb-3">
                    Kontak Sekolah
                </h5>

                <p class="text-muted mb-2">
                    <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                    Indonesia
                </p>

                <p class="text-muted mb-2">
                    <i class="fas fa-phone text-success mr-2"></i>
                    0812-XXXX-XXXX
                </p>

                <p class="text-muted mb-2">
                    <i class="fas fa-envelope text-primary mr-2"></i>
                    perpustakaan@sekolah.sch.id
                </p>

                <div class="mt-3">
                    <a href="#" class="btn btn-sm btn-primary rounded-circle mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" class="btn btn-sm btn-danger rounded-circle mr-1">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#" class="btn btn-sm btn-info rounded-circle">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

            </div>

        </div>

        <hr>

        {{-- Copyright --}}
        <div class="text-center text-muted">
            <strong>
                © {{ date('Y') }} Perpustakaan Digital Sekolah
            </strong>
            <br>
            <small>
                Dibangun menggunakan Laravel 13 & AdminLTE
            </small>
        </div>

    </div>

</footer>