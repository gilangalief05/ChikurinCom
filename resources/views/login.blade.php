<x-layout>
    <x-slot:title>Log in</x-slot:title>
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
                    <input type="email" class="form-control" id="email" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="">
                </div>
                <p>Belum memiliki akun? <span><a href="/register">Register</a></span></p>
            </div>
            <div class="text-end m-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</x-layout>
