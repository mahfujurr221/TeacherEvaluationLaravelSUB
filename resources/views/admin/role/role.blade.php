@extends('layouts.admin')
@section('content')
<div id="role"  class="row animate__animated animate__fadeInRightBig animate">
  <div class="col-xl-2">

  </div>
    <div class="col-md-8 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Roles</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/role/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a Role</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table  class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Role ID</th>
                            <th scope="col">Role Name</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{$data->role_id}}</td>
                            <td>{{$data->role_name}}</td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/role/view/'.$data->role_slug)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/role/edit/'.$data->role_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="role_delete" data-bs-toggle="modal" data-bs-target="#role_delete_modal" data-id="{{$data->role_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<div id="role_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/role/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="hidden" name="role_delete_id" id="rl_delete_id"/>
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
