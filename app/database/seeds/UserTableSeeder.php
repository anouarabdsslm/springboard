<?php
use Illuminate\Database\Seeder;

class UserTableSeeder  extends Seeder{
    public function run()
    {

        // Refresh users
        $sql = <<<'EOL'
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE users;
SET FOREIGN_KEY_CHECKS=1;
EOL;

        DB::unprepared($sql);

        $anouar = array(
            'first_name' => 'Anouar',
            'last_name' => 'Abdessalam',
            'email' => 'anouar@test.com',
            'password' => 'xroot',
            'activated' => true,
        );
        Sentry::createUser($anouar, true);

        $ahmed = array(
            'first_name' => 'Ahmed',
            'last_name' => 'Ahmed',
            'email' => 'ahmed@test.com',
            'password' => 'xroot',
            'activated' => true,
        );
        Sentry::createUser($ahmed, true);


    }
} 