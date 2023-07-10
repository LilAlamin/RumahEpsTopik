<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5> 
            </div>
            <form class="form-horizontal" id="user-edit" method="post" enctype="multipart/form-data" files=true>
                 @method('PUT')
                 @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_edit">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"  name="name_edit" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  name="email_edit" class="form-control" value=""
                            placeholder="" autocomplete="email" disabled>
                    </div>   
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password"  name="password_edit" class="form-control" value=""
                            placeholder=""  autocomplete="new-password">
                       
                    </div>     
                    <div class="form-group">
                        <label>Role</label>
                        <select class="single-select" name="role_edit">
                        @foreach(Spatie\Permission\Models\Role::orderBy('id', 'desc')->get() as $value => $key)
                      
                      <option value="{{$key->id}}">{{$key->name}}</option>
                  @endforeach
                        </select>
                    </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('after-script')
<script type="text/javascript">
$(document).ready(function(){
    /* START OF SAVE DATA */
		$('#user-edit').on('submit', function (e) {
      e.preventDefault();
        $.ajax({
            'type': 'post',
            'url' : "{{ url('user') }}"+"/"+$('input[name=id_edit]').val(),
            'data': new FormData(this),
            'processData': false,
            'contentType': false,
            'dataType': 'JSON',
            'success': function(data){
                if(data.success){
                    $('#modal-edit').modal('hide');
                    tableData.ajax.reload();
                }else{
                    for(var count = 0; count < data.errors.length; count++){
                        swal(data.errors[count], {
                            icon: "error",
                            timer: false,
                        });
                    }
                }
            },

        });
    });
});

</script>
@endpush
