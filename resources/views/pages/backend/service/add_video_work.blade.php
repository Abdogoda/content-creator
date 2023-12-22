<!-- Modal -->
<div class="modal fade" id="addServiceVideoWork" tabindex="-1" aria-labelledby="addServiceWorkVideoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{\LaravelLocalization::localizeURL('/admin/services/add-work')}}" method="post" enctype="multipart/form-data" id="add-work">
     @csrf
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addServiceWorkVideoLabel">{{__('services.add_video')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <input type="hidden" name="id" value="{{$service->id}}">
       <input type="hidden" name="attachment_type" value="video">
       <div class="form-group mb-3">
        <label for="name_en">{{__('services.work_name')}} <small class="text-danger pl-2">*</small> <small class="text_muted">({{__('main.en')}})</small></label>
        <input type="text" name="name_en" id="name_en" value="{{old('name_en')}}" class="form-control" required>
        @error('name_en')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <div class="form-group mb-3">
        <label for="name_ar">{{__('services.work_name')}} <small class="text-danger pl-2">*</small> <small class="text_muted">({{__('main.ar')}})</small></label>
        <input type="text" name="name_ar" id="name_ar" value="{{old('name_ar')}}" class="form-control" required>
        @error('name_ar')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <div class="form-group mb-3">
        <label for="image_style">{{__('services.image_style')}} <small class="text-danger pl-2">*</small></label>
        <select  name="image_style" id="image_style" required class="form-control">
          <option value="small">{{__('services.small')}}</option>
          <option value="wide" selected>{{__('services.wide')}}</option>
          <option value="large">{{__('services.large')}}</option>
        </select>
        @error('image_style')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
        <div class="form-group mb-3">
          <label for="video">{{__('services.video')}} <small class="text-danger pl-2">*</small></label>
          <input type="file" name="video" id="video" accept="video/*" class="filepond" required>
          @error('video')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
         <div class="form-group mb-3">
          <label for="thumbnail">{{__('services.video_thumbnail')}} <small class="text-danger pl-2">*</small></label>
          <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required class="form-control">
          @error('thumbnail')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('main.close')}}</button>
        <button type="submit" class="btn btn-primary addwork">{{__('main.save_date')}}</button>
      </div>
    </div>
    </form>
  </div>
 </div>
