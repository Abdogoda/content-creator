<!-- Modal -->
<div class="modal fade" id="editServiceWork-{{$work->id}}" tabindex="-1" aria-labelledby="editServiceWorkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{\LaravelLocalization::localizeURL('/admin/services/edit-work/'.$work->id)}}" method="post" enctype="multipart/form-data" id="edit-work">
     @csrf
     @method("PUT")
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceWorkLabel">{{__('services.edit_service_work')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <input type="hidden" name="id" value="{{$service->id}}">
       <div class="form-group mb-3">
        <label for="name_en">{{__('services.work_name')}} <small class="text-danger pl-2">*</small> <small class="text_muted">({{__('main.en')}})</small></label>
        <input type="text" name="name_en" id="name_en" value="{{$work->translate('en')->name}}" class="form-control" required>
        @error('name_en')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <div class="form-group mb-3">
        <label for="name_ar">{{__('services.work_name')}} <small class="text-danger pl-2">*</small> <small class="text_muted">({{__('main.ar')}})</small></label>
        <input type="text" name="name_ar" id="name_ar" value="{{$work->translate('ar')->name}}" class="form-control" required>
        @error('name_ar')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <div class="form-group mb-3">
        <label for="image_style">{{__('services.image_style')}} <small class="text-muted pl-2">(Will Replace The Existed)</small></label>
        <select  name="image_style" id="image_style" required class="form-control">
          <option value="small" {{$work->image_style == "small" ? "selected" : ""}}>{{__('services.small')}}</option>
          <option value="wide" {{$work->image_style == "wide" ? "selected" : ""}}>{{__('services.wide')}}</option>
          <option value="large" {{$work->image_style == "large" ? "selected" : ""}}>{{__('services.large')}}</option>
        </select>
        @error('image_style')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("main.close")}}</button>
        <button type="submit" class="btn btn-primary addwork">{{__('main.save_date')}}</button>
      </div>
    </div>
    </form>
  </div>
 </div>
