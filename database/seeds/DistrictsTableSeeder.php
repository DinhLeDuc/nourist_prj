<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $string = file_get_contents(public_path('json/districts.json'));
        $jsonDatas = json_decode($string, true);

        $districts = [];
        foreach ($jsonDatas as $data) {
            array_push($districts, [
                'parent_code' => $data['parent_code'],
                'code' => $data['code'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'type' => $data['type'],
                'path' => $data['path'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('districts')->insert($districts);
    }
}
