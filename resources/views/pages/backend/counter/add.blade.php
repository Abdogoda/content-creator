
<!-- Modal -->
<div class="modal fade" id="addCounter" tabindex="-1" aria-labelledby="addCounterLabel" aria-hidden="true">
 <div class="modal-dialog">
   <form action="{{\LaravelLocalization::localizeURL('/admin/counters')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="addCounterLabel">{{__('counter.add_new_counter')}}</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <div class="form-group mb-3">
       <label for="title_en">{{__('counter.counter_title')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
       <input type="text" name="title_en" id="title_en" value="{{old('title_en')}}" class="form-control">
       @error('title_en')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="title_ar">{{__('counter.counter_title')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
       <input type="text" name="title_ar" id="title_ar" value="{{old('title_ar')}}" class="form-control">
       @error('title_ar')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="value">{{__('counter.counter_value')}} <small class="text-danger pl-2">*</small></label>
       <input type="text" name="value" id="value" value="{{old('value')}}" class="form-control">
       @error('value')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="image">{{__('form.image')}} <small class="text-danger pl-2">*</small></label>
       <input type="file" name="image" id="image" accept="image*" class="form-control">
       @error('image')
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