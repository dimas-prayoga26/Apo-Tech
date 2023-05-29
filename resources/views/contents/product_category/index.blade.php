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
                <li class="breadcrumb-item active" aria-current="page"> Product Category</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Product Category</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary modal-effect mb-3 data-table-btn ms-4" data-bs-effect="effect-super-scaled" onclick="create()">
                    <span class="fe fe-plus"> </span>Add new data
                </a>
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th class="border-bottom-0" style="width: 5%">No</th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Image</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add new data</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form id="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            {{-- <label for="id" class="form-label text-dark">Name</label> --}}
                            <input type="hiden" id="id" name="id">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" name="name" class="form-control" value="" id="name" required>
                            <label class="form-label text-dark">Image</label>
                            <div>
                                <input id="image" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="" data-allowed-file-extensions="jpeg jpg png webp svg" required />
                                <small class="text-danger">recomended image svg, 1200x600</small> 
                            </div>

                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button  id="btnSave" class="btn btn-primary">Simpan</button>
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

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script>

    var $table;

    $(document).ready(function() {
    // Contoh Inisiator datatable severside
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('product-category.datatable') }}",
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
                    return data  = `<img class="img-thumbnail wd-100p wd-sm-100" src="{{ asset('') }}${data}">`;
                }
            },
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return `
                    <div class="btn-list">
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-md btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-md btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;
                },
            },],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'image'},
                { data: 'id'}, 
            ]
        });

        $('#btnSave').on('click', function () {
                submit();
            })
            
            $('#form').on('submit', function(e){
                e.preventDefault();

                submit();
            })
        });

        function create(){
            submit_method = 'create';
            var df = "";
            df = $('#image').dropify();

            $('#form')[0].reset();

            $('#id').val('');
            // $('#modal_form')[0].reset();
            df = df.data('dropify');
            df.resetPreview();
            df.clearElement();

            $('#modal_form').modal('show');
            $('.modal-title').text('Add Data Product Category');
        }
        
        function edit(id){
            var df = "";
            df = $('#image').dropify();

            submit_method = 'edit';

            $('#form')[0].reset();

            var url = "{{ route('product-category.edit',":id") }}";
            url = url.replace(':id', id);
            
            $.get(url, function (response) {
                response = response.data;
                // console.log(response.image);
                
                $('#id').val(response.id);
                $('#name').val(response.name);

                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Data Roadmap');
                // $('#summernote').summernote('code', data.isi);
                df = df.data('dropify');
                df.resetPreview();
                df.clearElement();
                df.settings.defaultFile = `{{ asset('/') }}`+response.image;
                df.destroy();
                df.init();
            });
        }

        function submit() {

            var id = $('#id').val();
            var form = $('#form')[0];
            
            var formData = new FormData(form);
            
            // append the image file to FormData object
            var name = $('#name').val();
            var image = $('#image')[0].files[0];
            
            var url = "{{ route('product-category.store') }}";
        
            $('#btnSave').text('Menyimpan...');
            $('#btnSave').attr('disabled', true);

            if(submit_method == 'edit'){
                url = "{{ route('product-category.update',':id') }}";
                url = url.replace(':id', id);
                formData.append('_method', 'PUT');
            }

            $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if(data.status) {
                    $('#modal_form').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.ajax.reload();
                
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                }
                
                else{
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled',false); //set button enable 
                }
            }, 
            error: function(data) {
                var error_message = " ";
                error_message += " ";


                if (data.responseJSON && data.responseJSON.errors) {
                    $.each(data.responseJSON.errors, function(key, value) {
                    error_message += " " + value + " ";
                    });
                } else {
                    error_message = "Error occurred.";
                }

                error_message += " ";

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'ERROR !',
                    text: error_message,
                    showConfirmButton: false,
                    timer: 2000
                });

                $('#btnSave').text('Simpan');
                $('#btnSave').attr('disabled', false);
                }
            });
        }

        function destroy(id) {
            var url = "{{ route('product-category.destroy',":id") }}";
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