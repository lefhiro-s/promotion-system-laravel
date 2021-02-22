<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecondition;
use App\Http\Requests\Storeitem;
use App\Http\Requests\Storephoto;
use App\Http\Requests\Storepromotion;
use Illuminate\Http\Request;
use App\Models\TPromotion;
use App\Models\TPromotionCondition;
use App\Models\TPromotionItem;
use App\Models\TPromotionPhoto;

class PromotionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [
            'status'  => $request->status ?: -1,
            'tab'     => $request['tab']  ?: 'general'
        ];

        return view('promotions', $data);
    }

    public function storePromotion(Storepromotion $request)
    {
        $promotion = new TPromotion;  
        $promotion::create([
            "title_main"    => request('title_main'),
            "title_long"    => request('title_long'),
            "title_short"   => request('title_short'),
            "description"   => request('description'),
            "latitude"      => request('latitude'),
            "longitude"     => request('longitude'),
            "city"          => request('city'),
            "end_time"      => request('end_time'),
            "type"          => request('type'),
            "discount"      => request('discount'),
            "contact_info"  => request('contact_info'),
            "id_user"       => 1,
            "city"          => request('city'),
            "fech_crea"     => date("Y-m-d h:i:s"),
        ]);
        
        $data = [
            'status'  => 200,
            'success' => $promotion,
            'tab'     => 'general'
        ];
    
        return redirect()->route('promotions')->withInput($data);
    }
   
    public function storeItem(Storeitem $request)
    {
        $item = new TPromotionItem;        
        $item::create([
            "id_promotion"      => request('id_promotion'),
            "price"             => request('price'),
            "title"             => request('title'),
            "quantity"          => request('quantity'),
            "total_pay"         => request('total_pay'),
            "comission_site"    => request('comission_site'),
            "total_sale"        => request('total_pay') * request('quantity'),
        ]);

        $data = [
            'status'  => 200,
            'success' => $item,
            'tab'     => 'items'
        ];

        return redirect()->route('promotions')->withInput($data);
    }

    public function storeCondition(Storecondition $request)
    {
        $condition = new TPromotionCondition;        
        $condition::create([
            "id_promotion"  => request('id_promotion'),
            "description"   => request('description_conditions'),
        ]);

        $data = [
            'status'   => 200,
            'success'  => $condition,
            'tab'      => 'conditions'
        ];

        return redirect()->route('promotions')->withInput($data);
    }

    public function storePhoto(Storephoto $request)
    {
        $photo = new TPromotionPhoto;        
        $photo::create([
            "id_promotion"  => request('id_promotion'),
            "url"           => request('url'),
        ]);
        
        $data = [
            'status'  => 200,
            'success' => $photo,
            'tab'     => 'photos'
        ];

        return redirect()->route('promotions')->withInput($data);
    }

    public function editPromotion(Request $promotion)
    {
        $promotions = TPromotion::where('id',$promotion->idp)->get()->first();
        $promotions['end_time'] = date("Y-m-d", strtotime($promotions['end_time'])); 
        return compact('promotions');  
    }

    public function editCondition(Request $condition)
    {
        $conditions = TPromotionCondition::where('id',$condition->idp)->get()->first();
        return compact('conditions');  
    }

    public function editItems(Request $item)
    {
        $items = TPromotionItem::where('id',$item->idp)->get()->first();
        return compact('items'); 
    }


    public function editPhotos(Request $photo)
    {
        $photos = TPromotionPhoto::where('id',$photo->idp)->get()->first();
        return compact('photos'); 
    }

    public function updatePromotion (Storepromotion $request)
    {
        $promotion = TPromotion::find($request->id);
        $promotion->update($request->all());
        $data = [
            'status'  => 200,
            'success' => $promotion,
            'tab'     => 'general'
        ];

        return  redirect()->route('promotions')->withInput($data);
    }

    public function updateCondition (Storecondition $request)
    {
        $condition = TPromotionCondition::find($request->id);
        $condition->update([
            'id_promotion' => $request->id_promotion,
            'description'  => $request->description_conditions
        ]);

        $data = [
            'status'  => 200,
            'success' => $condition,
            'tab'     => 'conditions'
        ];
        return redirect()->route('promotions')->withInput($data);
    }

    public function updateItem (storeitem $request)
    {
        $item = TPromotionItem::find($request->id);
        $item->update([
            'id_promotion' => $request->id_promotion,
            'price'             => request('price'),
            'title'             => request('title'),
            'quantity'          => request('quantity'),
            'total_pay'         => request('total_pay'),
            'comission_site'    => request('comission_site'),
            'total_sale'        => request('total_pay') * request('quantity'),
        ]);

        $data = [
            'status'  => 200,
            'success' => $item,
            'tab'     => 'items'
        ];
        return redirect()->route('promotions')->withInput($data);
    }

    public function updatePhoto (Storephoto $request)
    {
        $photos = TPromotionPhoto::find($request->id);
        $photos->update([
            'id_promotion' => $request->id_promotion,
            'url'          => $request->url
        ]);

        $data = [
            'status'  => 200,
            'success' => $photos,
            'tab'     => 'photos'
        ];
        
        return redirect()->route('promotions')->withInput($data);
    }
     
}

