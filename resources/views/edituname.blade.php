<x-layout>
    <x-slot:title>{{ $name }} - Edit Nama</x-slot:title>
    <div class="container border border-secondary mx-auto w-50 my-4 d-flex justify-content-around rounded">
        <div class="text-center mx-4 my-auto w-25">
            <img src="/chikurincom_logo.svg" class="m-1" width="64px" alt="Logo Chikurincom">
            <p class="">ChikurinCom</p>
        </div>
        <div class="my-4 px-4 container-fluid border-start">
            <h2 class="m-2">Edit Akun</h2>
            <form class="m-4" action="/u/{{ $uid }}/edit_user" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $uid }}">
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $name }}">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input readonly type="email" name="email" class="form-control" id="email" placeholder="" value="{{ $email }}">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="" required>
                </div>
                <div class="text-end m-2">
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>