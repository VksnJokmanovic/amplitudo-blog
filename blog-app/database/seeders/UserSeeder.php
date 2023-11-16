<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name'=>'testuser',
            'email'=>'test@email.com',
            'password'=>'123'
        ]);
        User::query()->create([
            'name'=>'test',
            'email'=>'test0@email.com',
            'password'=>'$2y$10$U1CAKNNOTekdMgt2MByuN.45wGsmtIyxci8YlPBLCD49dDPwDqmgW',
            'is_admin'=>true
        ]);
    }
}
