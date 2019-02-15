<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'model_name' => 'category_thumbnail',
        		'url' => 'https://i.ytimg.com/vi/F7SNEdjftno/maxresdefault.jpg',
        		'model_id' => 1
        	],
        	[
        		'model_name' => 'category_thumbnail',
        		'url' => 'https://www.irishtimes.com/polopoly_fs/1.3761537.1547739102!/image/image.jpg_gen/derivatives/box_620_330/image.jpg',
        		'model_id' => 2
        	],
        	[
        		'model_name' => 'category_thumbnail',
        		'url' => 'https://www.wybostonlakes.co.uk/img/temp/b1-02.jpg',
        		'model_id' => 3
        	],
        	[
        		'model_name' => 'category_thumbnail',
        		'url' => 'https://rtcbusinesspark.co.uk/wp-content/uploads/2016/10/shutterstock_276522095.jpg',
        		'model_id' => 4
        	],
        	[
        		'model_name' => 'category_thumbnail',
        		'url' => 'http://www.servcorp.com/media/5279/one-world-trade-center-new-york-feature.jpg',
        		'model_id' => 5
        	]
        ];
    DB::table('media')->insert($data);
    factory(App\Media::class, 500)->create();
    }
}
