@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully imported Course!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Course Import Failed!", icon: "warning", timer:5000});
  </script>
@endif
<div class="row">
  <div class="col-md-12">
    @foreach($default as $data)
      <h2 class="text-center m-2">{{$data->defaultSemesterInfo->semester_name}}-{{$data->semester_year}}</h2>
    @endforeach
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

<div id="courses"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Courses</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/course/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a course</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="courseDataTable" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Title</th>
                            <th scope="col">Department Code</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach($all as $data)
                      @if(Auth::user()->dept_id==$data->dept_id)
                        <tr>
                            <td>{{$data->course_code}}</td>
                            <td>{{$data->course_title}}</td>
                            <td>{{$data->deptInfo->dept_code}}</td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/course/view/'.$data->course_slug)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/course/edit/'.$data->course_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="course_delete" data-bs-toggle="modal" data-bs-target="#course_delete_modal" data-id="{{$data->course_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
                        @endif
                        @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2')
                        <tr>
                            <td>{{$data->course_code}}</td>
                            <td>{{$data->course_title}}</td>
                            <td>{{$data->deptInfo->dept_code}}</td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/course/view/'.$data->course_slug)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/course/edit/'.$data->course_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="course_delete" data-bs-toggle="modal" data-bs-target="#course_delete_modal" data-id="{{$data->course_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form method="post" action="{{ route('course.import') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-footer text-center bg-secondary">
                <div class="btn-group" role="group">
                      <input class="btn col-md-1" type="file" name="file">
                      <button class="btn btn-success" type="submit">Import Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<div id="course_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/course/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="text" name="course_delete_id" id="crs_delete_id"/>
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
