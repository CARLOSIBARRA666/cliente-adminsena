<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->object();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $teachers = collect($this->fetchDataFromApi($url . '/teachers'));
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Teachers.index', compact('teachers', 'areas', 'training_centers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('Teachers.show', compact('teacher'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $teachers = collect($this->fetchDataFromApi($url . '/teachers'));
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Teachers.create', compact('teachers', 'areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/teachers', $request->all());

        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $areas = collect($this->fetchDataFromApi($url . '/areas'));
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Teachers.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/teachers/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id);
        return redirect()->route('teacher.index');
    }
}