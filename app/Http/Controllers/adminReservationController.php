<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class adminReservationController extends Controller
{
    
    public function CheckEvents(){

        $events = Event::where('status', '0')->with('categorie')->get();
        return view('admin.eventsAccept' , [
            'events' => $events,
         ]);
    }
    public function AcceptEvents(Request $request){

       event::where('id' , $request->event_id)->update([
        'status' => '1'
       ]);
       return redirect()->back()->with('success', 'Event Accepted Succefully');
    }
    public function DeclineEvents(Request $request){

       event::where('id' , $request->event_id)->update([
        'status' => '2'
       ]);
       return redirect()->back()->with('success', 'Event Cancled Succefully');
    }
}
