<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $booking = Booking::all();
        return view('calendar');
    }
    
   
    public function create(Request $request)
    {  
          

    }
    public function store(Request $request)
    
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                
            ]);
    
    
            if ($validator->fails()) {
    
                return response()->json(['error'=>$validator->errors()->all()]);
                
            } else
              
            $booking = Booking::create($request->all());
    
            
            return response()->json(['success'=>'Added new records.']);
        }
    
 
   
 
 
    
}