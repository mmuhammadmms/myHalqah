@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Halqah</h1>
    
    <a href="{{ route('halqahs.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('halqahs.update', $halqah->id) }}" style="display:inline">
      @csrf
      @method('PUT')
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Halqah</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $halqah->name) }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
       
        <div class="form-group col-md-6">
          <label for="name">Markaz</label>
          <select id="zone_id" class="form-control" name="zone_id">
            <option selected>Choose...</option>
            @foreach ($zones as $zone)
              <option value="{{ $zone->id }}"
                <option value="{{ $zone->id }}"
                  {{ $zone->id == $halqah->zone_id ? 'selected' : '' }}>Markaz {{ $zone->markaz->name }} - Zon {{ $zone->name }}</option>
            @endforeach
          </select>

            @error('zone_id')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
      </div>
   
       
        <button type="submit" class="btn btn-primary">Update Halqah</button>
      </form>

    <form action="{{ route('halqahs.destroy' , $halqah->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $halqah->name }}</button>    
    </form>
</div>

@endsection