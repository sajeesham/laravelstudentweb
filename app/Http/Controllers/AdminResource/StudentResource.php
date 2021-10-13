<?php

namespace App\Http\Controllers\AdminResource;

use App\Teacher;
use App\Student;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


class StudentResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['teacher'])->orderBy('id','DESC')->get();
        return view(Route::currentRouteName(),compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::orderBy('id','DESC')->get();
        return view(Route::currentRouteName(),compact('teachers'));
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
            'name' => ['required','string','max:255'],
            'gender' => ['required','string'],
            'dob' => ['required','before_or_equal:today'],
            'teacher' => ['required'],

        ]);
        $userid = Auth::user()->id;
        $admin = Admin::find($userid);

        try {
            $data = $request->all();
            unset($data['_token']);

            $user_age = Carbon::parse($data['dob'])->diff(Carbon::now())->format('%y');

            $Student['name'] = trim($data['name']);
            $Student['gender'] = trim($data['gender']);
            $Student['age'] = $user_age;
            $Student['dob'] = $data['dob'];
            $Student['teacher_id'] = trim($data['teacher']);
            $Student['description'] = trim($data['description']);

            Student::create($Student);

            return redirect(route('admin.student.index'))->with('flash_success', 'Student added successfully');

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
    public function destroy($id)
    {
        try {
            $Teacher = Student::find($id);
                $Teacher->delete();
                return redirect(route('admin.student.index'))->with('flash_success', 'Student deactivated successfully');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'something went wrong');
        }
    }

   
}
