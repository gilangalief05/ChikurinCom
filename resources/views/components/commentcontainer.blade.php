<div class="container-fluid m-2 px-4 py-2 border rounded">
    <a class="h5" href="{{route('item.view', ['iid' => $comment->item_id])}}">{{ $comment->item_name }}</a>
    <p class="mb-2">{{ $comment->comment }}</p>
    <!-- <div class="align-items-center text-reset text-end">
        <a>78</a>
        <span class="material-icons btn" style="font-size: 16px;">favorite_border</span>
    </div> -->
</div>