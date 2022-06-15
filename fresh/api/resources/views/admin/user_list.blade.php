@extends('admin.layout.base')
@section('title', 'User List ')
@section('styles')
@endsection
@section('content')
<div id="main-content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
               <h1>User List</h1>
            </div>
         </div>
      </div>
      <div class="row clearfix">
         <div class="col-lg-12">
            <div class="card">
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                           <tr>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Image</th>
                              <th>Date of Birth</th>
                              <th>Gender</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Image</th>
                              <th>Date of Birth</th>
                              <th>Gender</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach($users as $user) 
                           <tr>
                              <td>{{$user->full_name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->user_phone}}</td>
                              <td><img src="{{ url('storage/'.$user->image) }}" alt="" title="" /> </td>
                              <td>{{$user->user_dob}}</td>
                              <td>{{$user->user_gender}}</td>
                              <td>
                                <a href="javascript:void(0);" class="viewtrans" data-id="{{$user->id}}">View Transaction</a>
                                    
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <!-- larg modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table" id="showdata">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Amount</th>
      <th scope="col">Valid Days for</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
 <script>
     $(".viewtrans").on('click', function(){
        
         var user_id = $(this).data("id");
         var sno = '';
         
          if(user_id>0){
          $.ajax({
                url: "{{url('admin/get/user/transaction')}}",
                type: "post",
                dataType: "json",
                data: {"_token":"{{ csrf_token() }}",user_id:user_id},
                success: function(data) {
                var len = data.length;
                var txt = "";
                if(len > 0){
                    $('.bd-example-modal-lg').modal('show');
                    for(var i=0;i<len;i++){ 
                        var today =  new Date(data[i].created_at);
                        var dd = today.getDate();
                        var mm = today.getMonth(); 
                        var yy = today.getFullYear();
                        var fdate = dd+'-'+mm+'-'+yy;
                        sno = Number(i) + 1;
                    txt = "<tr><td>"+sno+"</td><td>"+data[i].amount+"</td><td>"+data[i].valid_days_for+"</td><td>"+fdate+"</td></tr>";
                    $("#showdata tbody").append(txt);
                    } 
 
                   }
                   else{
                     alert("No data found!");  
                   }
 
                   }
            });
         }else{
          }
         
        });
 </script>
@endpush