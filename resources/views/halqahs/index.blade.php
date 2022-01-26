@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halqah</h1>
    <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    <a href="{{ route('halqahs.create') }}" class=" btn btn-sm btn-primary shadow-sm">
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
        <th scope="col">Halqah</th>
        <th scope="col">Manage</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach ($halqahs as $halqah)
        <tr>
          <th scope="row">{{ $halqah->id }}</th>
          <td>[Markaz {{ $halqah->zone->name }}] Zon {{ $halqah->zone->name }} - {{ $halqah->name }}</td>
          <td><a href="{{ route('halqahs.edit' , $halqah->id) }}" class=" btn btn-sm btn-primary shadow-sm">
           Edit</a></td>
        </tr>
        @endforeach
        
  
      
     
    </tbody>
  </table>
@endsection