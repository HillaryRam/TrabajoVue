<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Course;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Gestión de Usuarios
     * @return \Inertia\Response
     * Método para mostrar, crear, guardar, editar, actualizar y eliminar
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
        return Inertia::render('Users/Create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        unset($validated['role']);

        $user = User::create($validated);
        // Default register as student if no role? Or just leave it without role if it's general?
        // Let's assume general users for now, but keeping the user's logic of assigning 'estudiante' if they want.
        $user->assignRole('estudiante');

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
        return redirect()->route('users.index');
    }

    /**
     * Listado de Alumnos
     * @return \Inertia\Response
     */
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
                    'create' => 'students.create',
                    'edit' => 'students.edit',
                    'delete' => 'students.destroy'
                ]
            ]
        ]);
    }

    /**
     * Listado de Profesores
     * @return \Inertia\Response
     */
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
                    'create' => 'teachers.create',
                    'edit' => 'teachers.edit',
                    'delete' => 'teachers.destroy'
                ]
            ]
        ]);
    }

    /**
     * Listado de Cursos
     * @return \Inertia\Response
     */
    public function getCourses()
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

    /**
     * Gestión de Alumnos
     * @param User $user
     * @return \Inertia\Response
     * Método para crear, guardar, editar, actualizar y eliminar
     */
    public function createStudent()
    {
        return Inertia::render('Students/Create');
    }

    public function storeStudent(StoreUserRequest $request)
    {
        $validated = $request->validated();
        unset($validated['role']);

        $user = User::create($validated);
        $user->assignRole('estudiante');

        return redirect()->route('students.index');
    }

    public function editStudent(User $user)
    {
        return Inertia::render('Students/Edit', [
            'student' => $user
        ]);
    }

    public function updateStudent(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('students.index');
    }

    public function destroyStudent(User $user)
    {
        $user->delete();
        return redirect()->route('students.index');
    }

    /**
     * Gestión de Profesores
     * @param User $user
     * @return \Inertia\Response
     * Método para crear, guardar, editar, actualizar y eliminar
     */
    public function createTeacher()
    {
        return Inertia::render('Teachers/Create');
    }

    public function storeTeacher(StoreUserRequest $request)
    {
        $validated = $request->validated();
        unset($validated['role']);

        $user = User::create($validated);
        $user->assignRole('profesor');

        return redirect()->route('teachers.index');
    }

    public function editTeacher(User $user)
    {
        return Inertia::render('Teachers/Edit', [
            'teacher' => $user
        ]);
    }

    public function updateTeacher(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('teachers.index');
    }

    public function destroyTeacher(User $user)
    {
        $user->delete();
        return redirect()->route('teachers.index');
    }


}
