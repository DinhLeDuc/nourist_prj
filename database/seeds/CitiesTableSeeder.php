<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $string = file_get_contents(public_path('json/citys.json'));
        $jsonDatas = json_decode($string, true);

        $citys = [];
        foreach ($jsonDatas as $data) {
            array_push($citys, [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'code' => $data['code'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('citys')->insert($citys);
    }
}
