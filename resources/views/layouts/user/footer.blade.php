<footer class="main-footer bg-white border-top">

    <div class="float-right d-none d-sm-inline-block">

        <span class="text-primary font-weight-bold">
            <i class="fas fa-book-reader mr-1"></i>
            Sistem Perpustakaan Digital
        </span>

    </div>

    <strong>
        © {{ date('Y') }}
        <span class="text-primary">
            Perpustakaan Digital Sekolah
        </span>
    </strong>

    <br>

    <small class="text-muted">
        Dibangun menggunakan Laravel 13 & AdminLTE
    </small>

</footer>
<form id="logout-form"
      action="{{ route('logoutuser') }}"
      method="POST"
      style="display: none;">
    @csrf
</form>
