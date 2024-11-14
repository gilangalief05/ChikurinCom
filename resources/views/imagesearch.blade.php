<x-layout>
    <x-slot:title>Image Search</x-slot:title>
    <div style="margin: 200px auto;">
        <div class="container text-center my-5">
            <a class="display-3 text-light">
                <i class="fa fa-github fa-lg me-2"></i>
                ChikurinCom
            </a>
            <div>Image Search</div>
        </div>
        <div class="container align-items-center w-50 my-4">
            <form action="image_search" class="input-group" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" id="image_for_search" name="image_for_search">
                <button class="btn btn-primary material-icons" type="submit">search</button>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</x-layout>