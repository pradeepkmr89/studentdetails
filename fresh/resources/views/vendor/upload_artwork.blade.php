@extends('layouts.vendor.base')

@section('title', 'Dashboard ')

@section('styles')
 @endsection

@section('content')
 <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Upload Artwork</h4>
                    </div>
                    <div class="col-sm-6">
                         
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @include('layouts.formres')                       
                            <form method="post" action="{{url('user/upload/artwork')}}" enctype="multipart/form-data"> 
                                @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-20">
                                         
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="product_name" placeholder="" class="form-control" value="{{ old('product_name') }}" required> 
                                </div> 
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="elm1" class="form-control" name="description">{{old('product_name') }}</textarea>  
                                </div> 
                                    </div>
                                </div>
                               

                                <div class="col-lg-6">
                                    <div class="p-20"> 
                                        <div class="form-group">
                                        <label>Images</label> 
                                    <input type='file'  class="form-control"  name="image" >
                                    </div>
                                   

                                    </div>
                                </div> <!-- end col -->
                                <button type="submit" class="btn btn-success ml-3" name="submit"> Add Artwork</button>

                            </div> <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row --> 

        </div>     

    @endsection

@section('scripts') 


@endsection

@push('scripts') 

  
 <script>
$(document).ready(function () {
if($("#elm1").length > 0){
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    height:300,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
    style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
});
}
});
        </script>
@endpush