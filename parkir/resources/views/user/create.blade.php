<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
               
            </div>
            <form class="form-horizontal" id="user-store" method="post" enctype="multipart/form-data" files=true>
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"  name="name" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  name="email" class="form-control" value=""
                            placeholder="" autocomplete="email">
                    </div>   
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password"  name="password" class="form-control" value=""
                            placeholder=""  autocomplete="new-password">
                        @if ($errors->has('password'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password') }}</strong>
                        </label>
                        @endif
                    </div>     
                        <div class="form-group">
                        <label>Password Confirm</label>
                        <input type="password"  name="password_confirmation" class="form-control" value="{{ old('password') }}"
                            placeholder=""  autocomplete="new-password">
                         @if ($errors->has('password_confirmation'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password_confirmation') }}</strong>
                        </label>
                        @endif
                    </div> 
                    <div class="form-group">
                        <label>Role</label>
                        <select class="single-select" name="role">
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
    $(document).ready(function () {
        /* save data */
        $('#user-store').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                'type': 'POST',
                'url': "{{ route('user.store') }}",
                'data': new FormData(this),
                'processData': false,
                'contentType': false,
                'dataType': 'JSON',
                'success': function (data) {
                    if (data.success) {
                        $('#modal-create').modal('hide');
                        tableData.ajax.reload();
                    } else {
                        for (var count = 0; count < data.errors.length; count++) {
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