<?php

namespace App\View\Components\Promotions;

use Illuminate\View\Component;
use App\Models\TPromotion;
use App\Models\TPromotionPhoto;

class Photos extends Component
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
        $photos = new TPromotionPhoto;        
        $data = [
            'promotions' => $promotion->get(),
            'photos'     => $photos->join("t_promotion", "t_promotion.id", "=", "t_promotion_photo.id_promotion")->select('t_promotion_photo.url', 't_promotion_photo.id', 't_promotion.title_main')->get()
        ];
        return view('components.promotions.photos', $data);
    }
}
