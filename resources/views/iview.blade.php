<x-layout>
    <x-slot:title>Item</x-slot:title>
    <style>
    </style>
    <div class="container mx-auto my-4">
        <p class="h4">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
        <div class="d-flex">
            <div id="carouselExampleAutoplaying" style="width: 320px; height: 320px;" class="carousel slide w-25 mx-auto m-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                @for ($i = 0; $i < 3; $i++)
                    <div class="carousel-item {{$i == 0 ? 'active' : '' }}">
                        <img src="https://picsum.photos/320/320?random={{$i+1}}" class="img-cover d-flex justify-content-center" alt="...">
                    </div>
                @endfor
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
            <div class="m-4 container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="d-block my-1">
                        <a><span class="fw-bold">100,000</span> Terjual</a>
                        <div class="d-flex align-items-center">
                            <a><span class="fw-bold">8.2</span>/10</a>
                            <i class="fa fa-star fa-lg mx-1"></i>
                        </div>
                    </div>
                    <a href="#" class="btn" role="button" data-bs-toggle="button"><span class="material-icons m-1">bookmark_add</span></a>
                </div>
                
                <p class="h3 my-4 fw-bold">IDR 99,999,999</p>
                <div class="my-2">
                    <div class="m-2" role="group" aria-label="Basic radio toggle button group">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" class="btn-check" name="opsi" id="opsi{{ $i }}" autocomplete="off">
                        <label class="btn btn-outline-primary m-1" for="opsi{{ $i }}">Opsi {{ $i }}</label>
                    @endfor
                    </div>
                </div>
                <div class="my-4">
                    <p class="h6">Detail Produk</p>
                    <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed pulvinar neque, ac facilisis diam. Curabitur et pretium augue. Nulla vehicula ipsum ut varius consectetur. Aliquam a sagittis nulla. Proin ac hendrerit ante. Aliquam rhoncus erat id orci consectetur eleifend. Aenean ornare lacus fermentum lectus sagittis bibendum. Donec pulvinar fermentum placerat.</a>
                </div>
            </div>
            <div class="container mx-auto my-4 w-50 border border-secondary rounded">
                <p class="h5 mt-4 mb-3 w-100 text-center">Pembelian</p>
                <div class="mx-2 my-3">
                    <label for="form-alamat" class="form-label">Pilihan</label>
                    <input type="text" readonly class="form-control-plaintext" id="form-pilihan" value="Opsi 1">
                </div>
                <div class="input-group w-50 mx-2 my-3">
                    <label for="form-jumlah" class="form-label">Jumlah</label>
                    <div class="input-group">
                        <button class="btn btn-outline-light" id="minus" type="button">-</button>
                        <button class="btn btn-outline-light" id="count" type="button" disabled readonly>1</button>
                        <button class="btn btn-outline-light" id="plus" type="button">+</button>
                    </div>
                </div>
                <div class="mx-2 my-3">
                    <label for="form-alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="form-alamat" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-between align-items-center mx-2 my-3">
                    <p class="h6 float-left">Total</p>
                    <p class="h5 fw-bold float-right">IDR 59,999</p>
                </div>
                <div class="d-grid mx-2 my-3">
                    <button class="btn btn-outline-primary m-1" type="button">Masuk keranjang</button>
                    <button class="btn btn-primary m-1" type="button">Beli</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let minus = document.getElementById("minus");
        let count = document.getElementById("count");
        let plus = document.getElementById("plus");

        let countNum = 0;
        count.innerHTML = countNum;

        minus.addEventListener("click", () => {
            countNum -= 1;
            count.innerHTML = countNum;
        });

        plus.addEventListener("click", () => {
            countNum += 1;
            count.innerHTML = countNum;
        });
    </script>
</x-layout>