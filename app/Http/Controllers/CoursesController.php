<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoursesController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->object();
    }

    public function index()
    {
        return redirect()->route('course.create');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Courses.show', compact('course', 'areas', 'training_centers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = collect($this->fetchDataFromApi($url . '/courses'));
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Courses.create', compact('courses', 'areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_number' => 'required',
            'day' => 'required',
            'area_id' => 'required',
            'training_center_id' => 'required',
        ]);

        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/courses', $request->only(
            'course_number',
            'day',
            'area_id',
            'training_center_id'
        ));

        if ($response->failed()) {
            return back()->withInput()->withErrors([
                'api' => $response->body() ?: 'No se pudo guardar el curso.',
            ]);
        }

        return redirect()->route('course.create')->with('success', 'Curso guardado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Courses.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_number' => 'required',
            'day' => 'required',
            'area_id' => 'required',
            'training_center_id' => 'required',
        ]);

        $url = env('URL_SERVER_API');
        $response = Http::put($url . '/courses/' . $id, $request->only(
            'course_number',
            'day',
            'area_id',
            'training_center_id'
        ));

        if ($response->failed()) {
            return back()->withInput()->withErrors([
                'api' => $response->body() ?: 'No se pudo actualizar el curso.',
            ]);
        }

        return redirect()->route('course.create')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/courses/' . $id);
        return redirect()->route('course.create');
    }
}
