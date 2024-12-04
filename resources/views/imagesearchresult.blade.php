<x-layout>
    <x-slot:title>Image Search</x-slot:title>
    <div class="container mx-auto my-4">
        <h4>Cari Gambar</h4>
        <div class="container mx-auto d-flex flex-column text-center">
            <img src="{{ asset('storage/'.$image_search_name) }}" class="mw-100 mh-100 mx-auto my-2" style="height: 360px;">
            <p>Objek gambar: <span class="fw-bold my-2">{{ $category }}</span></p>
        </div>
        <div class="grid m-2">
        @for ($i = 1; $i <= 10; $i++)
            <x-itemcontainer :iid=$i></x-itemcontainer>
        @endfor
        </div>
    </div>
</x-layout>
