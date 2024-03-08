<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\client;
use App\Models\categorie;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    public function clientIndex(Request $request)
    {
        $query = event::where('status', '1')->with('categorie');

        if ($request->input('filterTitle')) {

            $query = $query->where('title', 'like', '%' . $request->input('filterTitle') . '%');
        }
        if ($request->input('filterCategorie')) {
            $query = $query->where('categorie_id', $request->input('filterCategorie'));
        }
        if ($request->input('filterPrice') !== null && $request->input('filterPrice') === '100/500') {

            $query = $query->where(function ($query) {
                $query->whereRaw('ROUND(price) >= ?', [100])
                    ->whereRaw('ROUND(price) <= ?', [500]);
            });
        }
        if ($request->input('filterPrice') !== null && $request->input('filterPrice') === '500/1000') {

            $query = $query->where(function ($query) {
                $query->whereRaw('ROUND(price) >= ?', [500])
                    ->whereRaw('ROUND(price) <= ?', [1000]);
            });
        }
        if ($request->input('filterPrice') !== null && $request->input('filterPrice') === '1000/1500') {

            $query = $query->where(function ($query) {
                $query->whereRaw('ROUND(price) >= ?', [1000])
                    ->whereRaw('ROUND(price) <= ?', [1500]);
            });
        }
        if ($request->input('filterPrice') !== null && $request->input('filterPrice') === '1500/2000') {

            $query = $query->where(function ($query) {
                $query->whereRaw('ROUND(price) >= ?', [1500])
                    ->whereRaw('ROUND(price) <= ?', [2000]);
            });
        }


        $events = $query->paginate(2);
        $categories = categorie::all();
        return view('client.client', [
            'events' => $events,
            'categories' => $categories,
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
                    event::where('id', $eventId)->update([
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
    public function ticketsIndex()
    {
        $clientId = client::where('user_id', Auth::id())->value('id');
        $reservations =  reservation::where('status', '1')->where('client_id', $clientId)->with('event', 'client.user', 'client', 'event.categorie')->get();
        return view('client.clientTickets', [
            'reservations' => $reservations,
        ]);
    }
    public function ticket($reserv_id)
    {
        $reservation =  reservation::where('status', '1')->where('id', $reserv_id)->with('event', 'client.user', 'client', 'event.categorie')->first();
        return view('client.ticket', [
            'reservation' => $reservation,
        ]);
    }
}
