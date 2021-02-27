<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required',
            'attendance_date'=>'required',
            'attendance_session'=>'required',
            'status'=>'required',
            'remarks'=>'required'
        ]);

        $student = new Student([
            'student_id' => $request->get('student_id'),
            'attendance_date' => $request->get('attendance_date'),
            'attendance_session' => $request->get('attendance_session'),
            'status' => $request->get('status'),
            'remarks' => $request->get('remarks')
            
        ]);
        $student->save();
        return redirect('/students')->with('success', 'Student saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'student_id'=>'required',
            'attendance_date'=>'required',
            'attendance_session'=>'required',
            'status'=>'required',
            'remarks'=>'required'
        ]);

        $student = Student::find($id);
        $student->student_id =  $request->get('student_id');
        $student->attendance_date = $request->get('attendance_date');
        $student->attendance_session= $request->get('attendance_session');
        $student->status = $request->get('status');
        $student->remarks= $request->get('remarks');
        $student->save();

        return redirect('/students')->with('success', 'Student updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $student = Student::find($id);
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted!');
    }
}
