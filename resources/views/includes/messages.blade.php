@if(count($errors)>0)
  @foreach($errors->all() as $error)
    <div class="row">
      <div class="col-sm-12">
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" style="margin-top: 8px;" data-dismiss="alert">&times;</button>
  <strong>Error !</strong> {{$error}}
</div>
</div>
</div>


  @endforeach

  @endif

  @if(session('success'))
    <div class="row">
      <div class="col-sm-12">
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close"  style="margin-top: 8px;" data-dismiss="alert">&times;</button>
  {{session('success')}}
</div>
</div>
</div>


  @endif



   @if(session('error'))
    <div class="row">
      <div class="col-sm-12">
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" style="margin-top: 8px;" data-dismiss="alert">&times;</button>
  <strong>Error !</strong>   {{session('error')}}
</div>
</div>
</div>




  @endif
