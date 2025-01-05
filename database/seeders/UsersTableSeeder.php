<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->truncate();
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'sadmin@admin.com',
            'password' => bcrypt('sadmin'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('Admin');

        $province = User::create([
            'name' => 'Province',
            'email' => 'province@admin.com',
            'password' => bcrypt('province'),
        ]);
        $province->assignRole('Province');

        $province = User::create([
            'name' => 'Unicef',
            'email' => 'unicef@admin.com',
            'password' => bcrypt('unicef@#'),
        ]);

        $province = User::create([
            'name' => 'GPE',
            'email' => 'gpe@admin.com',
            'password' => bcrypt('gpe@#'),
        ]);

        $province->assignRole('Province');

        $districtUser = User::create([
            'name' => 'District',
            'email' => 'district@admin.com',
            'password' => bcrypt('district'),
        ]);
        $districtUser->assignRole('District');
        $district = new UserDistrict();
        $district->name = 'BAHAWALNAGAR';
        $district->user_id = $districtUser->id;
        $district->save();
    }
}
