<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pateint = Patients::all();
        return view('Panel.pateint.index2', compact('pateint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Panel.pateint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request   $request)

    {
        //
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ])->validate();
        if ($validate) {
            $pateint = Patients::create([
                'phone' => $request['phone'],
                'DataOfBirth' => $request['DataOfBirth'],

            ]);
            if ($pateint) {
                return redirect()->route('pateint.index')->with('success', 'Success Create pateint');
            }
        } else {
            return redirect()->route('pateint.create')->withErrors($validate);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show($patients)
    {
        //
        $patient = Patients::findORFail($patients);
        return view('Panel.pateint.show', ['pateint' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        $patients = patients::where('idPateints', $patients)->first();

        return view('Panel.pateint.edit', ['pateint' => $patients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientsRequest  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patients)

    {
        $validate = Validator::make($request->all(), [
            'phone' => 'required|max:255'
        ])->validate();
        if ($validate) {
            $pateint = patients::where('idPateints', $patients)->update([
                'phone' => $request->name
            ]);
            if ($pateint) {
                return redirect()->route('pateint.index')->with('success', 'Success Update pateint');
            }
        } else {
            return redirect()->route('pateint.edit', $patients)->withErrors($validate);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($patients)
    {
        //
        $pateint = patients::findOrFail($patients);
        $pateint->delete();
        return redirect()->route('pateint.index')->with('success', 'Success delete patient');
    }
}
