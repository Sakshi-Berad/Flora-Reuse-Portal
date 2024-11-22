<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Manufacturer']);
        Role::create(['name' => 'Raw Material Seller']);
        Role::create(['name' => 'End User']);
    }
}
