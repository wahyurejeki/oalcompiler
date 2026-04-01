@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Shipments list</h1>
    <a href="#" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="shipments-list-datatable" width="100%" cellspacing="0">
                <thead><tr><th>No</th>
<th>Order</th>
<th>Tracking_number</th>
<th>Courier_name</th>
<th>Shipping_status</th>
<th>Aksi</th></tr></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let table = $('#shipments-list-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
{ data: 'order_name', name: 'order_name', className: 'text-center' },
{ data: 'tracking_number', name: 'tracking_number', className: 'text-center' },
{ data: 'courier_name', name: 'courier_name', className: 'text-center' },
{ data: 'shipping_status', name: 'shipping_status', className: 'text-center' },
{
    data: 'action',
    name: 'action',
    className: 'text-center',
    orderable: false,
    searchable: false,
    render: function(data, type, row) {
        let urlShow = `{{ config('app.url') }}/shipments/${row.id}`;
        let urlEdit = `{{ config('app.url') }}/shipments/${row.id}/edit`;
        let urlDelete = `{{ config('app.url') }}/shipments/${row.id}`;
        return `
            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="navbar-nav px-3">
                        <li><a href="${urlShow}" class="dropdown-item">Detail</a></li>
                        <li><a href="${urlEdit}" class="dropdown-item">Edit</a></li>
                        <li><a href="javascript:void(0);" class="dropdown-item text-danger js-delete" data-id="${row.id}" data-url="${urlDelete}">Hapus</a></li>
                    </ul>
                </div>
            </div>`;
    }
}
        ]
    });

    $(document).on('click', '.js-delete', function() {
        let id = $(this).data('id');
        let url = $(this).data('url');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    });
});
</script>
@endsection