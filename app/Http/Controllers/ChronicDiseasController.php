<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChronicDiseas;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreChronicDiseasRequest;
use App\Http\Requests\UpdateChronicDiseasRequest;
use Illuminate\Validation\Validator as ValidationValidator;

class ChronicDiseasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chronicDiseas = ChronicDiseas::all();
        return view('Panel.chronicDiseas.index1',compact('chronicDiseas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Panel.chronicDiseas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChronicDiseasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
              'name' => 'required|max:255'
        ])->validate();
        if($validate){
            $cronic = ChronicDiseas::create([
               'name' => $request['name'],
            ]);
            if($cronic){
                return redirect()->route('chronic.index')->with('success','Success Create Cronic Diseas');
            }
        }else{
            return redirect()->route('chronic.create')->withErrors($validate);
            }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChronicDiseas  $chronicDiseas
     * @return \Illuminate\Http\Response
     */
    public function show( $chronicDiseas)
    {
        $chronic = ChronicDiseas::findORFail($chronicDiseas);
        return view('Panel.chronicDiseas.show', ['chronicDiseas'=> $chronic]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChronicDiseas  $chronicDiseas
     * @return \Illuminate\Http\Response
     */
    public function edit( $chronic)
    {
        $chronicDiseas = ChronicDiseas::where('IDdisease',$chronic)->first();
        
        return view('Panel.chronicDiseas.edit',['chronicDiseas' => $chronicDiseas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChronicDiseasRequest  $request
     * @param  \App\Models\ChronicDiseas  $chronicDiseas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chronicDiseas)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:255'
      ])->validate();
      if($validate){
         $chronic = ChronicDiseas::where('IDdisease',$chronicDiseas)->update([
             'name' => $request->name
         ]);
         if($chronic){
             return redirect()->route('chronic.index')->with('success','Success Update Cronic Diseas');
         }
      }else{
          return redirect()->route('chronic.edit',$chronicDiseas)->withErrors($validate);
          }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChronicDiseas  $chronicDiseas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $chronicDiseas)
    {
        $cronic= ChronicDiseas::findOrFail($chronicDiseas);
        $cronic->delete();
        return redirect()->route('chronic.index')->with('success','Success delete Cronic Diseas');
    }
}
