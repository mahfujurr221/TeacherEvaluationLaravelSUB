@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Importad Departments!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Departments Import Failed!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row">
  <div class="col-md-12">
    <h2 class="text-center m-2">SUMMER-2022</h2>
  </div>
</div>

<div id="department"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Departments</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/department/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a Department</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="departmentDataTable" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Department Code</th>
                            <th scope="col">Department Name</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{$data->dept_code}}</td>
                            <td>{{$data->dept_name}}</td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/department/view/'.$data->dept_id)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/department/edit/'.$data->dept_id)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="dept_delete" data-bs-toggle="modal" data-bs-target="#dept_delete_modal" data-id="{{$data->dept_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
              <div class="card-footer text-center bg-secondary">
                <form method="post" action="{{ route('dept.import') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <input type="file" name="file">
                  </div>
                    <button class="btn btn-primary" type="submit">Import Data</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div id="dept_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/department/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="hidden" name="modal_id" id="modal_id"/>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
