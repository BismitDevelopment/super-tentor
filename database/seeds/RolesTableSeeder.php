<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => __('voyager::seeders.roles.admin'),
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'free']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => __('Free User'),
                ])->save();
        }

        $role = Role::firstOrNew(['name' => 'premium']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => __('Premium User'),
                ])->save();
        }
    }
}
