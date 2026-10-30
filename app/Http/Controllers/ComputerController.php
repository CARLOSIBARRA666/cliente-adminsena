<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
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

        $computers = collect($this->fetchDataFromApi($url . '/computers'))
            ->map(fn($computer) => (object) $computer);

        return view('Computer.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = (object) $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('Computer.show', compact('computer'));
    }

    public function create()
    {
        return view('Computer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
            'brand' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach(
            'imagen',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post($url . '/computers', [
            'number' => $request->number,
            'brand' => $request->brand,
        ]);

        if (!$response->successful()) {
            return back()->withErrors([
                'error' => $response->json('message') ?? 'No se pudo guardar el computador.'
            ])->withInput();
        }

        return redirect()->route('computer.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $computer = (object) $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/computers/' . $id, $request->all());

        return redirect()->route('computer.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/computers/' . $id);

        return redirect()->route('computer.index');
    }
}
