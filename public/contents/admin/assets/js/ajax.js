// $('#department_id').change(function(){
//   var id = $(this).val();
//     $.ajax({
//       type: "GET",
//       url: "/dashboard/ajax/teacher/"+id,
//       dataType: "json",
//       success: function(response){
//         $('select[id="tcr_id"]').empty();
//         if (response.teacher){
//           $.each(response.teacher, function(key,value){
//             $.each(response.teacher, function(key,teacher){
//               $('select[id="tcr_id"]').append('<option value="'+ teacher.tcr_id +'">'+ teacher.first_name +'</option>');
//             });
//           });
//         }else{
//           $('select[id="tcr_id"]').append('<option label="Not Found" ></option>');
//         }
//       }
//     });
// });
// $(function () {
//     $('#department_id').on('change', function () {
//         axios.post('{{ route('dependent-dropdown.store') }}', {id: $(this).val()})
//             .then(function (response) {
//                 $('#teacher').empty();
//                 $.each(response.data, function (id, name) {
//                     $('#teacher').append(new Option(name, id))
//                 })
//             });
//     });
// });
// $(document).ready(function(){
//   function getService(){
//     var id = $("#department").val();
//     var url = $("#department").data('url');
//     var newUrl = url  + "/dashboard/ajax/service/" + id;
//     //console.log(newUrl);
//
// 		$.ajax({
// 			type: "GET",
// 			url: newUrl,
//       cache: false,
// 			dataType: "html",
// 			success: function(data){
// 				$("#service").html(data);
//         //console.log(data);
// 			}
// 		})
// 	}
//
//   $(document).on("change", "#department", function(e){
// 		e.preventDefault();
//     var id = $(this).val();
//     var url = $(this).data('url');
//     var newUrl = url  + "/dashboard/ajax/service/" + id;
//     //console.log(newUrl);
//
// 		$.ajax({
//           type: 'GET',
//           url: newUrl,
//           cache: false,
//           dataType: 'html',
//           success: function(data){
//               return getService();
//               //console.log(data);
//           }
//       });
// 	});
//
// });
