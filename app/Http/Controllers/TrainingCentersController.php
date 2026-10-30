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
        return redirect()->route('training_center.create');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $training_center = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('Training_Center.show', compact('training_center'));
    }
    public function create()
    {
        $url = env('URL_SERVER_API');
        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Training_Center.create', compact('training_centers'));
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

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/trainingcenter',['name' => $request->name, 'location'=>$request->location,]);

        return redirect()->route('trainingcenter.index');
    }


    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $training_center = $this->fetchDataFromApi($url . '/training-centers/' . $id);
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
