<x-layout>
    <x-slot:title>{{ $user->name }} - Overview</x-slot:title>
    <x-profile :$user />
    <div class="container mx-auto my-4">
        <div class="my-2">
            <ul class="nav nav-tabs w-100">
                @foreach($menu_list as $id => $menu_l)
                    @if(Auth::id() == $user->id || $id < 2)
                    <li class="nav-item">
                        <a class="nav-link {{$menu_l == $menu ? 'active' : '' }}" aria-current="page" href="{{route('user.'.$menu_l, ['uid' => $user->id])}}">{{ $menu_name_list[$id] }}</a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="m-4">
            <p class="h2">Overview</p>
            @if(Auth::id() == $user->id)
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#bioModal">
                Edit Bio
            </button>
            <div class="modal fade" id="bioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editBio" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="m-0" action="{{route('bio.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editBio">Edit Bio</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <textarea name="bio" id="bio" class="form-control" style="height: 128px;">{{$bio ?? ""}}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            <p>
                {{$bio ?? ""}}
            </p>
        </div>
    </div>
    
</x-layout>