@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Markaz</h1>
    
    <a href="{{ route('markazs.index') }}" class=" btn btn-sm btn-primary shadow-sm">
       Back</a>
</div>

<div >
    <form method="POST" action="{{ route('markazs.update', $markaz->id) }}" style="display:inline">
      @csrf
      @method('PUT')
      <div class="form-row  align-items-center">
        <div class="form-group col-md-6">
          <label for="name">Nama Markaz</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $markaz->name ) }}" required autocomplete="name" autofocus>

            @error('name')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="name">Negeri</label>
          <select id="state_id" class="form-control" name="state_id">
            <option>Choose...</option>

            @foreach ($states as $state)
              <option value="{{ $state->id }}"
                {{ $state->id == $markaz->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                >
                {{ $state->name }}</option>
            @endforeach
          </select>

            @error('state_id')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
      </div>
       
        <button type="submit" class="btn btn-primary">Update Markaz</button>
      </form>

    <form action="{{ route('markazs.destroy' , $markaz->id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete Markaz {{ $markaz->name }}</button>    
    </form>
</div>

@endsection