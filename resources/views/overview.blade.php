<x-layout>
    <x-slot:title>{{ $uname }} - Overview</x-slot:title>
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
            <p class="h2">Overview</p>
            <a>
                &emsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed pulvinar neque, ac facilisis diam. Curabitur et pretium augue. Nulla vehicula ipsum ut varius consectetur. Aliquam a sagittis nulla. Proin ac hendrerit ante. Aliquam rhoncus erat id orci consectetur eleifend. Aenean ornare lacus fermentum lectus sagittis bibendum. Donec pulvinar fermentum placerat. Proin et elementum quam, varius vehicula urna. Donec ut est at dui aliquam lacinia ut in nisl. Phasellus quis sem quis erat convallis consectetur nec non neque. Sed et sodales nulla, quis imperdiet nunc. Nam arcu nibh, faucibus vestibulum posuere sed, fermentum non nibh. Nulla nibh nunc, ornare quis dapibus sit amet, egestas at orci. Etiam pellentesque imperdiet sapien, eget vestibulum arcu facilisis eu.
            </a>
            <br>
            <a>
                &emsp; Etiam lacinia faucibus molestie. Donec condimentum aliquam elit vel iaculis. Nullam faucibus urna tortor, at posuere elit dapibus in. Nam quis ornare tortor, vitae porttitor dui. Nunc leo augue, accumsan id condimentum non, venenatis ac felis. Cras nec nisi massa. Phasellus consequat egestas commodo. Nulla malesuada urna gravida pulvinar hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse viverra, nulla nec pretium varius, turpis massa ornare dolor, id dapibus ante erat id tortor. Duis commodo nisl vitae tortor fringilla pellentesque.
            </a>
        </div>
    </div>
    
</x-layout>