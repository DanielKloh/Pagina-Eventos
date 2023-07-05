<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EvntController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view("welcome",["events"=>$events]);
    }

    public function createEvent(){
        return view("event/create");    
    }


    public function store(request $request){

        $event = new Event();

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description= $request->description;
        
        $event->save();

        return redirect("/");
    }
}