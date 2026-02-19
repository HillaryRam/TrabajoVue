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
        $users = User::all();
        return Inertia::render('Users/Index', [
            'users' => $users,
            'fields' => ['name' => 'Nombre', 'email' => 'Email'],
            'model' => [
                'name' => 'usuario',
                'create_params' => [],
                'routes' => [
                    'create' => 'users.create',
                    'edit' => 'users.edit',
                    'delete' => 'users.destroy'
                ]
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Users/Create', [
            'role' => request('role')
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $role = $validated['role'] ?? null;
        unset($validated['role']);

        $user = User::create($validated);

        if ($role) {
            $user->assignRole($role);
            if ($role === 'estudiante') {
                return redirect()->route('students.index');
            } elseif ($role === 'profesor') {
                return redirect()->route('teachers.index');
            }
        }

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

        if ($user->hasRole('estudiante')) {
            return redirect()->route('students.index');
        } elseif ($user->hasRole('profesor')) {
            return redirect()->route('teachers.index');
        }

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
                'name' => 'estudiante',
                'create_params' => ['role' => 'estudiante'],
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
                'name' => 'profesor',
                'create_params' => ['role' => 'profesor'],
                'routes' => [
                    'create' => 'users.create',
                    'edit' => 'users.edit',
                    'delete' => 'users.destroy'
                ]
            ]
        ]);
    }
}
