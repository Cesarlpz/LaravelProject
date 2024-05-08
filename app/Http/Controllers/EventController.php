<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Valida la solicitud
         $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Crea un nuevo evento con los datos de la solicitud
        Event::create($request->all());

        // Redirige a la página de lista de eventos
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id); // Obtener el objeto de la base de datos
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Valida la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'start_datetime' => 'required|date',
        'location' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    $event = Event::findOrFail($id);

    // Convierte el formato de fecha y hora
    $start_datetime = Carbon::parse($request->start_datetime);

    // Actualiza los atributos del evento
    $event->name = $request->name;
    $event->description = $request->description;
    $event->start_datetime = $start_datetime;
    $event->location = $request->location;
    $event->status = $request->status;

    // Guarda los cambios
    $event->save();

    return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }
}
