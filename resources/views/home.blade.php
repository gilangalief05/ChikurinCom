<x-layout>
    <x-slot:title>Home</x-slot:title>
    <style>
        .g-1-icons {
            font-size: 48px;
        }
    </style>
    <div id="carouselExampleAutoplaying" class="carousel slide w-75 h-25 mx-auto m-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $id => $image)
            <div class="carousel-item {{$id == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$image) }}" class="img-fluid d-flex justify-content-center" alt="...">
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
                <a href="/g/monitor" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">desktop_windows</i>
                    <br>Monitor</br>
                </a>
                <a href="/g/laptop" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">laptop</i>
                    <br>Laptop</br>
                </a>
                <a href="/g/mobile" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">smartphone</i>
                    <br>Mobile</br>
                </a>
                <a href="/g/pc" class="btn btn-primary m-4 col-2" role="button">
                    <i class="material-icons g-1-icons mt-1">storage</i>
                    <br>PC</br>
                </a>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto my-4">
        <h4>Promosi</h4>
        <div class="grid m-2">
            <a href="/i/1" class="btn btn-primary text-start col m-2" role="button">
                <img src="https://picsum.photos/200/200?random=1" class="my-1">
                <br>Title</br>
                <h5>IDR 99.999.999</h5>
            </a>
            <a href="/i/2" class="btn btn-primary text-start col m-2" role="button">
                <img src="https://picsum.photos/200/200?random=2" class="my-1">
                <br>Title</br>
                <h5>IDR 99.999.999</h5>
            </a>
            <a href="/i/3" class="btn btn-primary text-start col m-2" role="button">
                <img src="https://picsum.photos/200/200?random=3" class="my-1">
                <br>Title</br>
                <h5>IDR 99.999.999</h5>
            </a>
            <a href="/i/4" class="btn btn-primary text-start col m-2" role="button">
                <img src="https://picsum.photos/200/200?random=4" class="my-1">
                <br>Title</br>
                <h5>IDR 99.999.999</h5>
            </a>
            <a href="/i/5" class="btn btn-primary text-start col m-2" role="button">
                <img src="https://picsum.photos/200/200?random=5" class="my-1">
                <br>Title</br>
                <h5>IDR 99.999.999</h5>
            </a>
        </div>
        <div class="text-end">
            <a href="./promotion" class="btn">Lainnya</a>
        </div>
    </div>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
</x-layout>
