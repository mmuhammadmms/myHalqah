@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit People</h1>
    
    <a href="{{ route('peoples.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
  <form method="POST" action="{{ route('peoples.update' , $people->id ) }}" style="display:inline" >
    @csrf
    @method('PUT')
      <div class="form-row  align-items-center">
        <div class="form-group col-md-6">
          <label for="name">Nama </label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $people->name ) }}" required autocomplete="name" autofocus>

            @error('name')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="address">Alamat </label>
          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address' , $people->address ) }}" required autocomplete="address" autofocus>

            @error('address')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="exp">Pengalaman </label>
          <select id="exp" class="form-control" name="exp">
            <option value="{{ $people->exp }}"selected>{{ $people->exp }}</option>
            <option value="4B BBNJ">4B BBNJ</option>
            <option value="4B IPB">4B IPB</option>
            <option value="4B DN">4B DN</option>
            <option value="40 H">40 H</option>
            <option value="3 H">3 H</option>
          </select>

            @error('exp')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="no_phone">No Tel </label>
          <input id="no_phone" type="text" class="form-control @error('no_phone') is-invalid @enderror" name="no_phone" value="{{ old('no_phone' , $people->no_phone ) }}"  autocomplete="no_phone" autofocus>

            @error('no_phone')
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
                {{ $mohalla->id == $people->mohalla_id ? 'selected' : '' }}>Halqah {{ $mohalla->halqah->name }} - Mohalla {{ $mohalla->name }}</option>
            @endforeach
          </select>

            @error('mohalla_id')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
      </div>

      
     
      <button type="submit" class="btn btn-primary">Update Orang</button>
    </form>
    <form action="{{ route('peoples.destroy' , $people->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $people->name }}</button>    
    </form>
</div>

@endsection