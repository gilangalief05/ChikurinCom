<x-layout>
    <x-slot:title>Register</x-slot:title>
    <div class="container border border-secondary mx-auto w-50 my-4 d-flex justify-content-around rounded">
        <div class="text-center mx-4 my-auto w-25">
            <i class="fa fa-github fa-4x"></i>
            <p class="">ChikurinCom</p>
        </div>
        <div class="my-4 px-4 container-fluid border-start">
            <h2 class="m-2">Register</h2>
            <div class="m-4">
                <div class="mb-3">
                    <label for="RegisterEmail">Email address</label>
                    <input type="email" class="form-control" id="RegisterEmail" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="RegisterName">Name</label>
                    <input type="text" class="form-control" id="RegisterName" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="RegisterUname">Username</label>
                    <input type="text" class="form-control" id="RegisterUname" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="RegisterPassword">Password</label>
                    <input type="password" class="form-control" id="RegisterPassword" placeholder="">
                </div>
                <p>Sudah memiliki akun? <span><a href="/login">Log in</a></span></p>
            </div>
            <div class="text-end m-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</x-layout>