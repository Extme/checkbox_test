<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
include(app_path().'/includes/config.php');


class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run() {
    include(app_path().'/includes/config.php');
        
        // $this->call(UsersTableSeeder::class);
        
        DB::table('checkboxes')->delete();
            for ($i = 0; $i < $rows; $i++) {
                for ($ii = 0; $ii < $columns; $ii++){
                    DB::table('checkboxes')->insert([
                    'checkbox_row' => $i,
                    'checkbox_col'=>$ii,
                    'check' => false,
                  ]);
                }
        }
        
    }
}
