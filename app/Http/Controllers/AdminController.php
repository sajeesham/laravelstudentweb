<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mail\HospitalRegister;
use App\Rules\userPasswordChack;
use App\Teacher;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Exception;
use Setting;

class AdminController extends Controller
{
    public function index()
    {
        $teachercount = Teacher::count();
        $studentcount = Student::count();
        return view(Route::currentRouteName(),compact('teachercount','studentcount'));
    }

   

    public function settings()
    {
        $settings = Setting::all();
        return view(Route::currentRouteName(),compact('settings'));
    }
    public function saveSettings(Request $request)
    {
        $settings = $request->all();
        unset($settings['_token']);
        foreach ($settings as $key => $setting) {
            $temp_setting = Settings::where('key', $key)->first();
            if($temp_setting){
                if($key=='site_logo'){
                    $temp_setting->value = asset('storage/'.$request->$key->store('logo','public'));
                }elseif($key=='site_fav_icon'){
                    $temp_setting->value = asset('storage/'.$request->$key->store('logo','public'));
                }elseif($key=='medicine_import_image'){
                    $temp_setting->value = asset('storage/'.$request->$key->store('logo','public'));
                }elseif($key=='gender'){
                    Setting::set($key,explode(',',$request->$key));
                }else{
                    $temp_setting->value = $request->$key;
                }
                $temp_setting->save();
            }else{
                if($key=='site_logo'){
                    Setting::set($key,asset('storage/'.$request->$key->store('logo','public')));
                }elseif($key=='site_fav_icon'){
                    Setting::set($key,asset('storage/'.$request->$key->store('logo','public')));
                }elseif($key=='medicine_import_image'){
                    Setting::set($key,asset('storage/'.$request->$key->store('logo','public')));
                }elseif($key=='gender'){
                    Setting::set($key,explode(',',$request->$key));
                }else{
                    Setting::set($key,$setting);
                }
                Setting::save();
            }
        }
        return redirect(route('admin.settings'))->with('flash_success', 'Updated successfully');
    }


    public function profile()
    {
        $userid = Auth::user()->id;
        $admin = Admin::find($userid);
        return view(Route::currentRouteName(),compact('admin'));
    }

    public function saveprofile(Request $request)
    {
        $request->validate([
            'firstname' => ['required','string','max:255'],
            'phone' => ['nullable','numeric'],
        ]);

        try {

            $data = $request->all();
            unset($data['_token']);
            $data['email'] = Auth::user()->email;

            $userid = Auth::user()->id;

            $user = User::find($userid);
            $user->name = $data['firstname'];
            $user->save();

            $admin = Admin::find($userid);
            if($admin){
                $admin->firstname = $data['firstname'];
                $admin->lastname = $data['lastname'];
                $admin->phone = ($data['phone'])?$data['phone']:'0';
                $admin->address = ($data['address'])?$data['address']:'NULL';
                $admin->pin = ($data['pin'])?$data['pin']:'0';
                $admin->save();

            }else{

                $data['id']=$userid;
                Admin::create($data);
            }

            return redirect(route('admin.profile'))->with('flash_success', 'Profile updated successfully');

        } catch (Exception $e) {
            return back()->with('flash_error', 'something went wrong');
        }

    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword'=>['required',new userPasswordChack()],
            'password' => ['required','string','string','min:8','confirmed','different:oldpassword'],
        ]);

        try {

            $data = $request->all();
            unset($data['_token']);

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($data['password']);
            $user->save();

            return redirect(route('admin.profile'))->with('flash_success', 'password update successfully');
        } catch (Exception $e) {
            return back()->with('flash_error', 'something went wrong');
        }

        return back()->with('flash_success', 'Profile updated successfully');
    }

}
