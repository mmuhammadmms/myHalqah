@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">People</h1>
    <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    <a href="{{ route('peoples.create') }}" class=" btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Create</a>
</div>
<div class="">
  @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Pengalaman</th>
        <th scope="col">No Tel</th>
        <th scope="col">Alamat</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach ($peoples as $people)
        <tr>
          <th scope="row">{{ $people->id }}</th>
          <td>{{ $people->name }}</td>
          <td>{{ $people->exp }}</td>
          <td>{{ $people->no_phone }}</td>
          <td>[ Mohalla {{ $people->mohalla->name }} ] - {{ $people->address }} </td>
          <td><a href="{{ route('peoples.edit' , $people->id) }}" class="btn btn-sm btn-primary shadow-sm">
           Edit</a></td>
        </tr>
        @endforeach
        
  
      
     
    </tbody>
  </table>
@endsection