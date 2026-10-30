<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->object();
    }

    public function index()
    {
        return redirect()->route('computer.create');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('Computer.show', compact('computer'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $computers = collect($this->fetchDataFromApi($url . '/computers'));

        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/computers', $request->all());

        return redirect()->route('computer.create');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);
        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/computers/' . $id, $request->all());

        return redirect()->route('computer.create');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/computers/' . $id);
        return redirect()->route('computer.create');
    }
}
