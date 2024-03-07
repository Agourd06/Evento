<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\categorie;
use App\Models\organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class organizerController extends Controller
{
    public function organizerIndex()
    {
        $categories = categorie::where('status', '0')->get();
        $events = event::with('categorie')->get();

        return view('organizer.organizer', [
            'categories' => $categories,
            'events' => $events,
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

 
}
