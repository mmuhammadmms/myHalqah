@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Mohalla</h1>
    
    <a href="{{ route('peoples.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('mohallas.store') }}">
      @csrf
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Mohalla</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="name">Halqah</label>
            <select id="halqah_id" class="form-control" name="halqah_id">
              <option selected>Choose...</option>
              @foreach ($halqahs as $halqah)
                <option value="{{ $halqah->id }}">Zon {{ $halqah->zone->name }} - Halqah {{ $halqah->name }}</option>
              @endforeach
            </select>

              @error('zone_id')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
        </div>

        
       
        <button type="submit" class="btn btn-primary">Daftar Mohalla</button>
      </form>
</div>

@endsection