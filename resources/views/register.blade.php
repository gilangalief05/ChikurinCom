<x-layout>
    <x-slot:title>Register</x-slot:title>
    <div class="container border border-secondary mx-auto w-50 my-4 d-flex justify-content-around rounded">
        <div class="text-center mx-4 my-auto w-25">
            <img src="/chikurincom_logo.svg" class="m-1" width="64px" alt="Logo Chikurincom">
            <p class="">ChikurinCom</p>
        </div>
        <div class="vr m-4"></div>
        <div class="my-4 px-4 container-fluid">
            <h2 class="m-2">Register</h2>
            <div class="m-4">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="profile-pict">Foto Profil</label>
                    <input type="file" class="form-control" id="profile-pict" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="" required>
                </div>
                <p>Sudah memiliki akun? <span><a href="/login">Log in</a></span></p>
            </div>
            <div class="text-end m-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</x-layout>