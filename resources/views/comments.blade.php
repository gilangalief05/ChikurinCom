<x-layout>
    <x-slot:title>{{ $uname }} - Komentar</x-slot:title>
    <x-profile uid="{{ $uid }}" uname="{{ $uname }}" filename="{{ $filename }}" />
    <div class="container mx-auto my-4">
        <div class="my-2">
            <ul class="nav nav-tabs w-100">
                @foreach($menu_list as $id => $menu_l)
                <li class="nav-item">
                    <a class="nav-link {{$menu_l == $menu ? 'active' : '' }}" aria-current="page" href="/u/{{ $uid }}/{{ $menu_l }}">{{ $menu_name_list[$id] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="m-4">
            <p class="h2">Komentar</p>
            @for ($i = 0; $i < 10; $i++)
                <x-commentcontainer title="Title"></x-commentcontainer>
            @endfor
        </div>
    </div>
    
</x-layout>