@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('students.create')}}" class="btn btn-primary">New student</a>
    </div>  
<div class="col-sm-12">
    <h1 class="display-3">Students</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Student ID</td>
          <td>Attendance Date</td>
          <td>Attendance Session</td>
          <td>Status</td>
          <td>Remarks</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->student_id}}</td>
            <td>{{$student->attendance_date}}</td>
            <td>{{$student->attendance_session}}</td>
            <td>{{$student->status}}</td>
            <td>{{$student->remarks}}</td>
            <td>
                <a href="{{ route('students.edit',$student->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('students.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection