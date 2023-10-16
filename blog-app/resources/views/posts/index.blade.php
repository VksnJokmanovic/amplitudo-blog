<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
        <table>
            <thead>
               <th>Title</th>
               <th>Summary</th>
               <th>Published</th>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->summary}}</td>
                    <td>{{$post->published_at}}</td>
                </tr>

            @endforeach

            </tbody>

        </table>
        <div>



        </div>
    </x-slot>
</x-app-layout>
