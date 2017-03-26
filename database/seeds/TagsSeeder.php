<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagList = [
            ['title' => 'Спорт', 'slug' => str_slug('Спорт')],
            ['title' => 'Политика', 'slug' => str_slug('Политика')],
            ['title' => 'Культура', 'slug' => str_slug('Культура')],
            ['title' => 'Призидент', 'slug' => str_slug('Призидент')],
            ['title' => 'Финансы', 'slug' => str_slug('Финансы')],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $tagsTable = DB::table('tags');

        $tagsTable->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $tagsTable->insert($tagList);

        if(\App\Article::first()){
            $articles = \App\Article::all();
            $tagList = \App\Tag::pluck('id')->toArray();

            foreach($articles as $article){
                $randIds = array_rand($tagList, rand(2, 4));
                $intersect = array_intersect($randIds, $tagList);

                $article->tags()->attach($intersect);
            }
        }
    }
}
