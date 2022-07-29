<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>


<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center">Post</h3>

            @if(count($posts) > 0)
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
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
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{Str::limit($post->description, '15')}}</td>
                        <!-- // (?) Its called Ternary Operator -->
                        <td>{{$post->is_publish == '1' ? 'Yes' : 'No'}}</td>
                        <td>{{$post->is_active  == '1' ? 'Yes' : 'No'}}</td>
                        <td id="outer">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success inner"><i class="fa fa-eye"></i></a>
                            <a href="" class="btn btn-info inner"><i class="fa fa-edit"></i></a>
                            <form class="inner" action="">
                                @csrf
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
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
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script>
    $('#form').parsley();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>