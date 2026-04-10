<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // 1. Count all students in the database
        $totalStudents = Student::count();

        // 2. Count users who have the 'Teacher' role assigned via Spatie
        $totalTeachers = User::role('Teacher')->count();

        // 3. Count the number of unique classes currently assigned to students
        $totalClasses = Student::whereNotNull('class')->distinct('class')->count('class');

        // Pass the variables to the view
        return view('dashboard', compact('totalStudents', 'totalTeachers', 'totalClasses'));
    }
}
