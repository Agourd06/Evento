<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\client;
use App\Models\categorie;
use App\Models\organizer;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class adminController extends Controller
{

    // ------------------------------Categorys----------------------------

    public function createCategory(Request $request)
    {

        $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'title')]
        ]
        ,

        [

            'name.unique' => 'Title Categorie Already existe',
            'name.required' => 'Title Categorie is required',
        ]);
        categorie::create([

            'title' => $request->name,

        ]);
        return  redirect('/admin');
    }
    //Softe Delete
    public function ArchiveCategorie(Request $request)
    {

        categorie::where('id', $request->categorieId)->update(['status' => $request->archiveCategory]);
        return redirect()->back();
    }
    //update categorie
    public function updateCategorie(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'categorieId' => ''
        ]);
        categorie::where('id', $request->categorieId)->update([
            'title' => $request->name,
        ]);
        return  redirect('/admin');
    }


    public function DashBoardAdmin(Request $request)
    {
        $categories = categorie::all();
        $client = client::count();
        $organizer = organizer::count();
        $Events = event::count();
        $Reservtions = reservation::count();

        //edit categorie
        $categorieEdit = null;

        if ($request->categorieId) {

            $categorieEdit = categorie::where('id', $request->categorieId)->first();
        }

        return view('admin.admin', [
            'categories' => $categories,
            'client' => $client,
            'organizer' => $organizer,
            'Events' => $Events,
            'Reservations' => $Reservtions,
            'categorieEdit' => $categorieEdit,
        ]);
    }
        // ------------------------------Users----------------------------
        public function managUsers(){
            $clients = client::with('user')->get();
            $organizers = organizer::with('user')->get();
            return view('admin.managUsers' , [
                'clients' => $clients,
                'organizers' => $organizers,
            ]);
        }
//softe delete users
        public function archiveUser(Request $request)
        {
    
            client::where('id', $request->clientId)->update(['status' => $request->archiveUs]);
            organizer::where('id', $request->organizerId)->update(['status' => $request->archiveUs]);
            return redirect()->back();
        }
}
