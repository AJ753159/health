<!-- <?php
   // echo Form::open(array('url' => 'foo/bar'));
   //    echo Form::text('username','Username');
   //    echo '<br/>';
      
   //    echo Form::text('email', 'example@gmail.com');
   //    echo '<br/>';

   //    echo Form::password('password');
   //    echo '<br/>';
      
   //    echo Form::checkbox('name', 'value');
   //    echo '<br/>';
      
   //    echo Form::radio('name', 'value');
   //    echo '<br/>';
      
   //    echo Form::file('image');
   //    echo '<br/>';
      
   //    echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
   //    echo '<br/>';
      
   //    echo Form::submit('Click Me!');
   // echo Form::close();
?> -->
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Laravel 8 - Add Blog Post Form Example
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>
<!-- helloworld -->