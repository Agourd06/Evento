<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\organizer;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class organizerReservationController extends Controller
{
    public function CheckReservation()
    {
        $organizerId = organizer::where('user_id', Auth::id())->value('id');
        
        $reservations = Reservation::with('client.user', 'event', 'client')
        ->where('status', '0')
        ->whereHas('event', function ($query) use ($organizerId) {
            $query->where('organizer_id', $organizerId);
        })
        ->get();
        $resevationNotAcceptedCount = Reservation::where('status', '0')
    ->whereHas('event', function ($query) use ($organizerId) {
        $query->where('organizer_id', $organizerId);
    })
    ->count();

        return view('organizer.reservation', [





            'reservations' => $reservations,
            'resevationNotAcceptedCount' => $resevationNotAcceptedCount,

        ]);
    }

    public function AcceptReservation($reservation_id, $event_id)
    {
        $event = event::where('id', $event_id)->first();
        reservation::where('id', $reservation_id)->update([
            'status' => '1'
        ]);
        event::where('id', $event_id)->update([
            'setsLeft' => (int)$event->setsLeft - 1,
        ]);
        return redirect()->back()->with('success', 'Reservation Accepted Succefully');
    }
    public function DeclineReservation($reservation_id)
    {

        reservation::where('id', $reservation_id)->update([
            'status' => '2'
        ]);
        return redirect()->back()->with('success', 'Reservation Cancled Succefully');
    }
}
