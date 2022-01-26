@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Halqah</h1>
    
    <a href="{{ route('peoples.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('halqahs.store') }}">
      @csrf
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Halqah</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="name">Zone</label>
            <select id="zone_id" class="form-control" name="zone_id">
              <option selected>Choose...</option>
              @foreach ($zones as $zone)
                <option value="{{ $zone->id }}">Markaz {{ $zone->markaz->name }} - Zon {{ $zone->name }}</option>
              @endforeach
            </select>

              @error('zone_id')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
        </div>

        
       
        <button type="submit" class="btn btn-primary">Daftar Halqah</button>
      </form>
</div>

@endsection