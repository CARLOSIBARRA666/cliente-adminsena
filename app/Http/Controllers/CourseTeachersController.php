<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseTeachersController extends Controller
{
    private function api()
    {
        return rtrim(env('URL_SERVER_API', 'http://api.adminsena.test/v1'), '/');
    }

    public function index()
    {
        $course_teachers = collect(Http::get($this->api() . '/course_teachers')->object() ?? []);
        return view('Course_Teacher.index', compact('course_teachers'));
    }

    public function create()
    {
        $course_teachers = collect(Http::get($this->api() . '/course_teachers')->object() ?? []);
        $courses = collect(Http::get($this->api() . '/courses')->object() ?? []);
        $teachers = collect(Http::get($this->api() . '/teachers')->object() ?? []);

        return view('Course_Teacher.create', compact('course_teachers', 'courses', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'teacher_id' => 'required',
        ]);

        Http::post($this->api() . '/course_teachers', $request->only('course_id', 'teacher_id'));

        return redirect()->route('course_teacher.create')->with('success', 'Asignación guardada correctamente.');
    }

    public function show($id)
    {
        $course_teacher = Http::get($this->api() . '/course_teachers/' . $id)->object();
        if (! $course_teacher) {
            return redirect()->route('course_teacher.create')->with('error', 'No se encontró la asignación.');
        }
        return view('Course_Teacher.show', compact('course_teacher'));
    }

    public function edit($id)
    {
        $course_teacher = Http::get($this->api() . '/course_teachers/' . $id)->object();
        if (! $course_teacher) {
            return redirect()->route('course_teacher.create')->with('error', 'No se encontró la asignación.');
        }
        $courses = collect(Http::get($this->api() . '/courses')->object() ?? []);
        $teachers = collect(Http::get($this->api() . '/teachers')->object() ?? []);

        return view('Course_Teacher.edit', compact('course_teacher', 'courses', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'nullable',
            'teacher_id' => 'nullable',
        ]);

        Http::put($this->api() . '/course_teachers/' . $id, $request->only('course_id', 'teacher_id'));

        return redirect()->route('course_teacher.create')->with('success', 'Asignación actualizada correctamente.');
    }

    public function destroy($id)
    {
        Http::delete($this->api() . '/course_teachers/' . $id);
        return redirect()->route('course_teacher.create')->with('success', 'Asignación eliminada correctamente.');
    }
}
