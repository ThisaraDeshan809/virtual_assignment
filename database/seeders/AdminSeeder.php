<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'uuid' => '1bffe1cf-4d3c-470f-8f9d-dba855df80f8',
            'email' => 'admin2@virtual.com',
            'name' => 'Super Admin',
            'password' => '12345678',
        ]);
    }
}
