@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Products create</h6></div>
    <div class="card-body">
        <form action="#" method="POST">
            @csrf
            
            <div class="form-group"><label>Sku</label><input type="text" name="sku" class="form-control" value=""></div>
<div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" value=""></div>
<div class="form-group"><label>Stock</label><input type="number" name="stock" class="form-control" value=""></div>
<div class="form-group"><label>Price</label><input type="number" name="price" class="form-control" value=""></div>
<div class="form-group"><label>Category_id</label><select name="category_id" class="form-control select2-ajax" data-url="{{ config('app.url') }}/categories"></select></div>

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