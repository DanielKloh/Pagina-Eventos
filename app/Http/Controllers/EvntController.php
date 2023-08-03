<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;

class EvntController extends Controller
{
    public function index()
    {

        $search = request("search");

        if ($search) {
            $events = Event::where('title', 'like', '%' . $search . '%')->orWhere('date', 'like', '%' . $search . '%')->get();
        } else {
            $events = Event::all();

        }
        return view("welcome", ["events" => $events, "search" => $search]);
    }

    public function createEvent()
    {
        return view("event/create");
    }


    public function store(request $request)
    {

        $event = new Event();

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;
        $event->participantes = $request->participantes;

        if ($request->hasFile("image") && $request->file("image")->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect("/")->with("msg", "Evento criado com successo");
    }

    public function show($id)
    {

        $event = Event::findOrFail($id);

        $eventOwner = User::where("id", $event->user_id)->first()->toArray();

        return view("event/show", ["event" => $event], ["eventOwner" => $eventOwner]);
    }

    public function dashboard()
    {

        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipantes = $user->eventsAsParticipantes;

        return view("event/dashboard", ["events" => $events, "eventsAsParticipantes" => $eventsAsParticipantes]);
    }


    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect("/dashboard")->with("msg", "Evento excluido com sucesso");
    }


    public function edit($id)
    {
        $user = auth()->user();

        $event = Event::FindOrFail($id);

        if ($user->id != $event->user_id) {

            return redirect("/dashboard");
        }

        return view("/event/edit", ["event" => $event]);
    }

    public function update(request $request)
    {

        $data = $request->all();



        if ($request->hasFile("image") && $request->file("image")->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $data["image"] = $imageName;
        }

        Event::FindOrFail($request->id)->update($data);
        return redirect("/dashboard")->with("msg", "Evento modificado com sucesso");

    }


    public function joinEvent($id)
    {


        $user = auth()->user();

        $user->eventsAsParticipantes()->attach($id);


        $event = Event::FindOrFail($id);

        return redirect("/dashboard")->with("msg", "Presensa confirmada " . $event->title);

    }
}