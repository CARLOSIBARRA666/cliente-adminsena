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

        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

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
        $url = env('URL_SERVER_API');

        $training_centers = collect($this->fetchDataFromApi($url . '/training-centers'));

        return view('Training_Center.create', compact('training_centers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/training-centers', $request->all());

        return redirect()->route('training_center.create');
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
