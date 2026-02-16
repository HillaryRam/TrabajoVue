<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function getStudents()
    {
        $students = User::role('estudiante')->get();
        return Inertia::render('Students/Index', [
            'students' => $students,
            'fields' => ['name' => 'Nombre', 'email' => 'Email'],
            'model' => [
                'name' => 'student',
                'routes' => [
                    'create' => 'users.create',
                    'edit' => 'users.edit',
                    'delete' => 'users.destroy'
                ]
            ]
        ]);
    }

    public function getTeachers()
    {
        $teachers = User::role('profesor')->get();
        return Inertia::render('Teachers/Index', [
            'teachers' => $teachers,
            'fields' => ['name' => 'Nombre', 'email' => 'Email'],
            'model' => [
                'name' => 'teacher',
                'routes' => [
                    'create' => 'users.create',
                    'edit' => 'users.edit',
                    'delete' => 'users.destroy'
                ]
            ]
        ]);
    }
}
