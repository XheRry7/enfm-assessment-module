<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::all(['id', 'company', 'campName', 'address',
            'city',
            'country',
            'telephoneNumber',
            'campBoss',
            'emailId',
            'totalfloors']);
        return response()->json($camps);
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
        $camp = Camp::create($request->post());
        return response()->json([
            'message' => 'Camp Created Successfully!!!',
            'camp' => $camp,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function show(Camp $camp)
    {
        return response()->json($camp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function edit(Camp $camp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camp $camp)
    {
        {
            $camp->fill($request->post())->save();

            return response()->json([
                'message' => 'Camp Updated Successfully!!!',
                'camp' => $camp,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camp $camp)
    {
        $camp->delete();
        return response()->json([
            'message' => 'Camp Deleted Successfully!!!',
        ]);
    }
}
