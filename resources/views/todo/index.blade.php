@extends('base')

@section('title')
<title>Todo</title>
@endsection

@section('content')
<div class="container text-center">
    <br>
    <h1>Todo List</h1>
    <br>
    <a href="/createtodo" class="btn btn-primary">Create Todo</a>
    <br>
    <br>
        <table class="table table-hover">
           <thead>
             <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delelte</th>
             </tr>
           </thead>
           <tbody>
                @foreach ($item as $item)
                <tr>
                 <td>{{ $item['title'] }}</td>
                 <td>{{ $item['status'] }}</td>
                 <td><a href="/edittodo/{{ $item['id'] }}" class="btn btn-success">Update</a></td>
                 <td><a href="/deletetodo/{{ $item['id'] }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
           </tbody>
        </table>
</div>
@endsection
