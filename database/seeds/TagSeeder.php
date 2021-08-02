<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Videogiochi',
            'Vue',
            'Escurisoni',
            'Pizze',
            'Manzotin'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($tag)->slug();
            $newTag->timestamps = false;
            $newTag->save();
        }
    }
}
