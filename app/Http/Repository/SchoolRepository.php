<?php

namespace App\Http\Repository;

use App\Models\School;

class SchoolRepository
{
    public function __construct()
    {
    }

    public function register(array $data): School
    {
        $school = School::create($data);

        return $school;
    }
}
