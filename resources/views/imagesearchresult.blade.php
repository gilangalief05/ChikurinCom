<x-layout>
    <x-slot:title>Image Search Result</x-slot:title>
    <div class="container mx-auto my-4">
        <h4>Hasil Pencarian Gambar</h4>
        <div class="container mx-auto d-flex flex-column text-center">
            <!-- Menampilkan gambar hasil pencarian -->
            <img src="{{ asset('storage/' . $image_search_name) }}" class="mw-100 mh-100 mx-auto my-2" style="height: 360px;">

            <!-- Menampilkan kategori utama hasil deteksi -->
            <p>Objek gambar: <span class="fw-bold my-2">{{ $category }}</span></p>

            <!-- Menampilkan akurasi deteksi utama -->
            @isset($accuracy)
                <p>Akurasi Deteksi: <span class="fw-bold my-2">{{ number_format($accuracy * 100, 2) }}%</span></p>
            @endisset
        </div>

        <!-- Menampilkan detail semua hasil deteksi -->
        <div class="container mt-4">
            <h5>Detail Deteksi:</h5>
            <ul>
                @foreach ($detections as $detection)
                    <li>
                        Kelas: {{ $detection['class'] }} - Confidence: {{ number_format($detection['confidence'] * 100, 2) }}%
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Bagian grid (jika diperlukan) -->
        <div class="grid m-2">
            @for ($i = 1; $i <= 10; $i++)
                <x-itemcontainer :iid=$i></x-itemcontainer>
            @endfor
        </div>
    </div>
</x-layout>