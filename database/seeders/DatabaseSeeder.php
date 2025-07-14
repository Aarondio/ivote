<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Faculty::create(['name' => 'Faculty of Computer Science']);
        Faculty::create(['name' => 'Faculty of Science and Technology']);
        Faculty::create(['name' => 'Faculty of Engineering']);
        Faculty::create(['name' => 'Faculty of Business']);
        Faculty::create(['name' => 'Faculty of Arts and Humanities']);
        Faculty::create(['name' => 'Faculty of Law']);
        Faculty::create(['name' => 'Faculty of Health Sciences']);
        Faculty::create(['name' => 'Faculty of Social Sciences']);

        Department::create(['name' => 'Department of Software Engineering', 'faculty_id' => 1]);
        Department::create(['name' => 'Department of Computer Science', 'faculty_id' => 1]);
        Department::create(['name' => 'Department of Data Science', 'faculty_id' => 1]);
        Department::create(['name' => 'Department of Cybersecurity', 'faculty_id' => 1]);
        Department::create(['name' => 'Department of Artificial Intelligence', 'faculty_id' => 1]);
        Department::create(['name' => 'Department of Physics', 'faculty_id' => 2]);
        Department::create(['name' => 'Department of Chemistry', 'faculty_id' => 2]);
        Department::create(['name' => 'Department of Electrical Engineering', 'faculty_id' => 3]);
        Department::create(['name' => 'Department of Business Administration', 'faculty_id' => 4]);
        Department::create(['name' => 'Department of English', 'faculty_id' => 5]);
        Department::create(['name' => 'Department of Law', 'faculty_id' => 6]);
        Department::create(['name' => 'Department of Medicine', 'faculty_id' => 7]);
        Department::create(['name' => 'Department of Pharmacy', 'faculty_id' => 7]);
        Department::create(['name' => 'Department of Sociology', 'faculty_id' => 8]);
        Department::create(['name' => 'Department of Political Science', 'faculty_id' => 8]);
    }
}
