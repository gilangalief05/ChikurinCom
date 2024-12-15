<x-layout>
    <x-slot:title>Image Search</x-slot:title>
    <div class="container mx-auto my-4">
        <h4>Cari Gambar</h4>
        <div class="container mx-auto d-flex flex-column text-center">
            <img src="{{ asset('storage/'.$image_search_name) }}" class="mw-100 mh-100 mx-auto my-2" style="height: 360px;">
            <p>Objek gambar: <span class="fw-bold my-2">{{ $category }} (Acc: {{number_format($detections[0]['confidence']*100, 2, ',')}}%)</span></p>
        </div>
        <div class="grid m-2">
            @foreach ($items as $item)
            <x-itemcontainer :$item></x-itemcontainer>
            @endforeach
        </div>
    </div>
</x-layout>
