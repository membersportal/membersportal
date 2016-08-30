<?php

use Illuminate\Database\Seeder;
use App\Carousel;

class CarouselsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $carousel1 = new Carousel();
      $carousel1->title = "Strategies in Finding Clients";
      $carousel1->desc = "Everywhere you look, everyone has an opinion about finding the idea client for your business. Look no further.";
      $carousel1->img = "carousel1.jpg";
      $carousel1->url = "https://www.entrepreneur.com/article/281154";
      $carousel1->save();

      $carousel2 = new Carousel();
      $carousel2->title = "Crowdfun or Bootstrap Your New Business";
      $carousel2->desc = "Some startups begin with a following while others take on the task of buidling their own. Which approach is best for you?";
      $carousel2->img = "carousel2.jpg";
      $carousel2->url = "https://www.entrepreneur.com/article/279987";
      $carousel2->save();
    }
}
