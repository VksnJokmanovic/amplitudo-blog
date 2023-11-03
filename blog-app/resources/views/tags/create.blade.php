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
            New Tag
        </h2>
    </x-slot>

    <div class="container mt-5">
        <a class="btn btn-dark mb-5" href="{{back()->getTargetUrl()}}">Back</a>
        <form method="POST" action="{{route('tags.store')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
                @error('content')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <input type="text" name="content" class="form-control">
                @error('content')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</x-app-layout>