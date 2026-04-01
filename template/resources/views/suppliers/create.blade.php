@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Suppliers create</h6></div>
    <div class="card-body">
        <form action="#" method="POST">
            @csrf
            
            <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" value=""></div>
<div class="form-group"><label>Contact_person</label><input type="text" name="contact_person" class="form-control" value=""></div>
<div class="form-group"><label>Phone</label><input type="text" name="phone" class="form-control" value=""></div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection