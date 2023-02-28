@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    @foreach($default as $data)
      <h2 class="text-center mb-2">{{$data->defaultSemesterInfo->semester_name}}-{{$data->semester_year}}</h2>
    @endforeach
  </div>
</div>
<div id="admins"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Admins</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/user/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a Admin</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="admins" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Picture</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($all as $data)
                      @if($data->dept_id!=0)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->deptInfo->dept_code}}</td>
                            <td>{{$data->roleInfo->role_name}}</td>
                            <td class="text-center">
                              @if($data->admin_pic!='')
                                <img height="30" src="{{asset('uploads/admins/'.$data->admin_pic)}}"/>
                              @else
                                <img height="30" src="{{asset('uploads/avatar.jpg')}}"/>
                              @endif
                            </td>
                            <td class="text-center"><a class="btn btn-success status_btn">Disable</a></td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/user/view/'.$data->admin_slug)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/user/edit/'.$data->admin_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="admin_delete" data-bs-toggle="modal" data-bs-target="#admin_delete_modal" data-id="{{$data->id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="admin_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/user/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="hidden" name="admin_delete_id" id="admn_delete_id"/>
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
