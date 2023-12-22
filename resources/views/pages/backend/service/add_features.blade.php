<!-- Modal -->
<div class="modal fade" id="addServiceFeatures" tabindex="-1" aria-labelledby="addServiceFeaturesLabel" aria-hidden="true">
 <div class="modal-dialog">
   <form action="{{\LaravelLocalization::localizeURL('/admin/services/add-feature')}}" method="post" enctype="multipart/form-data" id="add-work">
    @csrf
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="addServiceFeaturesLabel">{{__('services.add_service_feature')}}</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <input type="hidden" name="id" value="{{$service->id}}">
      <div class="form-group mb-3">
       <label for="feature_en">{{__('services.feature_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label><br>
       <textarea name="feature_en" id="feature_en" value="{{old('feature_en')}}" class="form-control">{{old('feature_en')}}</textarea>
       @error('feature_en')
         <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="feature_ar">{{__('services.feature_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label><br>
       <textarea name="feature_ar" id="feature_ar" value="{{old('feature_ar')}}" class="form-control">{{old('feature_ar')}}</textarea>
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
