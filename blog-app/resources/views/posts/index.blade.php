<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blogs
        </h2>


    </x-slot>

    <div class="container mt-5">
        <a class="btn btn-success" href="{{route('post.create')}}">Make a post!</a>
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Summary</th>
            <th>Published</th>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
                        </td>
                    <td>{{$post->summary}}</td>
                    <td>{{$post->published_at}}</td>
                    <td>
                        <form action="{{route('post.delete', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="page" value="{{$posts->currentPage()}}">
                            <input type="hidden" name="total" value="{{$posts->total()}}">
                            <input type="hidden" name="total" value="{{$posts->perPage()}}">
                            <button class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>
        <div>

            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>
