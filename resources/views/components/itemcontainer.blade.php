<a href="/i/{{ $item->id }}" class="btn btn-primary text-start col-2 m-2" role="button">
    <div class="ratio ratio-1x1">
        <img src="{{ asset('/storage/'.$item->thumbnail) }}" class="my-1 object-fit-cover w-100 h-100">
    </div>
    <br>{{ $item->name }}</br>
    <h5>IDR {{ number_format($item->price, 2, ',', '.') }}</h5>
</a>