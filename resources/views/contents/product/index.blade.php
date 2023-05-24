@extends('layout.main')

@section('title', 'Dashboard')

@section('css')

@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Product</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Product</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('product.create') }}" class="btn btn-primary mb-4 data-table-btn"><i class="fa fa-plus"></i> Product</a>
                    <table id="datatable" class="border-top-0  table table-bordered border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Stock</th>
                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Is Prescription</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<!-- DATA TABLE JS-->
<script src="{{ asset('virtual/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>
<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('product.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            },
            {
                targets: 2,
                    render: function(data, type, full, meta) {
                        let cat = '';
                            cat = `<a class="badge bg-primary me-1" href="javascript:void(0);">${data}</a>`;

                        return (cat);
                }, 
            },
            {
                targets: 4, // Menggunakan indeks 3 untuk kolom keempat (indeks dimulai dari 0)
                createdCell: function(td, cellData, rowData, row, col) {
                    if (col === 4) {
                        let price = parseInt(cellData).toLocaleString('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        });
                        $(td).text(price);
                    }
                }
            },
            {
                targets: 5,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 150) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 150) + '...')
                    }
                },
                
            },
            {
                    targets: 6,
                    width: 150,
                    render: function(data, type, full, meta) {
                        
                        let state = ``;
                        // data.map(function(item){
                            // state += `<a class="btn btn-icon btn-success me-1" href="javascript:void(0);"></a>`;
                            if(data == 1){
                                state = `<a class="badge bg-danger me-1" href="javascript:void(0);">Is Prescription</a>`;
                            }else{
                                state = `<a class="badge bg-success me-1" href="javascript:void(0);">Not Prescription</a>`;
                            }

                        return state;
                    },
                },
            {
                targets: -1,
                render: function(data, type, full, meta) {

                    let role = `{{ getRoleName() }}`;
                    
                    let state = ``;
                    if(role == 'seller'){
                        state = `<button type="button" data-id="${data}" data-update="1" class="btn btn-icon btn-warning btn-prescription" title="Is Prescription"><span class="fe fe-check"> </span></button>`;
                        
                        if(!!+full.is_need_prescription)
                            state = `<button type="button" data-id="${data}" data-update="0" class="btn btn-icon btn-success btn-prescription" title="Not Prescription"><span class="fe fe-x-circle"> </span></button>`;
                    }

                    let btn = `
                    <div class="btn-list">
                        ${state}
                        <a href="{{ route('product.edit', ':id') }}" class="btn btn-icon btn-primary"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-icon btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;

                    btn = btn.replace(':id', data);

                    return btn;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'category.name'},
                { data: 'stock'},
                { data: 'price'},
                { data: 'description'},
                { data: 'is_need_prescription'},
                { data: 'id'}, 
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    
        $(document).on('click', '.btn-prescription', function(){
            let id = $(this).data('id')
            let state = $(this).data('update')

            Swal.fire({
                title: "Yakin ingin mengupdate status data ini?",
                text: "Anda bisa merubah status prescription data ini kapanpun.",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url    : `{{ route('product.is-prescription') }}`,
                        type   : "POST",
                        data: { 
                            "id": id,
                            "state": state,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            table.ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil diupdate',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                }
            })
        })
    })

    function destroy(id) {
        var url = "{{ route('product.destroy',":id") }}";
        url = url.replace(':id', id);
    
        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
            icon: "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Hapus!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: { "id":id },
                    dataType: "JSON",
                    success: function(data) {
                        table.ajax.reload();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            }
        })
    } 
    </script>
@endsection