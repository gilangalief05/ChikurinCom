<x-layout>
    <x-slot:title>Search - {{$search}}</x-slot:title>
    <div class="container mx-auto my-4">
        <h4>Cari: {{$search}}</h4>
        <div class="grid m-2">
        @foreach ($items as $item)
            <x-itemcontainer :$item></x-itemcontainer>
        @endforeach
        </div>
    </div>
</x-layout>