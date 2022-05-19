<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with('service')->with('patient')->latest()->get();
        return view('Panel.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('Panel.appointments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app= Appointment::create([
            'date'=>$request->date,
             'comment'=> $request->comment,
            'serviceID'=>$request->service,
            'patientID'=>$request->patient,
             'doctorID'=> 1
        ]);
        if($app){
            return redirect()->route('appointments.index')->with(['done'=>'Sucess Create Appointment']);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $appointment = Appointment::with('service')->with('patient')->where(`id`,$id)->first();
        return view('Panel.appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $app= Appointment::update([
            'date'=>$request->date,
             'comment'=> $request->comment,
            'serviceID'=>$request->service,
            'patientID'=>$request->patient,
             'doctorID'=> 1
        ]);
        if($app){
            return redirect()->route('appointments.index')->with(['done'=>'Sucess edit Appointment']);

    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
