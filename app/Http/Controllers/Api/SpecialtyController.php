<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    public function doctor(Specialty $specialty)
    {
        return $specialty->users()->get(
            [
                'users.id',
                'users.name',
            ]
        );
    }
}
