@foreach($allTeacher as $teacher)
  <option value="{{$teacher->tcr_id}}">{{$teacher->first_name}}</option>
@endforeach
