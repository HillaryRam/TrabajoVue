<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cards = [
            "teachers" => [
                "title" => "Profesores",
                "description" => "Mostrar lista de profesores",
                "img" => "img/profesores.png",
                "action" => "teachers",

            ],

            "students" => [
                "title" => "Alumnos",
                "description" => "Mostrar lista de alumnos",
                "img" => "img/estudiantes.png",
                "action" => "students"
            ],

            "users" => [
                "title" => "Usuarios",
                "description" => "Mostrar lista de usuarios",
                "img" => "img/usuario.png",
                "action" => "users"
            ],

            "projects" => [
                "title" => "Proyectos",
                "description" => "Mostrar lista de proyectos",
                "img" => "img/proyectos.png",
                "action" => "projects"
            ],

            "courses" => [
                "title" => "Cursos",
                "description" => "Mostrar lista de cursos",
                "img" => "img/cursos.png",
                "action" => "courses"
            ],

        ];
        return Inertia::render("Dashboard", [
            "cards" => $cards
        ]);
    }
}
