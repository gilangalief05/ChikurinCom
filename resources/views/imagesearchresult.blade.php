<x-layout>
    <x-slot:title>Image Search</x-slot:title>
    <div class="container mx-auto my-4">
        <h4>Cari Gambar</h4>
        <div class="container mx-auto d-flex flex-column text-center">
            <img src="{{ asset('storage/'.$image_search_name) }}" class="mw-100 mh-100 mx-auto my-2" style="height: 360px;">
            <p>Objek gambar: <span class="fw-bold my-2">...</span></p>
        </div>
        <div class="grid m-2">
        @for ($i = 1; $i <= 10; $i++)
            <x-itemcontainer :iid=$i></x-itemcontainer>
        @endfor
        </div>
        <div class="text-center my-4">
            <div class="btn-group">
                <a href="/g/{{ $category }}/{{ $page - 1 }}" class="btn btn-dark {{ $page == 1 ? 'disabled' : 'btn-dark'}}"><<</a>
                @for ($i = $page - 2; $i <= $page + 2; $i++)
                    @php
                        $imod = $i;
                        if ($page == 1) $imod += 2;
                        elseif ($page == 2) $imod += 1;
                        elseif ($page == 9) $imod -= 1;
                        elseif ($page == 10) $imod -= 2;
                    @endphp
                    <a href="/g/{{ $category }}/{{ $imod }}" class="btn {{ $imod == $page ? 'btn-primary disabled' : 'btn-dark'}}">{{ $imod }}</a>
                @endfor
                <a href="/g/{{ $category }}/{{ $page + 1 }}" class="btn btn-dark  {{ $page == 10 ? 'disabled' : 'btn-dark'}}">>></a>
            </div>
        </div>
    </div>
</x-layout>
