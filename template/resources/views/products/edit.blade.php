@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Products edit</h6></div>
    <div class="card-body">
        <form action="{{ config('app.url') }}/products/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group"><label>Sku</label><input type="text" name="sku" class="form-control" value="{{ $data->sku ?? '' }}"></div>
<div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" value="{{ $data->name ?? '' }}"></div>
<div class="form-group"><label>Stock</label><input type="number" name="stock" class="form-control" value="{{ $data->stock ?? '' }}"></div>
<div class="form-group"><label>Price</label><input type="number" name="price" class="form-control" value="{{ $data->price ?? '' }}"></div>
<div class="form-group"><label>Category_id</label><select name="category_id" class="form-control select2-ajax" data-url="{{ config('app.url') }}/categories"><option value="{{ $data->category_id }}" selected>{{ $data->category->name ?? $data->category_id }}</option></select></div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2-ajax').each(function() {
        let url = $(this).data('url');
        $(this).select2({
            placeholder: 'Pilih data',
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return { q: params.term, type: 'select2' };
                },
                processResults: function(data) {
                    return { results: data.results };
                },
                cache: true
            }
        });
    });});
</script>

@endsection