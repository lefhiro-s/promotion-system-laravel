<?php

namespace App\View\Components\Promotions;

use Illuminate\View\Component;
use App\Models\TPromotion;
use App\Models\TPromotionCondition;

class Conditions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $promotion = new TPromotion;
        $conditions = new TPromotionCondition;       
        $data = [
            'promotions' => $promotion->get(),
            'conditions' => $conditions->join("t_promotion", "t_promotion.id", "=", "t_promotion_condition.id_promotion")->select('t_promotion_condition.description', 't_promotion_condition.id', 't_promotion.title_main')->get()
        ];
        return view('components.promotions.conditions', $data);
    }
}
