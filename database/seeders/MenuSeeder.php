<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        $menus = [
            [
                'sequence' => $count++,
                'title' => 'Dashboard',
                'code' => 'dashboard',
                'icon' => 'bi bi-bar-chart-line',
                'slug' => 'dashboard',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Students',
                'code' => 'students',
                'icon' => 'bi bi-person-vcard',
                'slug' => 'students',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Host Families',
                'code' => 'host_families',
                'icon' => 'bi bi-people',
                'slug' => 'host-families',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Schools',
                'code' => 'schools',
                'icon' => 'bi bi-building',
                'slug' => 'schools',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Offices',
                'code' => 'offices',
                'icon' => 'bi bi-briefcase',
                'slug' => 'offices',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Airports',
                'code' => 'airports',
                'icon' => 'bi bi-airplane',
                'slug' => 'airports',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Programs',
                'code' => 'programs',
                'icon' => 'bi bi-journal-text',
                'slug' => 'programs',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Local Coordinators',
                'code' => 'local_coordinators',
                'icon' => 'bi bi-person-badge',
                'slug' => 'local-coordinators',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Partner Abroad',
                'code' => 'partner_abroad',
                'icon' => 'bi bi-globe-americas',
                'slug' => 'partner-abroad',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Permissions',
                'code' => 'permissions',
                'icon' => 'bi bi-gear',
                'slug' => 'permissions',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sequence' => $count++,
                'title' => 'Change Password',
                'code' => 'change_password',
                'icon' => 'bi bi-lock',
                'slug' => 'auth/change-password',
                'parent_id' => null,
                'has_child' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Menu::insert($menus);
    }
}
