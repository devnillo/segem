<?php

namespace App\Http\Services;

use App\Http\Repository\SchoolRepository;
use App\Models\School;

class SchoolService
{
    public function __construct(private SchoolRepository $schoolRepository)
    {
    }

    public function register(array $data): School
    {
        $school = $this->schoolRepository->register($data);

        return $school;
    }
}
