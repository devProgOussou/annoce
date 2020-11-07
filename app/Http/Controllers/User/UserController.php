<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all()->where('user_id', Auth::user()->id);
        return Inertia::render('User/Index', [
            'Advertisements' => $advertisements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->input('type');
        if($type == 'P')
        {
            $personal = new Personal();
            $personal->civility = $request->input('civility');
            $personal->address = $request->input('address');
            $personal->phone = $request->input('phone');
            $personal->user_id = Auth::user()->id;
            $personal->save();
            return redirect()->route('advertisements.index');
        }
        else {
            $company = new Company();
            $company->civility = $request->input('civility');
            $company->company = $request->input('company');
            $company->address = $request->input('address');
            $company->phone = $request->input('phone');
            $company->user_id = Auth::user()->id;
            $company->save();
            return redirect()->route('advertisements.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        return Inertia::render('User/Show');
    }

}
