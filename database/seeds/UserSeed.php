<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$muX9atZc/Q5OK04drIDIcuRQRT/d9zybt2F.ZWrAEdMH3YjIQWKOu', 'role_id' => 1, 'remember_token' => '', 'created_at' => '2016-11-01 15:31:35', 'updated_at' => '2016-11-01 15:31:35', 'deleted_at' => null],

        ];

        foreach ($items as $item) {
            $model = new \App\User();

            foreach ($item as $key => $value) {
                $model->{$key} = $value;
            }

            $model->save();
        }
    }
}
