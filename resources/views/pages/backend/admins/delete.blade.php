<!-- Modal -->
<div class="modal fade" id="deleteAdmin-{{$admin->id}}" tabindex="-1" aria-labelledby="deleteAdminLabel" aria-hidden="true">
 <div class="modal-dialog">
   <form action="{{\LaravelLocalization::localizeURL('/admin/admins/delete/'.$admin->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="editAdminLabel">{{__('admin.delete_admin')}}</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <b class="mb-3">{{__('messages.are_you_sure_to_delete_admin')}}</b>
      <div class="form-group my-3">
       <label for="password">{{__('form.enter_password_to_delete')}} <small class="text-danger pl-2">*</small></label>
       <input type="password" name="password" id="password" class="form-control" required> 
       @error('password')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('main.close')}}</button>
       <button type="submit" class="btn btn-danger">{{__('admin.delete_admin')}}</button>
     </div>
   </div>
   </form>
 </div>
</div>