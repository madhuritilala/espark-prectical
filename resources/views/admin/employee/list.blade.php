@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Simple Table</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
              </div>
              <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table" id="tblEmployee">
                    <thead class=" text-primary">
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Designation</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Actions</th>
                    </thead>

                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
@section('specific_scripts')
<script src="{{asset('assets/admin/js/employee/list.js')}}"></script>
<script>
    // global app configuration object
    var config = {
        routes: {
            zone: "{{ route('employee-ajax') }}"
        }
    };
</script>
<script>
    $(document).on('click', '.btnDelete', function (e) {
         e.preventDefault();
         var id = $(this).data('id');
         swal({
                 title: "Are you sure!",
                 type: "error",
                 confirmButtonClass: "btn-danger",
                 confirmButtonText: "Yes!",
                 showCancelButton: true,
             }).then((result) => {
                     if (result.value) {
                             $.ajax({
                                 url:'{{url("/admin/employee")}}/' +id,
                                 type:'DELETE',
                                 headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 },
                                 data:{
                                     'id':id
                                 },
                                 success:function(data) {
                                     if (data.success){
                                         swal.fire(
                                             'Deleted!',
                                             'Your file has been deleted.',
                                             "success"
                                         );
                                         $('#tblEmployee').DataTable().ajax.reload()// you can add name div to remove
                                     }

                                 }
                             });


                     } else if (result.dismiss === Swal.DismissReason.cancel){
                         swal.fire(
                             'Cancelled',
                             'Your imaginary file is safe :)',
                             'error'
                         );
                     }
                 });
     });

 </script>
@endsection
