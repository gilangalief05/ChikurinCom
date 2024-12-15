<x-layout>
    <x-slot:title>...</x-slot:title>
    <div class="container my-4">
        <h4>Daftar Transaksi</h4>
        <table class="table table-stripped mx-2">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{$transaction->id}}</th>
                    <td>{{$transaction->user_name}}</td>
                    <td>{{$transaction->item_name}}</td>
                    <td>{{$transaction->total}}</td>
                    <td>{{$transaction->status}}</td>
                    <td>
                        @if($transaction->status == 'Sedang dikirim')
                        <form class="m-0" action="{{route('transaction.update')}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="tid" value="{{$transaction->id}}" hidden>
                            <button name="status" class="btn btn-success me-2" type="submit" value="Selesai">Selesai</button>
                            <button name="status" class="btn btn-danger me-2" type="submit" value="Dibatalkan">Dibatalkan</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-layout>