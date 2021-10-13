<?php

namespace App\Providers;

use App\Hospital;
use App\Reports;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('hospital.layouts.sidebar', function($view){
            $hospital = Hospital::with(['logo'])->find(Auth::user()->id);
            $view->with('hospital',$hospital);
        });
		
        view()->composer('doctor.layouts.sidebar', function($view){
            $doctor = Hospital::with(['logo'])->find(Auth::user()->id);
            $view->with('doctor',$doctor);
        });		
		
		view()->composer('hospital.layouts.topbar', function($view){
            $reports = Reports::where('hospital_id',Auth::user()->id)->limit(3)->orderby('id','DESC')->get();
            $view->with('reports',$reports);
        });
		view()->composer('doctor.layouts.topbar', function($view){
            $docreports = Reports::where('doctor_id',Auth::user()->id)->limit(3)->orderby('id','DESC')->get();
            $view->with('docreports',$docreports);
        });
		
		view()->composer('hospital.layouts.topbar', function($view){
			$latestreports = Reports::where('hospital_id',Auth::user()->id)->where('hospital_status','1')->count();
            $view->with('latestreports',$latestreports);
        });
		
		view()->composer('doctor.layouts.topbar', function($view){
			$doclatestreports = Reports::where('doctor_id',Auth::user()->id)->where('doctor_status','1')->count();
            $view->with('doclatestreports',$doclatestreports);
        });
    }
}
