<div class="container mx-auto my-4 border border-secondary rounded">
    <div class="d-flex">
        <img src="{{ asset('storage/profile_picture/'.$user->filename) }}" class="rounded-circle m-4 object-fit-cover" height="128px" width="128px">
        <div class="mx-4 my-auto container-fluid d-block">
            <a class="h2">{{ $user->name }}<span class="material-icons mx-2">verified</span></a>
            <br>
            <p class="mb-3">UID: {{ $user->id }}</p>
            @if(Auth::id() == $user->id)
            <div>
                <button class="btn btn-primary w-25 m-1" data-bs-toggle="modal" data-bs-target="#editNameModal">
                    Edit Akun
                </button>
                <div class="modal fade" id="editNameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editName" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="m-0" action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editName">Edit Nama</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input readonly type="email" name="email" class="form-control-plaintext" id="email" placeholder="" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Selesai</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger w-25 m-1" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Hapus Akun
                </button>
                <div class="modal fade" id="deleteUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteUser" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="m-0" action="{{route('user.delete')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUser">Hapus Akun</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <p>Apakah anda yakin akan menghapus akun? Semua data pada akun akan hilang selamanya!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Tetap hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
{{ $slot }}