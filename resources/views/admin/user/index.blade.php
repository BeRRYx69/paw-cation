@extends('admin.layouts.header')

@section('content')
<section id="services">
    <div class="container">

        <div class="row">


        <div class="col-md-12">

            <div  class="content-box-large">

<div class="row">
    <div class="col-lg-12 margin-tb">

        <form method="get" action="/admin/users/search">
            <div class="float-left my-2" style="margin-right:20px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

            <div class="float-left my-2">
                <input type="search" name="search" class="form-control" id="cari" aria-describedby="search" >
            </div>

        </form>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

            <table class="table table-bordered">
                <thead class="thead">
                <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th width="180px">Action</th>
            </thead>

                </tr>
                @foreach ($user as $users)
                <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->jenis_kelamin }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->alamat }}</td>
                <td>{{ $users->no_hp }}</td>
                <td>
                <form action="{{ route('admin.user.destroy', $users->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('admin.user.edit', $users->id) }}">Edit</a>
                  
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
                @endforeach
            </table>
            </div>
        </div>
        </div>
{{-- <div class="d-flex">
    {{ $buku->links() }}
</div> --}}
@endsection
