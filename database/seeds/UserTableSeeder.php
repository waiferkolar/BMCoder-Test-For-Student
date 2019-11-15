<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $filepath = public_path("files/users.json");
        $fileData = file_get_contents($filepath);
        $jsons = json_decode($fileData);

        foreach ($jsons as $user) {
            User::create([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "password" => bcrypt($user->password),
            ]);
        }
    }
}
