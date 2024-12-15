<div class="d-flex container-fluid m-2 px-4 py-2 border rounded text-reset">
    <div style="width: 128px;" class="ratio ratio-1x1">
        <img src="{{ asset('/storage/'.$buyhistory->thumbnail) }}" class="my-1 object-fit-cover w-100 h-100">
    </div>
    <div class="ms-4 me-1 my-1">
        <p class="h5">{{$buyhistory->name}}</p>
        <p class="mb-2">Jumlah: {{$buyhistory->total}}</p>
        <p class="mb-2">Total harga: IDR {{number_format($buyhistory->price, 2, ',', '.')}}</p>
        <p class="mb-2">Status: {{$buyhistory->status}}</p>
    </div>
</div>