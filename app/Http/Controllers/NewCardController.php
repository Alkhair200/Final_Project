<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scurity_card;

class NewCardController extends Controller
{
    public function index()
    {
        return view('new-card');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'berth_date' => 'required',
            'type_scur' => 'required',
            'dir_work' => 'required',
            'phone' => 'required',
            
        ]);

        $num_card = 151647;
        Scurity_card::create([
            'name' => $request->name,
            'address' => $request->address,
            'berth_date' => $request->berth_date,
            'type_scur' => $request->type_scur,
            'dir_work' => $request->dir_work,
            'phone' => $request->phone,
            'num-card' => $num_card +2,
        ]);

        session()->flash('message', ' تم ارسال طلبك بنجاح سوف تتم معالجه طلبك خلال 24 ساعه.');
        return redirect()->back();
    }


    function updateCard(Request $request){
        return  $request;

    }

    function expireCardView(){
        return view('expire-card');
    }
    function expireCard(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'num_card' => 'required',
        ]);
        
         $num = floatval($request->num_card);
         $num_card = Scurity_card::where('num_card',$num)->get()->first();

        if (!empty($num_card)) {
            
            $num_card->update([
                'num_card' => $num,
            ]);

            session()->flash('message', 'تم تجديد صلاحية بطاقتك بنجاح.');
            return redirect()->back();
            
        } else {
           
            session()->flash('message', 'لا يوجد بطاقه بهذا الاسم !.');
            return redirect()->back();
        }
    

    }


    function loseCardView(){

        return view('lose-card');
    }

    function loseCard(Request $request){
        
        $request->validate([
            'name' => 'required|min:3',
            'num-card' => 'required',
        ]);

        session()->flash('message', 'تم ارسال طلبك بنجاح سوف تتم معالجه طلبك خلال 24 ساعه.');
        return redirect()->back();
    }

}
