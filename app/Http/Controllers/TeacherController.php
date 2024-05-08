<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'first_name' => 'required|string|min:5|max:100',
            'surname' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1',
            'email' => 'required|string|min:5|max:100',
            'phone_number' => 'required|string|min:5|max:100',
            'gender' => 'required|integer|in:0,1',
        ]);*/

        Teacher::create($request->all());

        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id); // Obtener el objeto de la base de datos
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      /* $request->validate([
            'first_name' => 'required|string|min:5|max:100',
            'surname' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1',
            'email' => 'required|string|min:5|max:100',
            'phone_number' => 'required|string|min:5|max:100',            
            'gender' => 'required' // Validación para asegurar que el valor sea 'male' o 'female'
        ]);*/

        $teacher = Teacher::findOrFail($id);

        $teacher->update($request->all());

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
