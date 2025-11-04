<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherManagement extends Model
{
    use HasFactory;
    public static function getDesignationName($designation) {
        $designations = [
            1 => 'Principal',
            2 => 'Principal(Incharge)',
            3 => 'Vice Principal',
            4 => 'Head Master',
            5 => 'Head Master(Incharge)',
            6 => 'Assistant Head Master',
            7 => 'Senior Teacher',
            8 => 'Assistant Teacher',
            9 => 'Muallim',
            10 => 'Assistant Muallim',
            11 => 'Lecturer (Fazil/Kamil)',
            12 => 'Hafiz & Hafezia Instructor',
            13 => 'Arabic Teacher',
            14 => 'Quran Teacher',
            15 => 'Hadith Teacher'
        ];
        
        return $designations[$designation] ?? 'Teacher';
    }
}
