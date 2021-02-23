<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{
    public function index()
    {
        $booking = Booking::Latest()->get();
        
        return response()->json($booking, 200);
    }
    
   
    public function create(Request $request)
    {  
          

    }
    public function store(Request $request)
    
        {
            $validator = Validator::make($request->all(), [
                'service' => 'required',
                'start' => 'required',
                'end' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                
            ]);
    
    
            if ($validator->fails()) {
    
                return response()->json(['error'=>$validator->errors()->all()]);
                
            } else
              
            $booking = Booking::create($request->all());
    
            
            return view('calendar');
        }
    
 
   
 
 
    
}