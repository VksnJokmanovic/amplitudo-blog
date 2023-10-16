<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tighta">
            Blogs
        </h2>
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <th>
                        <a href="{{route('posts.show', $post->id)}}">Title</a>
                     </th>
                    <th>Summary</th>
                    <th>Content</th>

                </thead>
                <tbody>
                    @foreach ($posts as $post)
               <tr>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    {{$post->summary}}
                </td>
                <td>
                    {{$post->content}}
                </td>

                <td> </td>
               </tr>
                </tbody>
            </table>





            @endforeach
        </div>
    </x-slot>
</x-app-layout>
