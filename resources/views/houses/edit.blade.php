@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit House</h1>
    
    <a href="{{ route('houses.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('houses.update', $house->id) }}" style="display:inline">
      @csrf
      @method('PUT')
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Penghuni</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $house->name) }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
       
          <div class="form-group col-md-6">
            <label for="address">Alamat </label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address' , $house->address) }}" required autocomplete="address" autofocus>

              @error('address')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="name">Mohalla</label>
            <select id="mohalla_id" class="form-control" name="mohalla_id">
              <option selected>Choose...</option>
              @foreach ($mohallas as $mohalla)
                <option value="{{ $mohalla->id }}"
                  {{ $mohalla->id == $house->mohalla_id ? 'selected' : '' }}>Halqah {{ $mohalla->halqah->name }} - Mohalla {{ $mohalla->name }}</option>
              @endforeach
            </select>

              @error('mohalla_id')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
        </div>
   
       
        <button type="submit" class="btn btn-primary">Update House</button>
      </form>

    <form action="{{ route('houses.destroy' , $house->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $house->name }}</button>    
    </form>
</div>

@endsection