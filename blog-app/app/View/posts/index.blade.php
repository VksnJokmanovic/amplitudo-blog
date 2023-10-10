<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tighta">
            Blogs
        </h2>
        <div>
            @foreach ($posts as $post)
                <p>
                    {{$post->title}}
                </p>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
