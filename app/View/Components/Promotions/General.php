<?php

namespace App\View\Components\Promotions;

use App\Models\TPromotion;
use Illuminate\View\Component;

class General extends Component
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
        $data = [
            'promotions' => $promotion->get(),
        ];
        return view('components.promotions.general', $data);
    }
}
