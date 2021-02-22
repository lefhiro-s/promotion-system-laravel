<?php

namespace App\View\Components\Promotions;

use Illuminate\View\Component;
use App\Models\TPromotion;
use App\Models\TPromotionItem;

class Items extends Component
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
        $items     = new TPromotionItem;
        
        $data = [
            'promotions' => $promotion->get(),
             'items'     => $items->join("t_promotion", "t_promotion.id", "=", "t_promotion_item.id_promotion")
                ->select('t_promotion_item.price', 't_promotion_item.total_sale', 't_promotion_item.title', 't_promotion_item.quantity', 't_promotion_item.id', 't_promotion_item.comission_site', 't_promotion.title_main')->get()
            ];
        return view('components.promotions.items', $data);
    }
}
