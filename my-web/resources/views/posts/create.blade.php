<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Post</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center"> Create Post</h3>
        <form style="margin-top: 35px">
  <div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="title">
</div>
<div class="mb-3">
    <label>Discription</label>
    <textarea class="form-control" placeholder="enter a somthing here..."></textarea>
</div>
<div class="mb-3">
    <label>Published</label>
    <select name="" class="form-control">
        <option disabled selected>Choose Option</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>
<div class="mb-3">
    <label>Active</label>
        <select name="" class="form-control">
        <option disabled selected>Choose Option</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>
</body>
</html>