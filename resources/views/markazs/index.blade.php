@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Markaz</h1>
    <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    <a href="{{ route('markazs.create') }}" class=" btn btn-sm btn-primary shadow-sm">
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
        <th scope="col">Nama Markaz</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach ($markazs as $markaz)
        <tr>
          <th scope="row">{{ $markaz->id }}</th>
          <td>{{ $markaz->state->name }} - {{ $markaz->name }}</td>
          <td><a href="{{ route('markazs.edit' , $markaz->id) }}" class=" btn btn-sm btn-primary shadow-sm">
           Edit</a></td>
        </tr>
        @endforeach
        
  
      
     
    </tbody>
  </table>
@endsection