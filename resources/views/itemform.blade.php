<x-layout>
    <x-slot:title>Add Item</x-slot:title>
    <div class="container border border-secondary mx-auto w-50 my-4 d-flex justify-content-around rounded">
        <div class="text-center mx-4 my-auto w-25">
            <img src="/chikurincom_logo.svg" class="m-1" width="64px" alt="Logo Chikurincom">
            <p class="">ChikurinKom</p>
        </div>
        <div class="vr m-4"></div>
        <div class="my-4 px-4 container-fluid">
            <h2 class="m-2">Add Item</h2>
            <form class="m-4" action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" style="height: 128px;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category">Kategori</label>
                    @php
                    $categories = ['Monitor', 'Laptop', 'Mobile', 'PC'];
                    @endphp
                    <div>
                        @foreach($categories as $category)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="category" value="{{$category}}">
                            <label class="form-check-label" for="category">{{$category}}</label>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="picture">Foto</label>
                    <input type="file" class="form-control" name="picture[]" id="picture" placeholder="" multiple>
                </div>
                <div class="mb-3">
                    <label for="type">Stok</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="" required>
                </div>
                <div class="text-end m-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>