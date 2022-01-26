@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit States</h1>
    
    <a href="{{ route('peoples.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('states.update', $state->id) }}" style="display:inline">
      @csrf
      @method('PUT')
        <div class="form-row  align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Nama Negeri</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}" required autocomplete="name" autofocus>

              @error('name')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
              @enderror
          </div>
        </div>
       
        <button type="submit" class="btn btn-primary">Update Negeri</button>
      </form>

    <form action="{{ route('states.destroy' , $state->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete {{ $state->name }}</button>    
    </form>
</div>

@endsection