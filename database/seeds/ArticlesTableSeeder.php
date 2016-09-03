<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$article1 = new Article();
		$article1->heading = ;
		$article1->subheading = ;
		$article1->url = ;
		$article1->desc = ;
		$article1->img =;
		$article1->save();

		$article2 = new Article();
		$article2->heading = ;
		$article2->subheading = ;
		$article2->url = ;
		$article2->desc = ;
		$article2->img =;
		$article2->save();

		$article3 = new Article();
		$article3->heading = ;
		$article3->subheading = ;
		$article3->url = ;
		$article3->desc = ;
		$article3->img =;
		$article3->save();

		$article4 = new Article();
		$article4->heading = ;
		$article4->subheading = ;
		$article4->url = ;
		$article4->desc = ;
		$article4->img =;
		$article4->save();

		$article5 = new Article();
		$article5->heading = ;
		$article5->subheading = ;
		$article5->url = ;
		$article5->desc = ;
		$article5->img =;
		$article5->save();
	}
}
