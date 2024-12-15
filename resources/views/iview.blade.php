<x-layout>
    <x-slot:title>{{$item->name}}</x-slot:title>
    <style>
    </style>
    <div class="container mx-auto my-4">
        <p class="h4">{{$item->name}}</p>
        <div class="d-flex">
            <div id="carouselExampleAutoplaying" style="min-width: 320px; min-height: 320px;" class="carousel slide mx-auto m-4" data-bs-ride="carousel">
                <div class="carousel-inner w-100 h-100">
                @foreach ($files as $id => $file)
                    <div class="carousel-item {{$id == 0 ? 'active' : '' }} ratio ratio-1x1">
                        <img src="{{ asset('/storage/'.$file) }}" class="object-fit-cover justify-content-center w-100 h-100" alt="...">
                    </div>
                @endforeach
                </div>
                <button class="carousel-control-prev" style="height: 320px;" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="height: 320px;" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="m-4 container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="d-block my-1">
                        <a>Stok tersisa <span id="stockTotal" class="fw-bold">{{$item->stock}}</span></a>
                        <div class="d-flex align-items-center">
                            <a><span class="fw-bold">{{number_format($average, 1, ',')}}</span>/5</a>
                            <i class="fa fa-star fa-lg mx-1"></i>
                        </div>
                    </div>
                    @if(Auth::check())
                    <div class="d-inline m-2">
                        <form class="mb-0" action="{{$is_wish ? route('wishlist.delete') : route('wishlist.store')}}" method="post">
                            @csrf
                            @method($is_wish ? 'DELETE' : 'POST')
                            <button class="btn m-0" name="iid" value="{{$item->id}}" type="submit">
                                <span class="material-icons">{{$is_wish ? 'bookmark_added' : 'bookmark_add'}}</span>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                
                <p class="h3 my-4 fw-bold">IDR {{number_format($item->price, 2, ',', '.')}}</p>
                
                @if(Auth::id() == 1)
                <button type="button" class="btn btn-primary m-2 d-inline" data-bs-toggle="modal" data-bs-target="#stockModal">
                Edit Stok
                </button>
                <div class="modal fade" id="stockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStock" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="m-0" action="{{route('item.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                                <input type="number" name="iid" value="{{$item->id}}" hidden>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editStock">Edit Stok</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="stock" value="{{$item->stock}}" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Selesai</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form class="m-2 d-inline" action="{{route('item.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" name="iid" value="{{$item->id}}" type="submit">
                        Delete Post
                    </button>
                </form>
                @endif

                <div class="my-4">
                    <p class="h6">Detail Produk</p>
                    <a>{{$item->description}}</a>
                </div>
            </div>
            <form class="container mx-auto my-4 w-50 border border-secondary rounded" action="{{route('transaction.store')}}" method="post">
                @csrf
                <input type="number" name="iid" value="{{$item->id}}" hidden>
                <p class="h5 mt-4 mb-3 w-100 text-center">Pembelian</p>
                <div class="input-group w-50 mx-2 my-3">
                    <label for="total" class="form-label">Jumlah</label>
                    <div class="input-group">
                        <button class="btn btn-outline-light" id="minus" type="button">-</button>
                        <input type="number" class="form-control text-center" name="total" id="total" readonly>
                        <button class="btn btn-outline-light" id="plus" type="button">+</button>
                    </div>
                </div>
                <div class="mx-2 my-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>
                <!-- <div class="d-flex justify-content-between align-items-center mx-2 my-3">
                    <p class="h6 float-left">Total</p>
                    <p class="h5 fw-bold float-right">IDR {{number_format($item->price, 2, ',', '.')}}</p>
                </div> -->
                <div class="d-grid mx-2 my-3">
                    @if($item->stock > 0)
                    <button class="btn btn-primary m-1" type="submit">Beli</button>
                    @else
                    <p class="text-center"><em>Barang habis</em></p>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <hr class="container">
    <div class="container mx-auto my-4">
        <h3>Komentar</h3>
        <div class="my-2">
            <form class="container d-flex justify-content-center" action="{{route('comment.store')}}" method="post">
                @csrf
                <input type="number" class="form-control" name="iid" value="{{$item->id}}" hidden>
                <div class="mb-3 px-2">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="" pattern="[1-5]" required>
                </div>
                <div class="mb-3 px-2 w-50">
                    <label for="comment" class="form-label">Komentar</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="">
                </div>
                <div class="text-end mx-2 my-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        @foreach($comments as $comment)
        <div class="m-2 p-2">
            <a href="{{route('user.overview', ['uid' => $comment->user_id])}}" class="h6 link-underline link-underline-opacity-0 me-2 align-middle"> <img src="{{ asset('storage/profile_picture/'.$comment->filename) }}" class="rounded-circle object-fit-cover me-2" height="24px" width="24px"> {{$comment->user_name}}</a><em class="text-secondary"> {{$comment->created_at}}</em>
            <div class="mx-3 my-2">
                @for ($i = 0; $i < $comment->rating; $i++)
                <span class="material-icons text-warning">star</span>
                @endfor
            </div>
            <p class="mx-3 my-2">{{$comment->comment}}</p>
            @if(Auth::id() == $comment->user_id)
                <form class="mx-3 mt-0" action="{{route('comment.delete', ['cid' => $comment->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn text-danger mb-0" type="submit">
                        Delete Comment
                    </button>
                </form>
            @endif
        </div>
        @endforeach
    </div>
    <script type="text/javascript">
        let minus = document.getElementById("minus");
        let total = document.getElementById("total");
        let plus = document.getElementById("plus");

        let totalNum = 1;
        total.value = totalNum;

        minus.addEventListener("click", () => {
            if (totalNum > 1) {
                totalNum -= 1;
            }
            total.value = totalNum;
        });

        plus.addEventListener("click", () => {
            let price_total = document.getElementById("priceTotal");

            if (totalNum < <?php echo $item->stock; ?>)  {
                totalNum += 1;
            }
            total.value = totalNum;
        });
    </script>
</x-layout>