@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Zones</h1>
    
    <a href="{{ route('zones.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('zones.update', $zone->id) }}" style="display:inline">
      @csrf
      @method('PUT')
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Zon</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $zone->name) }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
       
        <div class="form-group col-md-6">
          <label for="name">Markaz</label>
          <select id="markaz_id" class="form-control" name="markaz_id">
            <option selected>Choose...</option>
            @foreach ($markazs as $markaz)
              <option value="{{ $markaz->id }}"
                {{ $zone->markaz_id == $markaz->id ? 'selected' : '' }}>{{ $markaz->state->name }} - {{ $markaz->name }} </option>
            @endforeach
          </select>

            @error('markaz_id')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
      </div>
    </div>
       
        <button type="submit" class="btn btn-primary">Update Zon</button>
      </form>

    <form action="{{ route('zones.destroy' , $zone->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $zone->name }}</button>    
    </form>
</div>

@endsection