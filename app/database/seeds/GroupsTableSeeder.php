<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder{

    public function run()
    {
        // Refresh groups
        DB::unprepared(DB::raw("SET FOREIGN_KEY_CHECKS = 0"));
        DB::table('groups')->truncate();
        DB::unprepared(DB::raw("SET FOREIGN_KEY_CHECKS = 1"));

        // Create the groups
        $groups = array(
            array(
                'name'        => 'User',
                'permissions' => array(
                    'is_admin' => 0,
                    'access_meeting' => 1,
                )
            ),

            // Admin
            array(
                'name'        => 'Admin',
                'permissions' => array(
                    'is_admin' => 1,
                    'access_meeting' => 1,
                )
            ),

            // Brand : Manager
            array(
                'name'        => 'Manager',
                'permissions' => array(
                    'is_admin' => 0,
                    'access_meeting' => 1,
                    'meeting_manage_details' => 1,
                )
            ),

        );

        foreach ($groups as $group) {
            Sentry::createGroup($group);
        }
    }
}
