<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EvntController extends Controller
{
    public function index()
    {

        $search = request("search");

        if($search) {
            $events = Event::where('title',  'like',  '%'.$search.'%')->orWhere('date',  'like',  '%'.$search.'%')->get();
        }
        else{
            $events = Event::all();

        }
        return view("welcome",["events"=>$events,"search"=>$search]);
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
        $event->items = $request->items;
        $event->date = $request->date;

        if($request->hasFile("image") && $request->file("image")->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path("img/events"),$imageName);

            $event->image = $imageName;
        }
        
        $event->save();

        return redirect("/")->with("msg","Evento criado com successo");
    }

    public function show($id){

        $event = Event::findOrFail($id);
        return view("event/show",["event" => $event]);
    }
}