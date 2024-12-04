<div class="container mx-auto my-4 border border-secondary rounded">
    <div class="d-flex">
        <img src="{{ asset('storage/profile_picture/'.$filename) }}" class="rounded-circle m-4" height="128px">
        <div class="mx-4 my-auto container-fluid d-block">
            <a class="h2">{{ $uname }}<span class="material-icons mx-2">verified</span></a>
            <br>
            <p class="mb-3">UID: {{ $uid }}</p>
            <div>
                <a href="/u/{{ $uid }}/edit_user" class="btn btn-primary w-25 m-1" role="button">Edit Akun</a>
                <a href="#" class="btn btn-danger w-25 m-1" role="button" data-bs-toggle="button">Hapus Akun</a>
            </div>
        </div>
    </div>
</div>
{{ $slot }}