<?php
 namespace Database\Seeders;

use Illuminate\Database\Seeder;
 use App\Models\Admin;
 
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Rahul',
            'email' => 'rahulsinha5324@gmail.com',
            'password' => bcrypt('rahul5324'),
        ]);

    }
}