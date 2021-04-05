@extends('base')

@section('title')
<title>Todo</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <br>
            <h1 class="text-center">Create Todo</h1>
            <br>
            <div>
          </div>
          <form action="/savetodo" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Title</label>
                <input type="name" name="title" class="form-control" placeholder="Enter title" id="email">
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="check1">
                  <input type="radio" class="form-check-input" id="check1" name="status" value="Pending" checked>Pending
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="check2">
                  <input type="radio" class="form-check-input" id="check2" name="status" value="Complete">Complete
                </label>
              </div>
              <br>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
  </div>
@endsection
