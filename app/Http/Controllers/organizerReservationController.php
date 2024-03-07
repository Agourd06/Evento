<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\reservation;
use Illuminate\Http\Request;

class organizerReservationController extends Controller
{
    public function CheckReservation()
    {

        $reservations = reservation::where('status', '0')
            ->with('client.user', 'event', 'client')
            ->get();
            $resevationNotAcceptedCount = reservation::where('status' , '0')->count('id');

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
    public function DeclineReservation($reservation_id, $event_id)
    {

        reservation::where('id', $reservation_id)->update([
            'status' => '2'
        ]);
        return redirect()->back()->with('success', 'Reservation Cancled Succefully');
    }
}
