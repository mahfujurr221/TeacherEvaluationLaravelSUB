$(document).ready(function () {
  $('#departmentDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});

$(document).ready(function () {
  $('#teacherDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});
$(document).ready(function () {
  $('#studentDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});
$(document).ready(function () {
  $('#courseDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});

$(document).ready(function () {
  $('#offerCourseDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});

$(document).ready(function () {
  $('#enrollDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});
$(document).ready(function () {
  $('#mcqDataTable').dataTable( {
    "searching": true,
    "ordering": false,
    "paging": true,
    "lengthChange": true,
    "info": true,
  });
});


//start of delete script

$(document).ready(function(){
  $(document).on('click','#dept_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #modal_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#semester_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #sem_modal_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#teacher_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #tcr_delete_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#student_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #stu_delete_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#course_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #crs_delete_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#offer_course_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #ofr_crs_delete_id').val(deleteID);
  });
});

$(document).ready(function(){
  $(document).on('click','#enroll_student_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #enroll_stu_delete_id').val(deleteID);
  });
});
$(document).ready(function(){
  $(document).on('click','#mcq_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #mc_delete_id').val(deleteID);
  });
});
$(document).ready(function(){
  $(document).on('click','#open_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #opn_delete_id').val(deleteID);
  });
});
$(document).ready(function(){
  $(document).on('click','#admin_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #admn_delete_id').val(deleteID);
  });
});
$(document).ready(function(){
  $(document).on('click','#role_delete',function(){
    var deleteID=$(this).data('id');
    $('.modal_body #rl_delete_id').val(deleteID);
  });
});
/////////////////////////////////////////
//status deactivation
/////////////////////////////////////////
$(document).ready(function(){
  $(document).on('click','#student_deactive',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #stu_deactive_id').val(deactiveID);
  });
});

$(document).ready(function(){
  $(document).on('click','#teacher_deactive',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #tcr_deactive_id').val(deactiveID);
  });
});

$(document).ready(function(){
  $(document).on('click','#enroll_student_deactive',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #enroll_stu_deactive_id').val(deactiveID);
  });
});

$(document).ready(function(){
  $(document).on('click','#offered_course_deactive',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #offered_crs_deactive_id').val(deactiveID);
  });
});

$(document).ready(function(){
  $(document).on('click','#evaluation_enable',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #enbl_id').val(deactiveID);
  });
});


$(document).ready(function(){
  $(document).on('click','#enroll_student_active',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #enroll_stu_active_id').val(deactiveID);
  });
});

$(document).ready(function(){
  $(document).on('click','#offered_course_active',function(){
    var deactiveID=$(this).data('id');
    $('.modal_body #offered_crs_active_id').val(deactiveID);
  });
});
////////////////////////////////////////////////////////////////////////////////////////
//dependent Dropdown offered course
////////////////////////////////////////////////////////////////////////////////////////
    $(document).ready(function(){
        $("#department_id").change(function(){
            var dept_id = $(this).val();
            if(dept_id == ""){
                $("#teacher").html("<option value=''>Select Teacher</option>");
            }
            $.ajax({
                url:"/dashboard/offer/course/teacher_dropdown/"+dept_id,
                type:"GET",
                success:function(data){
                    var teacher = data.teacher;
                    var html = "<option value=''>Select Teacher</option>";
                    for(let i =0;i<teacher.length;i++){
                        html += `
                        <option value="`+teacher[i]['tcr_id']+`">`+teacher[i]['name']+`</option>
                        `;
                    }
                    $("#teacher").html(html);
                }
            });

        });
    });



  $(document).ready(function(){
        $("#department_id").change(function(){
            var dept_id = $(this).val();
            if(dept_id == ""){
                $("#course_dropdown").html("<option value=''>Select Course</option>");
            }
            $.ajax({
                url:"/dashboard/offer/course/course_dropdown/"+dept_id,
                type:"GET",
                success:function(data){
                    var course = data.course;
                    var html = "<option value=''>Select Course</option>";
                    for(let i =0;i<course.length;i++){
                      html += `<option value="`+course[i]['course_id']+`">`+course[i]['course_code']+`</option>`;
                    }
                    $("#course_dropdown").html(html);
                }
            });
        });
    });



    ////////////////////////////////////////////////////////////////////////////////////////
    //dependent Dropdown enroll student
    ////////////////////////////////////////////////////////////////////////////////////////

      $(document).ready(function(){
            $("#enroll_department_id").change(function(){
                var dept_id = $(this).val();
                if(dept_id == ""){
                    $("#enroll_course_dropdown").html("<option value=''>Select Course</option>");
                }
                $.ajax({
                    url:"/dashboard/enroll/student/course_dropdown/"+dept_id,
                    type:"GET",
                    success:function(data){
                        var course = data.course;
                        var html = "<option value=''>Select Course</option>";
                        for(let i =0;i<course.length;i++){
                          html += `<option value="`+course[i]['course_id']+`">`+course[i]['course_code']+`</option>`;
                        }
                        $("#enroll_course_dropdown").html(html);
                    }
                });
            });
        });

        $(document).ready(function(){
              $("#stu_filter").change(function(){
                  var dept_id = $(this).val();
                  $.ajax({
                      url:"{{url('dashboard/student/')}}"+dept_id,
                      type:"GET",
                      data:{'student':dept_id},
                      success:function(data){
                        var student=data.student;
                        var html= '';
                          for(let i =0;i<student.length;i++){
                            html +='<tr>\
                                        <td>'+student[i]['stu_id']+'</td>\
                                        <td>'+student[i]['name']+'</td>\
                                        <td>'+student[i]['dept_id']+'</td>\
                                    </tr>';
                                  }
                        $("#stu_filteerTable").html(html);
                      }
                  });
              });
          });
