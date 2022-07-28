<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script></head>
<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center"> Create Post</h3>
<!-- /resources/views/post/create.blade.php -->

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

   

<!-- Create Post Form -->
@if (Session::has('alert-success'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{ session::get('alert-success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
            <form method="post" action="{{ route('posts.store')}}" style="margin-top: 35px"  id="form">
<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title"  class="form-control" placeholder="title" value="{{ old('title') }}">
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea class="form-control"  name="description" placeholder="enter a somthing here...">{{ old('description') }}</textarea>
</div>
<div class="mb-3">
    <label>Published</label>
    <select name="is_publish"  class="form-control">
        <option value="" disabled selected>Choose Option</option>
        <option @if( old('is_publish') == 1) selected @endif value="1">Yes</option>
        <option @if( old('is_publish') == 0) selected @endif value="0">No</option>
    </select>
</div>
<div class="mb-3">
    <label>Active</label>
        <select name="is_active"  class="form-control">
        <option value="" disabled selected>Choose Option</option>
        <option @if( old('is_active') == 1) selected @endif value="1">Yes</option>
        <option @if( old('is_active') == 0) selected @endif value="0">No</option>
    </select>
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
<script>
     $('#form').parsley();
</script>
</body>
</html>