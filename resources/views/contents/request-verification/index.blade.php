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
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Toko</th>
                            <th>Licenses</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="btnLicenses">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Licenses</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid card-body-image" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
            ajax: "{{ route('request-verification.datatable') }}",
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
                    return data  = `<a href="javascript:void(0)" data-url="{{ asset('') }}${data}" class="license-image-link">
                                        <img class="img-thumbnail wd-75p wd-sm-75" src="{{ asset('') }}${data}" height="50" width="50">
                                    </a>
                                    `;

                    console.log(data);
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    if (full.user.status_user.name === 'verification process') {
                        return '<span class="btn btn-warning">Verification Process</span>';
                    } else if (full.user.status_user.name === 'verified') {
                        return '<span class="btn btn-success">verified</span>';
                    } else {
                        return '<span class="btn btn-danger">unverified</span>';
                    }

                },
            },
            {
                targets: 4,
                    render: function(data, type, full, meta) {
                        let status = full.user.status_user.name;

                        let verifiedOption = `<a href="javascript:void(0)" data-id="${full.id}" class="btn btn-md btn-success modal-effect btn-set-verification" data-bs-effect="effect-super-scaled" data-name="verified">Set Verified <span class="fe fe-check"></span></a>`;
                        let unverifiedOption = `<a href="javascript:void(0)" data-id="${full.id}" class="btn btn-md btn-danger modal-effect btn-set-verification" data-bs-effect="effect-super-scaled" data-name="unverified">Set Unverified <span class="fe fe-check"></span></a>`;

                        let options = '';

                        if (status === 'verification process') {
                            options = `${unverifiedOption} ${verifiedOption}`;
                        } else if (status === 'verified') {
                            options = `${unverifiedOption}`;
                        } else {
                            options = `${verifiedOption}`;
                        }

                        return `<div class="btn-list">${options}</div>`;
                    },

            },],
            columns: [
                { data: null },
                { data: 'user.username'},
                { data: 'licenses'},
                { data: 'user.status_user.name'},
                { data: 'id' }, 

                
            ]
            });

            $(document).on('click', '.license-image-link', function() {
                let imageUrl = $(this).data('url');
                $('.modal-body .img-fluid').attr('src', imageUrl);
                $('#btnLicenses').modal('show');
            });

            $('body').on('click', '.btn-set-verification', function() {
                    let user_apotech_id = $(this).data('id');
                    // console.log(user_apotech_id);
                    let status_name = $(this).data('name');
                    let title;
                    let btnConf;
                    if(status_name === 'verified')
                    {
                        title = 'Yakin ingin set verified data ini?';
                        btnConf = 'Ya, Set Verified!';
                        message = 'Data berhasil di verified!';
                    }else if(status_name === 'verification process')
                    {
                        title = 'Yakin ingin set verification process data ini?';
                        btnConf = 'Ya, Set Verification Process!';
                        message = 'Data berhasil di verification process!';
                    }else{
                        title = 'Yakin ingin set unverified data ini?';
                        btnConf = 'Ya, Set Unverified!';
                        message = 'Data berhasil di unverified!';
                    }

                    Swal.fire({
                        title: title,
                        // text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: btnConf
                    }).then((result) => {
                        if (result.value) {

                            $.ajax({
                                url: '{{ route('request-verification.set-verification') }}',
                                type: "post",
                                data: {
                                    user_apotech_id,
                                    status_name
                                },
                                dataType: "JSON",
                                success: function(data) {
                                    table.ajax.reload();
                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            })
                        }
                    })
                })




            $('#modal_form').on('hidden.bs.modal', function() {
                    let id = $('#form #id').val('');

                    $('#form')[0].reset();
                })

        })
</script>
@endsection