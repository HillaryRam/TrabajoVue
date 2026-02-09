<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    public static function fieldLabels()
    {
        return [
            'name' => 'Nombre',
            'description' => 'Descripción',
            'hours' => 'Horas',
            'start_date' => 'Fecha de inicio',
        ];
    }
}