<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $doctors = doctors::with('service')->latest()->get();
        // return view('Panel.doctors.index', compact('doctors'));

        $doctors = Doctor::with('user')->get();
        return view('Panel.doctors.index4', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Panel.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ])->validate();
        if ($validate) {

            $user=User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'status' => 2,
            ]);
            $doc = Doctor::create([
                'User_id' => $user->id,
            ]);
            if ($doc) {
                return redirect()->route('doc.index')->with('success', 'Success Create doctor');
            }
        } else {
            return redirect()->route('doc.create')->withErrors($validate);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show( $doctor)
    {
        //

        $doctor = Doctor::with('user')->where('id', $doctor)->first();
        return view('Panel.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit( $doctor)
    {
        $doctor = Doctor::with('user')->where('id', $doctor)->first();
        return view('Panel.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor)
    {

        $validate = Validator::make($request->all(),[
            'name' => 'required|max:255'
      ])->validate();
      if($validate){
        $user=User::where('id',Doctor::where('id',$doctor)->first()->User_id)->update([
            'name' => $request['name'],
            
            'status' => 2,
        ]);
         if($user){
             return redirect()->route('doc.index')->with('success','Success Update doctor');
         }
      }else{
          return redirect()->route('doc.edit',$doctor)->withErrors($validate);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $doctor)
    {

        $doc = Doctor::findOrFail($doctor);
        User::where('id',$doc->User_id)->forceDelete();
        $doc->delete();
        return redirect()->route('doc.index')->with('success', 'Success delete doctor');
    }
}
