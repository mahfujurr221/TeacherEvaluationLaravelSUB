@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Student Deactivated Successfully!", icon: "success", timer:2000});
  </script>
@endif
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-2">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-body text-center">
          <div class="row mb-2">
            @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2')
              <div class="col-md-3">
                  <select class="form-control form-select text-center" name="dept_code">
                    <option value="">---Department---</option>
                    @foreach($department as $d)
                      <option value="{{$d->dept_id}}">{{$d->dept_code}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col-md-3">
                  <select class="form-control form-select text-center" name="dept_code">
                    <option value="">---Semester---</option>
                    @foreach($semester as $s)
                      <option value="{{$s->semester_id}}">{{$s->semester_name}}</option>
                    @endforeach
                  </select>
              </div>
            @endif
            @if(Auth::user()->role_id==3)
              <div class="col-md-3">
                  <select class="form-control form-select text-center" name="dept_code">
                      <option value="{{Auth::user()->dept_id}}" @if(Auth::user()->dept_id==Auth::user()->dept_id) selected @endif>{{Auth::user()->deptInfo->dept_code}}</option>
                  </select>
              </div>
              <div class="col-md-3">
                  <select class="form-control form-select text-center" name="dept_code">
                    <option value="">---Semester---</option>
                    @foreach($semester as $s)
                      <option value="{{$s->semester_id}}">{{$s->semester_name}}</option>
                    @endforeach
                  </select>
              </div>
            @endif
            <div class="col-md-3">
                <select class="form-control form-select text-center" name="dept_code">
                  <option value="">---Year---</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control form-select text-center" name="dept_code">
                  <option value="">---Version---</option>
                    <option value="1">Version 1</option>
                    <option value="2">Version 2</option>
                    <option value="3">Version 3</option>
                </select>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<div id="offered_courses"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                  <div class="col-md-2">
                      <a class="btn btn-sm btn-danger" href="{{url('dashboard/enroll/student/deactivated')}}"><i class="fa fa-trash fa-lg mr-1"></i>Deactive Students</a>
                  </div>
                    <div class="col-md-8">
                        <h4 class="card_header_title text-center"><i class="fa fa-gg-circle"></i> Enroll Student</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/enroll/student/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a student</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="enrollDataTable" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Enroll Id</th>
                            <th scope="col">Student Id</th>
                            <th scope="col">Department</th>
                            <th scope="col">Course Id</th>
                            <th scope="col" class="text-center">Evaluation Status</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach($all as $data)
                        @if($data->offerCourseInfo->semester_id == $default->semester_id && $data->offerCourseInfo->year == $default->semester_year)
                          @if(Auth::user()->dept_id==$data->dept_id)
                            <tr>
                                <td>{{$data->enroll_id}}</td>
                                <td>{{$data->stu_id}}</td>
                                <td>{{$data->deptInfo->dept_code}}</td>
                                <td>{{$data->courseInfo->course_code}}</td>
                                @if($data->evaluation_status==0)
                                <td>
                                   <span style="color:green;">Evaluated</span>
                                </td>
                                @endif
                                @if($data->evaluation_status==1)
                                <td>
                                   <span style="color:red;">Not Evaluate Yet</span>
                                </td>
                                @endif

                                <td class="text-center">
                                    <a class="btn btn-danger status_btn" href="#" id="enroll_student_deactive" data-bs-toggle="modal" data-bs-target="#enroll_student_deactive_modal" data-id="{{$data->enroll_id}}">deactive</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/enroll/student/view/'.$data->enroll_slug)}}"><i class="fa fa-th"></i>View</a>
                                    <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/enroll/student/edit/'.$data->enroll_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                    <a class="btn btn-danger delete_btn" href="#" id="enroll_student_delete" data-bs-toggle="modal" data-bs-target="#enroll_student_delete_modal" data-id="{{$data->enroll_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                                </td>
                            </tr>
                            @endif

                            @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2')
                            <tr>
                                <td>{{$data->enroll_id}}</td>
                                <td>{{$data->stu_id}}</td>
                                <td>{{$data->deptInfo->dept_code}}</td>
                                <td>{{$data->courseInfo->course_code}}</td>
                                @if($data->evaluation_status==0)
                                <td>
                                   <span style="color:green;">Evaluated</span>
                                </td>
                                @endif
                                @if($data->evaluation_status==1)
                                <td>
                                   <span style="color:red;">Not Evaluate Yet</span>
                                </td>
                                @endif
                                <td class="text-center">
                                    <a class="btn btn-success status_btn" href="#" id="enroll_student_deactive" data-bs-toggle="modal" data-bs-target="#enroll_student_deactive_modal" data-id="{{$data->enroll_id}}">deactive</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/enroll/student/view/'.$data->enroll_slug)}}"><i class="fa fa-th"></i>View</a>
                                    <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/enroll/student/edit/'.$data->enroll_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                    <a class="btn btn-danger delete_btn" href="#" id="enroll_student_delete" data-bs-toggle="modal" data-bs-target="#enroll_student_delete_modal" data-id="{{$data->enroll_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                                </td>
                            </tr>
                            @endif
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
              <div class="card-footer text-center bg-secondary">
                <div class="btn-group" role="group">
                  <a class="btn btn-primary" href="#">Print</a>
                  <a class="btn btn-dark" href="#">PDF</a>
                  <a class="btn btn-primary" href="#">Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="enroll_student_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/enroll/student/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="hidden" name="enroll_student_delete_id" id="enroll_stu_delete_id"/>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
        </form>
    </div>
</div>

<div id="enroll_student_deactive_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/enroll/student/deactive')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Deactive</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to deactive student?
                  <input type="hidden" name="enroll_student_deactive_id" id="enroll_stu_deactive_id"/>
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
