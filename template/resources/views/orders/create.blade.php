@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Orders create</h6></div>
    <div class="card-body">
        <form action="#" method="POST">
            @csrf
            
            <div class="form-group"><label>Customer_id</label><select name="customer_id" class="form-control select2-ajax" data-url="{{ config('app.url') }}/customers"></select></div>
<div class="form-group"><label>Order_date</label><input type="text" name="order_date" class="form-control datepicker" value="" autocomplete="off"></div>
<div class="form-group"><label>Total_amount</label><input type="number" name="total_amount" class="form-control" value=""></div>
<div class="form-group"><label>Status</label><input type="text" name="status" class="form-control" value=""></div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.datepicker').datepicker({ format: 'yyyy-mm-dd', autoclose: true, todayHighlight: true });
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