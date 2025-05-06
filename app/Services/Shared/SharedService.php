<?php

namespace App\Services\Shared;

class SharedService
{
    public static function showDefaultImage($student)
    {
        $photoPath = '/storage/student/' . $student->photo;
        $student->photo_url = $student->photo ? $photoPath : '/images/default.jpg';

        return $student;
    }
}
