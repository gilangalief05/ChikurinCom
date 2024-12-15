<x-layout>
    <x-slot:title>Home</x-slot:title>
    <style>
        .g-1-icons {
            font-size: 48px;
        }
    </style>
    @if(Auth::id() == 1)
    <div class="container my-4">
        <h4>Kontrol Admin</h4>
        <div class="container m-2">
            <a href="{{route('item.form')}}" class="btn btn-primary">Tambah barang</a>
            <a href="{{route('transaction.list')}}" class="btn btn-primary">Daftar Pesanan</a>
        </div>
    </div>
    @endif
    <div id="carouselExampleAutoplaying" class="carousel slide w-75 h-25 mx-auto m-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($promo as $id => $banner)
            <div class="carousel-item {{$id == 0 ? 'active' : '' }} ratio" style="--bs-aspect-ratio: calc(100%/3);">
                <img src="{{ asset('storage/'.$banner) }}" class="object-fit-cover justify-content-center w-100 h-100" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mx-auto my-4">
        <h4>Jenis Barang</h4>
        <div class="container text-center m-2">
            <div class="d-grid align-items-center col-12 d-md-block">
                <a href="{{route('item.category', ['category' => 'monitor'])}}" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">desktop_windows</i>
                    <br>Monitor</br>
                </a>
                <a href="{{route('item.category', ['category' => 'laptop'])}}" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">laptop</i>
                    <br>Laptop</br>
                </a>
                <a href="{{route('item.category', ['category' => 'mobile'])}}" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">smartphone</i>
                    <br>Mobile</br>
                </a>
                <a href="{{route('item.category', ['category' => 'pc'])}}" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">storage</i>
                    <br>PC</br>
                </a>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto my-4">
        <h4>Barang Terbaru</h4>
        <div class="grid m-2">
        
        @foreach ($items as $item)
            <x-itemcontainer :$item></x-itemcontainer>
        @endforeach
        </div>
        <div class="text-end">
            <a href="/g/all" class="btn">Lainnya</a>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Versi Beta</h1>
                </div>
            <div class="modal-body">
                <p>Website ini masih dalam versi beta (v0.5)</p>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#exampleModal").modal('show');
        });
    </script>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
</x-layout>
