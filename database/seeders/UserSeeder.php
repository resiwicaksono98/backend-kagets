<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Resi Wicaksono',
                'email' => 'resi@thonkwaq.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'username' => 'Wakwak',
                'phone_number' => '081311290187',
                'address' => 'Taman Sari',
                'picture_path' => "ssdsd22",
                'mitra_type' => 'GO-RIDE'
            ],
            [
                'name' => 'Jenab',
                'email' => 'jenab@thonkwaq.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'username' => 'Jens',
                'phone_number' => '081311290222',
                'address' => 'Taman Indah',
                'picture_path' => "ssdsd22",
                'mitra_type' => 'GO-CAR'
            ],
            [
                'name' => 'Roger',
                'email' => 'roger@thonkwaq.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'username' => 'Gold Roger',
                'phone_number' => '0811231290222',
                'address' => 'Taman Bumi',
                'picture_path' => "ssdsd22222",
                'mitra_type' => 'GO-FOOD'
            ],
        ])->each(function($user){
            \App\Models\User::create($user);
        });

       
    }
}
