<div class="container-fluid m-2 px-4 py-2 border rounded">
    <a class="h5" href="{{route('item.view', ['iid' => $comment->item_id])}}">{{ $comment->item_name }}</a>
    <div class="mt-2">
        @for ($i = 0; $i < $comment->rating; $i++)
            <span class="material-icons text-warning">star</span>
        @endfor
    </div>
    <p class="mb-2">{{ $comment->comment }}</p>
    <!-- <div class="align-items-center text-reset text-end">
        <a>78</a>
        <span class="material-icons btn" style="font-size: 16px;">favorite_border</span>
    </div> -->
</div>