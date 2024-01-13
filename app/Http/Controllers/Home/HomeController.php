<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class HomeController extends Controller
{
    //
    public function index() {
        $idxProduct = 0;
        $idxArrival = 0;
        $idxPopolar = 0;
        $idxOffer = 0;
        $listProducts = [];
        $listArrivals = [];
        $listPopulars = [];
        $listOffers = [];

        $categories = Categories::get();
        $product = Products::getAll(['products.status' => 'publish']);
        $arrival = Products::getAll(['id_categories' => 1, 'products.status' => 'publish']);
        $popular = Products::getAll(['id_categories' => 2, 'products.status' => 'publish']);
        $offer = Products::getAll(['id_categories' => 3, 'products.status' => 'publish']);

        foreach ($product as $key => $value) {
            # code...
            if(($key+1)%2 > 0 && ($key+1)%3 > 0) {
                $listProducts[$idxProduct][0] = $value;
            } else if (($key+1)%2 == 0 && ($key+1)%3 > 0){
                $listProducts[$idxProduct][1] = $value;
            } else {
                $listProducts[$idxProduct][2] = $value;
                $idxProduct++;
            }
        }

        foreach ($arrival as $key => $value) {
            # code...
            if(($key+1)%2 > 0 && ($key+1)%3 > 0) {
                $listArrivals[$idxArrival][0] = $value;
            } else if (($key+1)%2 == 0 && ($key+1)%3 > 0){
                $listArrivals[$idxArrival][1] = $value;
            } else {
                $listArrivals[$idxArrival][2] = $value;
                $idxProduct++;
            }
        }

        foreach ($popular as $key => $value) {
            # code...
            if(($key+1)%2 > 0 && ($key+1)%3 > 0) {
                $listPopulars[$idxPopolar][0] = $value;
            } else if (($key+1)%2 == 0 && ($key+1)%3 > 0){
                $listPopulars[$idxPopolar][1] = $value;
            } else {
                $listPopulars[$idxPopolar][2] = $value;
                $idxProduct++;
            }
        }

        foreach ($offer as $key => $value) {
            # code...
            if(($key+1)%2 > 0 && ($key+1)%3 > 0) {
                $listOffers[$idxOffer][0] = $value;
            } else if (($key+1)%2 == 0 && ($key+1)%3 > 0){
                $listOffers[$idxOffer][1] = $value;
            } else {
                $listOffers[$idxOffer][2] = $value;
                $idxProduct++;
            }
        }

        // return json_encode($listPopulars, 200);
        return view('default.pages.home')->with([
            'categories'=>$categories,
            'products' => $listProducts,
            'arrival' => $listArrivals,
            'popular' => $listPopulars,
            'offer' => $listOffers
        ]);
    }
}
