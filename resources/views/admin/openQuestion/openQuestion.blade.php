@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    @foreach($default as $data)
      <h2 class="text-center m-2">{{$data->defaultSemesterInfo->semester_name}}-{{$data->semester_year}}</h2>
    @endforeach
  </div>
</div>

<div id="courses"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Open Question</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/open/question/add')}}"><i class="fa fa-plus-square fa-lg"></i>Add a Question</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="mcqDataTable" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Question ID</th>
                            <th scope="col">Version ID</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach($all as $data)
                        <tr>
                            <td>{{$data->question_id}}</td>
                            <td>{{$data->question_version_id}}</td>
                            <td>{{$data->question_description}}</td>
                            <td class="text-center">
                                <a class="btn btn-success manage_btn view_btn" href="{{url('dashboard/open/question/view/'.$data->question_slug)}}"><i class="fa fa-th"></i>View</a>
                                <a class="btn btn-primary manage_btn edit_btn" href="{{url('dashboard/open/question/edit/'.$data->question_slug)}}"><i class="fa fa-pencil-square fa-lg"></i>Edit</a>
                                <a class="btn btn-danger delete_btn" href="#" id="open_delete" data-bs-toggle="modal" data-bs-target="#open_delete_modal" data-id="{{$data->question_id}}"><i class="fa fa-trash fa-lg"></i>Delete</a>
                            </td>
                        </tr>
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


<div id="open_delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/open/question/delete')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body modal_body">
                  Are you sure want to delete data?
                  <input type="hidden" name="open_delete_id" id="opn_delete_id"/>
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
