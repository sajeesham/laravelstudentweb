<?php

namespace App\Http\Controllers\AdminResource;

use App\Teacher;
use App\Student;
use App\Subject;
use App\StudentMark;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StudentMarkResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $StudentMark = DB::select("select students.id,name,SUM(mark) as total,term,student_marks.created_at FROM student_marks INNER JOIN students ON student_marks.student_id = students.id where student_marks.deleted_at is NULL GROUP BY student_marks.student_id, student_marks.term");
        $alldetails = StudentMark::all();
        return view(Route::currentRouteName(),compact('StudentMark','alldetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::orderBy('id','DESC')->get();
        $subject = Subject::orderBy('id','DESC')->get();
        return view(Route::currentRouteName(),compact('student','subject'));
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
            'student' => ['required'],
            'term' => ['required','string'],
            'mark[]' => ['mark','numeric'],

        ]);
        
        try {
            $data = $request->all();
            unset($data['_token']);
            $i=1;
            foreach ($data['mark'] as $key => $value) {
  
              foreach($value as $val){      

                $StudentMark['student_id'] = trim($data['student']);
                $StudentMark['subject_id'] =  $i;
                $StudentMark['term'] = trim($data['term']);
                $StudentMark['mark'] = $val;

                StudentMark::create($StudentMark);

              }
              $i++;  
            }

                   

            return redirect(route('admin.mark.index'))->with('flash_success', 'Mark added successfully');

        } catch (\Exception $exception){          
            return back()->with('flash_error', 'something went wrong');
        }
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
        $teachers = Teacher::orderBy('id','DESC')->get();
        $student = Student::find($id);
        return view(Route::currentRouteName(),compact('student','teachers'));
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
            'name' => ['required','string','max:255'],
            'gender' => ['required','string'],
            'dob' => ['required','before_or_equal:today'],
            'teacher' => ['required'],
        ]);

        try {

            $data = $request->all();
            unset($data['_token']);

            $user_age = Carbon::parse($data['dob'])->diff(Carbon::now())->format('%y');

            $Student = Student::find($id);

            $Student->name = trim($data['name']);
            $Student->gender = trim($data['gender']);
            $Student->age = $user_age;
            $Student->dob = ($data['dob']);
            $Student->teacher_id = ($data['teacher']);
            $Student->description = trim($data['description']);

            $Student->save();

            return redirect(route('admin.student.index'))->with('flash_success', 'Student details updated successfully');


        } catch (\Exception $exception){
            dd($exception);
            return back()->with('flash_error', 'something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        try {
        $StudentMark = DB::select("select * FROM `student_marks` WHERE `student_id`=$id and `term`='$request->term' and deleted_at is NULL ");

        foreach($StudentMark as $stud){

        $StudentMarkss = StudentMark::find($stud->id);
        $StudentMarkss->deleted_at = Carbon::now();
        $StudentMarkss->save();

        }

           return redirect(route('admin.mark.index'))->with('flash_success', 'Student mark deactivated successfully');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'something went wrong');
        }
    }

   
}
