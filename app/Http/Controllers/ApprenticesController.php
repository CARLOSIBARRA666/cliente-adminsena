<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticesController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->object();
    }

    public function index()
    {
        return redirect()->route('apprentice.create');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $courses = collect($this->fetchDataFromApi($url . '/courses'));
        $computers = collect($this->fetchDataFromApi($url . '/computers'));

        return view('Apprentices.show', compact('apprentice', 'courses', 'computers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $apprentices = collect($this->fetchDataFromApi($url . '/apprentices'));
        $courses = collect($this->fetchDataFromApi($url . '/courses'));
        $computers = collect($this->fetchDataFromApi($url . '/computers'));

        return view('Apprentices.create', compact('apprentices', 'courses', 'computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);

        $url = env('URL_SERVER_API');
        $response = Http::post($url . '/apprentices', $request->only(
            'name',
            'email',
            'number',
            'course_id',
            'computer_id'
        ));

        if ($response->failed()) {
            return back()->withInput()->withErrors([
                'api' => $response->status() === 404
                    ? 'La API no encontró la ruta para guardar aprendices.'
                    : ($response->json('message') ?: 'No se pudo guardar el aprendiz. Código: ' . $response->status()),
            ]);
        }

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz guardado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $courses = collect($this->fetchDataFromApi($url . '/courses'));
        $computers = collect($this->fetchDataFromApi($url . '/computers'));

        return view('Apprentices.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ]);

        $url = env('URL_SERVER_API');
        $response = Http::put($url . '/apprentices/' . $id, $request->only(
            'name',
            'email',
            'number',
            'course_id',
            'computer_id'
        ));

        if ($response->failed()) {
            return back()->withInput()->withErrors([
                'api' => $response->status() === 404
                    ? 'La API no encontró la ruta para actualizar aprendices.'
                    : ($response->json('message') ?: 'No se pudo actualizar el aprendiz. Código: ' . $response->status()),
            ]);
        }

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentices/' . $id);

        return redirect()->route('apprentice.create');
    }
}
