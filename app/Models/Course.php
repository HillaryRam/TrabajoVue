<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public static function fieldLabels()
    {
        return [
            'name' => 'Nombre',
            'description' => 'Descripción',
        ];
    }
}
