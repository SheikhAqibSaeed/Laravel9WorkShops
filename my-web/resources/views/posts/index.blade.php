<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <style>
    #outer
    {
    width: 100%;
    text-align: center;
    }
    .inner
    {
    display: inline-block;
    }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center">Post</h3>
            <a href="{{ route('posts.create') }}" class="btn btn-info mb-3">Add Post</a>
            @if(count($posts) > 0)
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Image</th>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Active</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ $post->image->name }}" style="width: 50px"></td>
                        <td>{{$post->id}}</td>
                        <td>{{Str::limit($post->title, '4')}}</td>
                        <td>{{Str::limit($post->description, '15')}}</td>
                        <!-- // (?) Its called Ternary Operator -->
                        <td>{{$post->is_publish == '1' ? 'Yes' : 'No'}}</td>
                        <td>{{$post->is_active  == '1' ? 'Yes' : 'No'}}</td>
                        <td id="outer">
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-success inner"><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-info inner"><i
                                    class="fa fa-edit"></i></a>
                            <form method="post" class="inner" action="{{ route('posts.destroy', $post->slug)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            @if ($post->trashed())  <!--Its means that show all Trashed and Not Trashed-->
                            <a href="{{ route('posts.soft-delete', $post->id) }}" class="btn btn-warning inner"><i class="fa fa-undo"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h3 class="text-center text-warning mt-5">Page Not Found</h3>
            @endif

            <!-- Pagination -->
            <!-- {{ $posts->render() }} -->
            {{ $posts->links() }}
        </div>

        <!-- {{-- <a href="{{ route('test.1') }}" class="btn btn-info">go</a> --}} -->

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script>
    $('#form').parsley();
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
   <script>
       $('#form').parsley();
   </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

   <script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
   <script>
        @if (Session::has('alert-success'))
            toastr["success"]("{{ Session::get('alert-success') }}");
        @endif

        @if (Session::has('alert-info'))
            toastr["info"]("{{ Session::get('alert-info') }}");
        @endif

        @if (Session::has('alert-danger'))
            toastr["success"]("{{ Session::get('alert-danger') }}");
        @endif

        @if (Session::has('alert-message'))
            toastr["info"]("{{ Session::get('alert-message') }}");
        @endif


    </script>
</body>

</html>
