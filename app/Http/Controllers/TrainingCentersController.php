<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCentersController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->object();
    }

 public function index()
{
    $url = env('URL_SERVER_API');

    $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'))
        ->map(fn ($training_center) => (object) $training_center);

    return view('Training_Center.index', compact('training_centers'));
}

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $training_center = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('Training_Center.show', compact('training_center'));
    }
    public function create()
    {
        return view('Training_Center.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

    $url = env('URL_SERVER_API');

    $file = $request->file('imagen');

    $response = Http::attach(
        'imagen',
        file_get_contents($file->getRealPath()),
        $file->getClientOriginalName()
    )->post($url . '/training-centers', [
        'name' => $request->name,
        'location' => $request->location,
    ]);

    if (!$response->successful()) {
        return back()->withErrors([
            'error' => $response->json('message') ?? 'No se pudo guardar el centro de formación.'
        ])->withInput();
    }

    return redirect()->route('training_center.index');
}
    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/training_centers/' . $id);
        return view('Training_Center.edit', compact('training_center'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/training-centers/' . $id, $request->all());

        return redirect()->route('training_center.create');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/training-centers/' . $id);
        return redirect()->route('training_center.create');
    }
}
