<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\client;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    public function clientIndex()
    {
        $events = event::where('status', '1')->with('categorie')->get();
        return view('client.client', [
            'events' => $events,
        ]);
    }

    public function ReserveEvent($eventId)
    {
        try {
            $clientId = client::where('user_id', Auth::id())->value('id');
            $event = event::where('id', $eventId)->first();
            if ($event->setsLeft > '0') {
                if ($event->acceptation === 'manually') {
                    reservation::create(
                        [
                            'status' => '0',
                            'event_id' => $eventId,
                            'client_id' => $clientId,
                        ]
                    );
                  
                    return redirect()->back()->with('success', 'Request Sent successfully');
                } else {
                    reservation::create(
                        [
                            'status' => '1',
                            'event_id' => $eventId,
                            'client_id' => $clientId,
                        ]

                    );
                    event::where('id',$eventId)->update([
                        'setsLeft' => (int)$event->setsLeft - 1,
                    ]);
                    return redirect()->back()->with('success', 'Reserved');
                }
            } else {
                return redirect()->back()->with('error', 'Out Of Stock');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }
}
