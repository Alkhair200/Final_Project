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
            'imag' => 'required|mims:jpg,png',
            
        ]);

        $numCard = '';

        $num_card = 2151647;

        $num_card = Scurity_card::all()->last();

        if (empty($num_card )) {

            $numCard = 2151647;

        } else {

            $numCard = $num_card->num_card +2;
        }
    

        $randomNumber = rand(15,35);

        $randomize = rand(111111, 999999);
        $extension = $request->file('imag')->getClientOriginalExtension();
        $filename = $randomize . '.' . $extension;
        $image = $request->file('imag')->move('images/user/', $filename);

        Scurity_card::create([
            'name' => $request->name,
            'address' => $request->address,
            'berth_date' => $request->berth_date,
            'type_scur' => $request->type_scur,
            'dir_work' => $request->dir_work,
            'phone' => $request->phone,
            'imag' => $image,
            'num_card' => $numCard,
            'random_umber' => $randomNumber,
        ]);

        
        session()->flash('message', ' تم ارسال طلبك بنجاح سوف تتم معالجه طلبك خلال 24 ساعه رقم إستخراج البطاقه هو .' .$randomNumber);
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
            'num_card' => 'required',
        ]);

        $print = Scurity_card::where('status',1)->where('num_card',$request->num_card)->first();

        //  return $print = $status->($request->num_card)->get();

        if (empty($print)) {

            session()->flash('message', ' غير موجود.');
            return redirect()->back();

        }else{

            return view('print-card',compact('print'));
        }
        

    }

    public function printView()
    {
        return view('print-card');
    }

    public function print(Request $request)
    {
        $status = Scurity_card::where('status',1)->get();


        $print = Scurity_card::where('status',1)->where('random_umber',$request->random_umber)->first();

        if (!empty($print)) {
            return view('print-card',compact('print'));
        } else {
            session()->flash('message', 'هذه البيانات غير موجوده.');
            return redirect()->back();
        }
        
    }

}
