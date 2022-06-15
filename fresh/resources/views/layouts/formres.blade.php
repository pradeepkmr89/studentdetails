@if(session()->has('success'))
<div class="alert alert-success"> 
 {{ session('success') }} 
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-danger"> 
 {{ session('warning') }} 
</div>
@endif