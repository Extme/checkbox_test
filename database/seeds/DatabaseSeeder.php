<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run() {
        
        // $this->call(UsersTableSeeder::class);
        
        
        DB::table('head')->delete();
        DB::update("ALTER TABLE head AUTO_INCREMENT=1");
        DB::table('head')->insert([
            'fio' => 'Филимон Борис Панкратович',
            'position' => 'head of company',
            'employment_date' => '1967-01-02',
            'salary' => '3000',
        ]);
        
        DB::table('regionalManagers')->delete();
        DB::update("ALTER TABLE regionalManagers AUTO_INCREMENT=1");
        for ($i = 0; $i < 5; $i++) {
            $faker = \Faker\Factory::create('ru_RU');
            DB::table('regionalManagers')->insert([
                'fio' => $faker->name,
                'position' => 'regional manager',
                'employment_date' => $faker->date,
                'salary' => '2000',
                'chiefID' => '1',
            ]);
        }
         
        DB::table('branchDirectors')->delete();
        DB::update("ALTER TABLE branchDirectors AUTO_INCREMENT=1");
        for ($i = 0; $i < 100; $i++) {
            $faker = \Faker\Factory::create('ru_RU');
            DB::table('branchDirectors')->insert([
                'fio' => $faker->name,
                'position' => 'branch director',
                'employment_date' => $faker->date,
                'salary' => '1500',
                'chiefID' => $faker->numberBetween(1,5),
            ]);
        }
        
        DB::table('departmentHeads')->delete();
        DB::update("ALTER TABLE departmentHeads AUTO_INCREMENT=1");
        for ($i = 0; $i < 1000; $i++) {
            $faker = \Faker\Factory::create('ru_RU');
            DB::table('departmentHeads')->insert([
                'fio' => $faker->name,
                'position' => 'department head',
                'employment_date' => $faker->date,
                'salary' => '1000',
                'chiefID' => $faker->numberBetween(1,100),
            ]);
        }
        
        DB::table('staffMembers')->delete();
        DB::update("ALTER TABLE staffMembers AUTO_INCREMENT=1");
        for ($i = 0; $i < 50000; $i++) {
            $faker = \Faker\Factory::create('ru_RU');
            DB::table('staffMembers')->insert([
                'fio' => $faker->name,
                'position' => 'staff member',
                'employment_date' => $faker->date,
                'salary' => '550',
                'chiefID' => $faker->numberBetween(1,1000),
            ]);
        }      
    }
}
