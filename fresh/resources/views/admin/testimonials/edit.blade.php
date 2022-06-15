@extends('admin.layout.base')
@section('title', 'Testimonial Edit ')
 
@push('styles') 

@endpush
 
 @section('content')
<!-- Start content -->
<div class="content">
<div class="container-fluid">
<div class="page-title-box">
<div class="row align-items-center">
<div class="col-sm-12">
    <h4 class="page-title">Create Testimonial</h4>
   @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>  
     {{ session('success') }}
</div>
 
	@endif
	@if (session('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>  
     {{ session('warning') }}
</div>
 
	@endif
</div>
 
</div> <!-- end row -->
</div>
<!-- end page-title -->

<div class="row">
<div class="col-12">
<div class="card m-b-30">
    <div class="card-body">

         <form method="post" action="{{url('admin/testimonial/update')}}" enctype="multipart/form-data"> 
         	@csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="p-20">
                    <form action="#">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="" class="form-control" value="{{old('name') ?? $data->name }}" required> 
                            <input type="hidden" name="id" value="{{$data->id}}">
                        </div>
                        
                        
 
                </div>
            </div>
 
             <div class="col-lg-12">
                <div class="p-20"> 
			    <div class="form-group">
		        <label>Description</label>
		         <textarea id="elm1" name="description">{{old('description') ?? $data->description }}"</textarea>
		    	</div>
		    </div>
    	</div>
      
        </div> <!-- end row -->
         <div class="text-center m-t-15">
        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Update testimonial </button>
    </div>
</form> 
    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row --> 



</div>
<!-- container-fluid -->

</div>
<!-- content -->

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