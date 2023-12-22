<!-- Modal -->
<div class="modal fade" id="editServiceFeatures-{{$key}}" tabindex="-1" aria-labelledby="editServiceFeaturesLabel-{{$key}}" aria-hidden="true">
 <div class="modal-dialog">
   <form action="{{\LaravelLocalization::localizeURL('/admin/services/update-feature')}}" method="post" enctype="multipart/form-data" id="add-work">
    @csrf
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="editServiceFeaturesLabel-{{$key}}">{{__('services.edit_service_feature')}}</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <input type="hidden" name="id" value="{{$paragraph->id}}">
      <div class="form-group mb-3">
       <label for="feature_en">{{__('services.feature_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label><br>
       <textarea name="feature_en" id="feature_en" value="{{$paragraph->translate('en')->text}}" class="form-control">{{$paragraph->translate('en')->text}}</textarea>
       @error('feature_en')
         <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="feature_ar">{{__('services.feature_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label><br>
       <textarea name="feature_ar" id="feature_ar" value="{{$paragraph->translate('ar')->text}}" class="form-control">{{$paragraph->translate('ar')->text}}</textarea>
       @error('feature_ar')
         <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('main.close')}}</button>
       <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
     </div>
   </div>
   </form>
 </div>
</div>
