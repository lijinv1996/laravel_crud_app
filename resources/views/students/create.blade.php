@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a student</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          @csrf
          <div class="form-group">    
              <label for="student_id">Student ID:</label>
              <input type="text" class="form-control" name="student_id"/>
          </div>

          <div class="form-group">
              <label for="attendance_date">Attendance Date:</label>
              <input type="text" class="form-control" name="attendance_date"/>
          </div>

          <div class="form-group">
              <label for="attendance_session">Attendance Session:</label>
              <input type="text" class="form-control" name="attendance_session"/>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <div class="form-group">
              <label for="remarks">Remarks:</label>
              <input type="text" class="form-control" name="remarks"/>
          </div>                        
          <button type="submit" class="btn btn-primary-outline">Add student</button>
      </form>
  </div>
</div>
</div>
@endsection