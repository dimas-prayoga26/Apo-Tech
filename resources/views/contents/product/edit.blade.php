@extends('layout.main')

@section('title', 'Edit Product')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Product</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $product->id }}">
                    <div class="form-group">
                        <label class="form-label text-dark">Nama Product</label>
                        <input type="name" name="name" class="form-control" value="{{ old('name') ?? $product->name}}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Price</label>
                        <input type="price" name="price" class="form-control" value="{{ old('price') ?? $product->price}}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Stock</label>
                        <input type="stock" name="stock" class="form-control" value="{{ old('stock') ?? $product->stock}}" required>
                    </div>
                    <label class="form-label text-dark">Product Image</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Add Image Product Upload</button>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row justify-content-center" id="initiator">
                            <div class="row" id="initiator">
                                @foreach ($product->images as $item)
                                <div class="col-3">
                                    <div>
                                        <input id="file-upload" class="dropify" type="file" name="product_image[]" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($item->image) }}"/>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <small class="text-danger">Tidak boleh ada column image yang kosong!</small>
                    </div>
                    {{-- @dd($product->category->name) --}}
                    <div class="form-group">
                        <label class="form-label text-dark">Category</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->category->id ? 'selected' : ''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Description</label>
                        <textarea id="summernote" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="custom-control form-checkbox custom-control-md">
                            <input type="checkbox" class="custom-control-input" name="is_need_prescription" {{ $product->is_need_prescription ? 'checked' : '' }}>
                            <span class="custom-control-label custom-control-label-md  tx-17">Is Need Prescription</span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save</button>
                    <a class="btn btn-primary float-end my-2" style="margin-right:10px;" href="{{ route('product.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('virtual/assets/js/select2.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<!--Internal File Upload js-->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>


<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<!--- Datepicker js --->
<script src="{{ asset('virtual/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<script src="{{ asset('virtual/assets/js/form-elements.js') }}"></script>

<script>
    $(document).ready(function () {
        
        $('.dropify').dropify();
        $('#summernote').summernote();

        // let data;

        ajaxSelect2Initiator('category', false, `{{ route('product-category.select2') }}`);

        // console.log(data);

        $('#btn-add-upload').on('click', function(e) {
            $('#initiator').append(`
                <div class="col-3">
                    <input class="dropify" type="file" name="product_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                </div>
            `);

            $('.dropify').dropify();
        })


        $('#btn-submit').on('click', function(e) {
            e.preventDefault();

            if($('#summernote').summernote('isEmpty'))  toast('Product description cannot be null!');
            else $('#form').submit();
        })

    });
</script>
@endsection