@extends('admin.layout.base')
@section('title', 'CMS Pages ')
@section('styles')
@endsection
@section('content')
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>CMS Pages</h1>
                         
                    </div>            
                     
                </div>
            </div> 
        <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="body">
                            <div class="demo-masked-input">
                                 <form method="post" action="update/cms">
                                         @csrf
                                <div class="row clearfix"> 
                               <div class="col-lg-12 col-md-6">
                                    @if( Session::has( 'success' ))
                                    <div class="alert alert-success" role="alert">
                                      {{ Session::get( 'success' ) }}
                                    </div> 
                                @elseif( Session::has( 'warning' )) 
                                 <div class="alert alert-danger" role="alert">
                                    {{ Session::get( 'warning' ) }}
                                    </div> 
                                   
                                @endif
                               </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                        <b>Select Pages</b>
                                        <div class="input-group mb-3">
                                            <select id="cmspage" name="cmsid" class="form-control select">
                                                <option value="">Select CMS Pages</option>
                                                @foreach($content as $val)
                                                <option value="{{$val->id}}">{{$val->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                         <div class="mb-3"> 
                                             <textarea name="description" id="ckeditor" class="cmsdesc"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                         <div class="mb-3"> 
                                           <button class="btn btn-success" type="submit" name="submit">Update</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
         

        </div>
    </div>
@endsection
@push('scripts')
 <script>
     $("#cmspage").on('change', function(){
 
         var cmspage = $(this).val();
         if(cmspage>0){
          $.ajax({
                url: "getcontent",
                type: "post",
                data: {"_token":"{{ csrf_token() }}",cmsid:cmspage},
                success: function(d) {
                     CKEDITOR.instances['ckeditor'].setData(d[0]);

                   }
            });
         }else{
            CKEDITOR.instances['ckeditor'].setData('');  
         }
         
        });
 </script>
@endpush