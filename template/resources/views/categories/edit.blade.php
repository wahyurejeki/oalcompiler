@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Categories edit</h6></div>
    <div class="card-body">
        <form action="{{ config('app.url') }}/categories/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $data->name ?? '' }}"></div>
<div class="form-group"><label>Description</label><textarea name="description" class="form-control">{{ $data->description ?? '' }}</textarea></div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection