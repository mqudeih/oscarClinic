<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\reception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreReceptionRequest;
use App\Http\Requests\UpdateReceptionRequest;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $reception = Reception::all();
        return view('Panel.reception.index3', compact('reception'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Panel.reception.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReceptionRequest  $request
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
                'status' => 3,
            ]);
            $recepte = Reception::create([
                'user_id ' => $user->id,
            ]);
            if ($recepte) {
                return redirect()->route('recepte.index')->with('success', 'Success Create reception');
            }
        } else {
            return redirect()->route('recepte.index')->withErrors($validate);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function show($recepte)
    {


        $recepte = Reception::with('user')->where('id',$recepte)->first();
        return view('Panel.reception.show', compact('recepte'));
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $recepte)
    {
        $reception = Reception::where('receptionId', $recepte)->first();

        return view('Panel.reception.edit', ['reception' => $reception]);
                 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceptionRequest  $request
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $Reception)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ])->validate();
        if ($validate) {
            $recepte = Reception::where('id', $Reception)->update([
                'status' => 2,
            ]);
            if ($recepte) {
                return redirect()->route('reception.index')->with('success', 'Success Update Reception');
            }
        } else {
            return redirect()->route('reception.edit', $Reception)->withErrors($validate);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        $recepte = Reception::findOrFail($reception);
        $recepte->delete();
        return redirect()->route('reception.index')->with('success', 'Success delete reception');

    }
}
