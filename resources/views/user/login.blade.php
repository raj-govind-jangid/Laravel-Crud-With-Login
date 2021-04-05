@extends('base')

@section('title')
<title>Login</title>
@endsection

@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm-6 mx-auto">
          <br>
          <h1 class="text-center">Login</h1>
          <br>
          <div>
            @if($fail)
            <div class="alert alert-danger alert-dismissible" id="idfail">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ $fail }}</strong>
            </div>
            @endif
        </div>
        <form action="/loginuser" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

      </div>
  </div>
</div>
@endsection
