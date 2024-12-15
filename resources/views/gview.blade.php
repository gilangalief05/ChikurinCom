<x-layout>
    <x-slot:title>{{$category == 'Pc' ? strtoupper($category) : ucfirst($category) }} - Page {{ $page }}</x-slot:title>
    <style>
        li {
            list-style-type: none;
        }
    </style>
    <div class="container-fluid d-flex mx-auto my-4">
        <div class="m-4">
            <ul><a href="{{route('item.category', ['category' => 'monitor'])}}" class="text-reset"><b>Monitor</b></a>
                <!-- <li><a href="" class="text-reset ms-3">Dell</a></li>
                <li><a href="" class="text-reset ms-3">Lenovo</a></li>
                <li><a href="" class="text-reset ms-3">HP</a></li>
                <li><a href="" class="text-reset ms-3">LG</a></li> -->
            </ul>
            <ul><a href="{{route('item.category', ['category' => 'laptop'])}}" class="text-reset"><b>Laptop</b></a>
                <!-- <li><a href="" class="text-reset ms-3">Acer</a></li>
                <li><a href="" class="text-reset ms-3">HP</a></li>
                <li><a href="" class="text-reset ms-3">Asus</a></li>
                <li><a href="" class="text-reset ms-3">MSi</a></li> -->
            </ul>
            <ul><a href="{{route('item.category', ['category' => 'mobile'])}}" class="text-reset"><b>Mobile</b></a>
                <!-- <li><a href="" class="text-reset ms-3">Vivo</a></li>
                <li><a href="" class="text-reset ms-3">Oppo</a></li>
                <li><a href="" class="text-reset ms-3">Poco</a></li>
                <li><a href="" class="text-reset ms-3">Samsung</a></li>
                <li><a href="" class="text-reset ms-3">Infinix</a></li> -->
            </ul>
            <ul><a href="{{route('item.category', ['category' => 'pc'])}}" class="text-reset"><b>PC</b></a>
            </ul>
            <hr>
            <ul><a href="{{route('item.category', ['category' => 'all'])}}" class="text-reset"><b>Semua</b></a>
        </div>
        <div class="container m-4">
            <h4>List Produk: {{ $category == 'Pc' ? strtoupper($category) : ucfirst($category) }}</h4>
            <div class="grid m-2">
            @foreach ($items as $item)
                <x-itemcontainer :$item></x-itemcontainer>
            @endforeach
            </div>
            <!-- <div class="text-center my-4">
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
            </div> -->
        </div>
    </div>
</x-layout>
