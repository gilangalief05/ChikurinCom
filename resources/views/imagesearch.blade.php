<x-layout>
    <x-slot:title>Image Search</x-slot:title>
    <div style="margin: 200px auto;">
        <div class="container text-center my-5">
            <a class="display-3 text-light">
                <img src="/chikurincom_logo.svg" class="mx-2" width="64px" alt="Logo Chikurincom">
                <span class="mx-3">ChikurinKom</span>
            </a>
            <div>Image Search</div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form action="/image_search" class="container align-items-center w-50" id="img_search" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="file" class="form-control" id="image_for_search" name="image_for_search" required>
                <button class="btn btn-primary material-icons" type="submit">search</button>
            </div>
        </form>
    </div>
    <script src="" async defer></script>
</x-layout>