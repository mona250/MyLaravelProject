<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\County;
use App\State;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function getRegister()
    {
        $state = State::lists('state_name', 'id');
        $months = [
            '01' => 'فروردین',
            '02' => 'اردیبهشت',
            '03' => 'خرداد',
            '04' => 'تیر',
            '05' => 'مرداد',
            '06' => 'شهریور',
            '07' => 'مهر',
            '08' => 'آبان',
            '09' => 'آذر',
            '10' => 'دی',
            '11' => 'بهمن',
            '12' => 'اسفند'
        ];

        return view('admin.register', compact('state','months'));
    }


    public function getcountiesList(Request $request)
    {
        if ($request->ajax()) { //If it is a ajax request
            $StateID = $request->input('state_id');//Id State with Ajax gain
            if ($StateID > 0) {

                $CountyList = County::where('state_id', '=', (int)$StateID)->get();
                dd($CountyList);

                $TotalCounty = count($CountyList);
                $CountyArr = array('' => 'Select County Name');
                if ($TotalCounty > 0) {
                    foreach ($CountyList as $county_data) {
                        $CountyArr[$county_data->county_id] = $county_data->county_name;
                    }
                }
                echo Form::select('county', $CountyArr);
            }
        } else {
            echo 0;
        }
    }

    public function store(UserRequest $request)
    {
        $ee = $request->input('phone');

        $file = $request->file('photo');
        if ($file->isValid()) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/users';
            $file->move($destinationPath, $fileName);
            $birthday = $request->input('year') . '/' . $request->input('month') . '/' . $request->input('day');
            User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'birthday' => $birthday,
                'gender' => $request->input('gender'),
                'job' => $request->input('job'),
                'education' => $request->input('education'),
                'field_of_education' => $request->input('field_of_education'),
                'city' => $request->input('city'),
//                'state' => $request->input('state'),
//                'county' => $request->input('county'),
                'village' => $request->input('village'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'photo' => $fileName,
            ]);


        }


    }
}
