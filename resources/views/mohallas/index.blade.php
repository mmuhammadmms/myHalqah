@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mohalla</h1>
    <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    <a href="{{ route('mohallas.create') }}" class=" btn btn-sm btn-primary shadow-sm">
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
        <th scope="col">Mohalla</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach ($mohallas as $mohalla)
        <tr>
          <th scope="row">{{ $mohalla->id }}</th>
          <td>[ Halqah {{ $mohalla->halqah->name }} ] {{ $mohalla->name }}</td>
          <td><a href="{{ route('mohallas.edit' , $mohalla->id) }}" class=" btn btn-sm btn-primary shadow-sm">
           Edit</a></td>
        </tr>
        @endforeach
        
  
      
     
    </tbody>
  </table>
@endsection