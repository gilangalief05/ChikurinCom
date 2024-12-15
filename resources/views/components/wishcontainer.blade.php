<a href="/i/{{ $wishlist->item_id }}" class="d-flex container-fluid m-2 px-4 py-2 border rounded text-reset">
    <div style="width: 64px;" class="ratio ratio-1x1">
        <img src="{{ asset('/storage/'.$wishlist->thumbnail) }}" class="my-1 object-fit-cover w-100 h-100">
    </div>
    <div class="ms-4 me-1 my-1">
        <p class="h5">{{$wishlist->name}}</p>
        <p class="mb-2">IDR {{number_format($wishlist->price, 2, ',', '.')}}</p>
    </div>
</a>