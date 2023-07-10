@extends('layouts.master')

@section('content')
    <div class="card">
    <div class="card-body">
        <div class="row">
           
            <div class="col-10">
               	<div class="card-title">
								<h4 class="mb-0">User</h4>
							</div>
            </div>
            <div class="col-2">
            <button type="button" id="btn-create" class="btn btn-primary" >Tambah data</button>
            </div>
        </div>
        <hr />
			<div class="table-responsive"></div>
            <table id="table-user" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
						<th>id</th>
						<th>no</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        
    </div>
</div>
@include('user.create')
@include('user.edit')
@endsection


@push('after-script')
    <script>
    var tableData;
    $(document).ready(function () {
        $("#btn-create").on('click', function(){
          $('.fileinput-remove-button').click();
          $('input[name=name]').val('');
          $('input[name=email]').val('');
          $('input[name=password]').val('');
          $('input[name=role]').val('');
          $('#modal-create').modal('show');
          
      });
        tableData = $('#table-user').DataTable({
            processing: true,
			serverSide: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari"
            },
			
            serverSide: true,
            stateSave: true,
            ajax: {
                url: "{{ url('table/data-user') }}",
                type: "GET",
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false
                },
				{
					data: 'DT_RowIndex', name:'DT_RowIndex', visible:true
				},

                {
                    data: 'name',
                    name: 'name',
                    visible: true
                },
               
                 { data: 'action', name:'action', visible:true},
				
            ],
			
        });
		 $("#table-user tbody").on('click','#btn-edit', function(){
          $('.fileinput-remove-button').click();
          $("#user-edit :input").val('');
          $('#modal-edit').modal('show');
          
           
          var data = tableData.row( $(this).parents('tr') ).data();
          var id = data['id'];
          var token = $('input[name=_token]').val();
          
          $('input[name=_method]').val('PUT');
          $('input[name=_token]').val(token);
          $('input[name=id_edit]').val(data['id']);
          $('input[name=name_edit]').val(data['name']);
          $('input[name=email_edit]').val(data['email']);
          
        });

         $('#table-user tbody').on( 'click', '#btn-delete', function () {
        var data = tableData.row( $(this).parents('tr') ).data();
       Swal.fire({
            title: 'Harap Konfirmasi',
            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((willDelete) => {
          if (willDelete.isConfirmed) {
            $.ajax({
              url: "{{ url('delete/user') }}"+"/"+data['id'],
              method: 'get',
              success: function(result){
                tableData.ajax.reload();
                Swal.fire(
                'Hapus',
                  'Data Berhasil di hapus.',
                 'success'
                 )
              }
              
            });
          }
        });
      });
    });

</script>
@endpush