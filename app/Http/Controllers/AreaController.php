<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $areas = collect($this->fetchDataFromApi($url . '/areas'))
            ->map(fn($area) => (object) $area);

        return view('area.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $area = (object) $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.show', compact('area'));
    }


    public function create()
    {
        return view('area.create');
    }

      public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/areas',['name' => $request->name,]);

        return redirect()->route('area.index');
    }
    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = (object) $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/areas/' . $id, $request->all());

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id);
        return redirect()->route('area.index');
    }
}
