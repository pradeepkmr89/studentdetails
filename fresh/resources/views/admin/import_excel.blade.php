@extends('admin.layout.base')
@section('title', 'Import Question')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
<div id="main-content">
        <div class="container-fluid">
              <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-3 col-sm-12">
                        <h1>Import Questions</h1>
                       
                    </div>            
                    <div class="col-md-9 col-sm-12 text-right hidden-xs">
                        <a href="{{ asset('assets/csv/question_category.csv') }}" class="btn btn-sm btn-success mr-3" title=""><i class="icon-cloud-download"></i> Download Category List </a><a href="{{ asset('assets/csv/question.csv') }}" class="btn btn-sm btn-success mr-3" title=""><i class="icon-cloud-download"></i> Download Sample CSV </a>
                        <a href="{{url('admin/get/question')}}" class="btn btn-sm btn-primary" title=""><i class="icon-arrow-left"></i> Go Back</a>
                     </div>
                </div>
            </div>
            <div class="block-header">
                 @if( Session::has( 'success' ))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get( 'success' ) }}
                    </div> 
                @elseif( Session::has( 'warning' )) 
                 <div class="alert alert-danger" role="alert">
                    {{ Session::get( 'warning' ) }}
                    </div> 
                   
                @endif
               
                
               <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="row clearfix">
                 
                
                <div class="col-lg-12 col-md-12">
                    <div>
                        <label>Select CSV File</label>                                    
                        <div class="input-group">
                            <input type="file" name="file" class="dropify" required>
                         </div>
                    </div>
                    
                </div>
                 <div class="col-lg-12 col-md-12 mt-3">
                     <div class="">
                         <button class="btn btn-success btn-lg" type="submit" name="submit"><i class="icon-cloud-upload"></i> Import</button>
                    </div>
                </div>
            </div>
                 </form>         
             </div>
           
 
        </div>
    </div>
    
@endsection 
@push('scripts')
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>
<script src="{{ asset('html/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('html/assets/js/pages/forms/dropify.js') }}"></script>
 @endpush