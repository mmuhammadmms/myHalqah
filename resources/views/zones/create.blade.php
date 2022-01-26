@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Zones</h1>
    
    <a href="{{ route('peoples.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('zones.store') }}">
      @csrf
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Zon</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="name">Markaz</label>
            <select id="state_id" class="form-control" name="state_id">
              <option selected>Choose...</option>
              @foreach ($markazs as $markaz)
                <option value="{{ $markaz->id }}">{{ $markaz->state->name }} - {{ $markaz->name }}</option>
              @endforeach
            </select>

              @error('state_id')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
        </div>

        
       
        <button type="submit" class="btn btn-primary">Daftar Zone</button>
      </form>
</div>

@endsection