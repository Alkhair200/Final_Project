<?php

namespace App\Http\Controllers;

use App\Models\Scurity_card;
use Illuminate\Http\Request;

class ScurityCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return vew('scur-card');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scurity_card  $scurity_card
     * @return \Illuminate\Http\Response
     */
    public function show(Scurity_card $scurity_card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scurity_card  $scurity_card
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $scurity_card = Scurity_card::findOrFail($id);
        return view('edit-card',compact('scurity_card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scurity_card  $scurity_card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $scurity_card = Scurity_card::findOrFail($id);

            $request->validate([
                'name' => 'required|min:3',
                'address' => 'required|min:3',
                'berth_date' => 'required',
                'type_scur' => 'required',
                'dir_work' => 'required',
                'phone' => 'required',
                
            ]);
    
            $scurity_card->update([
                'name' => $request->name,
                'address' => $request->address,
                'berth_date' => $request->berth_date,
                'type_scur' => $request->type_scur,
                'dir_work' => $request->dir_work,
                'phone' => $request->phone,
                'status' => $request->status,
            ]);
    
            session()->flash('message', 'تم تعديل البيانات بنجاح.');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scurity_card  $scurity_card
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $scurity_card = Scurity_card::findOrFail($id);
        $scurity_card->delete();
        
        session()->flash('message', 'تم حذف البيانات بنجاح.');
        return redirect()->back();
    }
}
