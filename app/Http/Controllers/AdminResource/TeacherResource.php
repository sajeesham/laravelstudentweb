<?php

namespace App\Http\Controllers\AdminResource;

use App\Teacher;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Protocol;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class TeacherResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = DB::select("select * FROM teachers INNER JOIN subjects ON teachers.subject = subjects.id");
        return view(Route::currentRouteName(),compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Subject = Subject::all();
        return view(Route::currentRouteName(),compact('Subject'));
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
            'subject' => ['required','string','max:255'],
        ]);
        $userid = Auth::user()->id;
        $admin = Admin::find($userid);

        try {
            $data = $request->all();
            unset($data['_token']);

            $teacher['name'] = trim($data['name']);
            $teacher['subject'] = trim($data['subject']);
            $teacher['description'] = trim($data['description']);
            $teacher['admin_id'] = $userid;

            Teacher::create($teacher);

            return redirect(route('admin.teacher.index'))->with('flash_success', 'Teacher added successfully');

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
        $teacher = Teacher::find($id);
        $Subject = Subject::all();
        return view(Route::currentRouteName(),compact('teacher','Subject'));
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
            'subject' => ['required','string','max:255'],
        ]);

        try {

            $data = $request->all();
            unset($data['_token']);

            $teacher = Teacher::find($id);

            $teacher->name = trim($data['name']);
            $teacher->subject = trim($data['subject']);
            $teacher->description = trim($data['description']);

            $teacher->save();

            return redirect(route('admin.teacher.index'))->with('flash_success', 'Teacher details updated successfully');


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
            $Teacher = Teacher::find($id);
                $Teacher->delete();
                return redirect(route('admin.teacher.index'))->with('flash_success', 'Teacher deactivated successfully');
            

        } catch (Exception $e) {
            return back()->with('flash_error', 'something went wrong');
        }
    }

   
}
