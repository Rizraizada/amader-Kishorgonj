<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function district(int $division_id){
        $districts = DB::table('districts')
            ->where('division_id', $division_id)
            ->pluck('district_name_bn','district_id');
        return json_encode($districts);
    }

    public function thana(int $district_id){
        $thanas = DB::table('thanas')
            ->where('district_id', $district_id)
            ->pluck('thana_nameb','thana_id');
        return json_encode($thanas);
    }

    public function union(int $thana_id){
        $unions = DB::table('unions')
            ->where('thana_id', $thana_id)
            ->pluck('union_nameb','union_id');
        return json_encode($unions);
    }

    public function aboutUs() {
        return view('about-us');
    }

    public function contactUs() {
        return view('contact-us');
    }

    public function command() {
        \Artisan::call('config:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('clear-compiled');
        \Artisan::call('optimize');
        echo 'Your command !';
    }
}
