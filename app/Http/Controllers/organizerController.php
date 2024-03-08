<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\categorie;
use App\Models\organizer;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class organizerController extends Controller
{
    public function organizerIndex(Request $request)
    {
        $organizerId = organizer::where('user_id', Auth::id())->value('id');
        $categories = categorie::where('status', '0')->get();
        $events = event::where('organizer_id', $organizerId)->with('categorie')->get();
        $eventData = null;
        $event_id = $request->input('event_id');
        if ($event_id) {
            $eventData = event::with('categorie')->where('id', $event_id)->first();
        }

        $resevationNotAcceptedCount = Reservation::where('status', '0')
            ->whereHas('event', function ($query) use ($organizerId) {
                $query->where('organizer_id', $organizerId);
            })
            ->count();
        return view('organizer.organizer', [
            'categories' => $categories,
            'events' => $events,
            'eventData' => $eventData,
            'resevationNotAcceptedCount' => $resevationNotAcceptedCount,
        ]);
    }
    public function createEvent(Request $request)
    {

        $eventData = $request->validate(
            [
                'title' => ['required'],
                'location' => ['required'],
                'price' => ['required'],
                'date' => ['required'],
                'acceptation' => ['required'],
                'sets' => ['required'],
                'description' => ['required'],
                'categorie_id' => ['required'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],

            ],
            [
                'title.required' => 'Title is Required',
                'location.required' => 'location is Required',
                'price.required' => 'price is Required',
                'categorie_id.required' => 'categorie is Required',
                'date.required' => 'date is Required',
                'acceptation.required' => 'acceptation is Required Or Invalide Data',
                'description.required' => 'description is Required',
                'sets.required' => 'sets is Required',
                'image.required' => 'The image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                'image.max' => 'The image must not be larger than 2048 kilobytes.',
            ]
        );

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $eventData['image'] = $pictureName;
        }
        $eventData['organizer_id'] = organizer::where('user_id', Auth::id())->value('id');
        $eventData['setsLeft'] = $eventData['sets'];

        event::create($eventData);
        return redirect()->back()->with('success', 'Request Sent Succefully');;
    }
    public function update(event $event , Request $request ){

        $eventData = $request->validate(
            [
                'title' => ['required'],
                'location' => ['required'],
                'price' => ['required'],
                'date' => ['required'],
                'acceptation' => ['required'],
                'sets' => ['required'],
                'description' => ['required'],
                'categorie_id' => ['required'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],

            ],
            [
                'title.required' => 'Title is Required',
                'location.required' => 'location is Required',
                'price.required' => 'price is Required',
                'categorie_id.required' => 'categorie is Required',
                'date.required' => 'date is Required',
                'acceptation.required' => 'acceptation is Required Or Invalide Data',
                'description.required' => 'description is Required',
                'sets.required' => 'sets is Required',
                'image.required' => 'The image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                'image.max' => 'The image must not be larger than 2048 kilobytes.',
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $eventData['image'] = $pictureName;
        }
        $event->update($eventData);

    }
}
