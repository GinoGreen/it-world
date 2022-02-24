<?php

use App\Premium_plan;
use Illuminate\Database\Seeder;

class PremiumPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $premium_plans = [
          [
            'name'=>'Lite'  ,
            'price'=> 2.99 ,
            'days' => 1
          ],
          [
            'name'=>'Premium'  ,
            'price'=> 5.99 ,
            'days' => 3
          ],
          [
            'name'=>'Elite'  ,
            'price'=> 9.99 ,
            'days' => 6
          ],
        ];

        foreach($premium_plans as $premium_plan){
            $new_premium_plan = new Premium_plan();
            $new_premium_plan->name = $premium_plan['name'];
            $new_premium_plan->price = $premium_plan['price'];
            $new_premium_plan->duration_days = $premium_plan['days'];
            $new_premium_plan->save();
        }
    }
}
