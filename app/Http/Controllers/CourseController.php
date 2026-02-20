<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $fieldsLabels = Course::fieldLabels();
        return Inertia::render('Courses/Index', [
            'rows' => $courses,
            'fields' => $fieldsLabels,
            'model' => [
                'name' => 'curso',
                'create_params' => [],
                'routes' => [
                    'create' => 'courses.create',
                    'edit' => 'courses.edit',
                    'delete' => 'courses.destroy'
                ]
            ]
        ]);
    }



    public function create()
    {
        $fieldsLabels = Course::fieldLabels();
        return Inertia::render('Courses/Create', [
            'fieldsLabels' => $fieldsLabels
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Course::create($validated);
        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $fieldsLabels = Course::fieldLabels();
        return Inertia::render('Courses/Edit', [
            'course' => $course,
            'fieldsLabels' => $fieldsLabels
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $course->update($validated);
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
