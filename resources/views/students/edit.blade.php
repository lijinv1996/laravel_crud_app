@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a student</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('students.update', $student->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="student_id">Student ID:</label>
                <input type="text" class="form-control" name="student_id" value={{ $student->student_id }} />
            </div>

            <div class="form-group">
                <label for="attendance_date">Atendance Date:</label>
                <input type="text" class="form-control" name="attendance_date" value={{ $student->attendance_date }} />
            </div>

            <div class="form-group">
                <label for="attendance_session">Attendance Session:</label>
                <input type="text" class="form-control" name="attendance_session" value={{ $student->attendance_session }} />
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status" value={{ $student->status }} />
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" class="form-control" name="remarks" value={{ $student->remarks }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection