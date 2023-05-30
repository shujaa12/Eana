
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content radius-15">
      {!! Form::open(['action' => 'DonationsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

      <div class="modal-header">
        <button type="button" class="close pull-right" style="margin-left: 5px;margin-top: 5px;" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><a id="title1"></a></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <input  type="hidden" class="form-control" id="id" name="id" value="{{old('id')}}">

          <div class="col-sm-12">
            <div class="form-group">
               <label for="nameProduct">اسم المنتج</label>
               <input type="text"  class="form-control" id="nameProduct" name="nameProduct"   value="{{ old('nameProduct') }}">
              </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                   <label for="details">المواصفات</label>
                   <textarea class="form-control" id="details" name="details" rows="2">{{ old('details') }}</textarea>
                </div>
                </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                         <label for="note">ملاحظات</label>
                         <textarea class="form-control" id="note" name="note" rows="2">{{ old('note') }}</textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                            <label style="width: 100%;">الصورة</label>

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="input-group input-large">
                                    <div class="form-control uneditable-input input-fixed input-medium"
                                        data-trigger="fileinput">
                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                        <span class="fileinput-filename"> </span>
                                    </div>
                                    <span class="input-group-addon btn default btn-file">
                                        <span class="fileinput-new"> اختر الملف </span>
                                        <span class="fileinput-exists"> تغيير </span>
                                        <input type="file" id="file" name="file"> </span>
                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists"
                                        data-dismiss="fileinput"> حذف </a>
                                </div>
                            </div>

                        </div>
                    </div>
        </div>



        </div>

<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
  <button type="submit" class="btn btn-success" id="save">حفظ</button>
</div>

{!! Form::close() !!}
  </div>
</div>
</div>


