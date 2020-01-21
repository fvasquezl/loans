<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez@local.com',
            'password' => 'password'
        ]);

        $user->assignRole(1);

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez01@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(2);

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez02@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(3);

        $user = factory(User::class)->create([
            'name' => 'Faustino Vasquez Limon',
            'email' => 'fvasquez03@local.com',
            'password' => 'password'
        ]);
        $user->departments()->attach(2);
        $user->assignRole(3);

        factory(User::class, 5)->create();

    }
}
