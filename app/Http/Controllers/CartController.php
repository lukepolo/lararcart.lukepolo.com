<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Faker\Factory;
use Illuminate\Http\Request;
use LaraCart;
use function rand;
use function str_random;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $faker = Factory::create();

        LaraCart::add(
            str_random(),
            $name = $faker->name,
            $qty = $faker->numberBetween(1, 10),
            $price = $faker->numberBetween(1, 10),
            $options = [
                'color' => $faker->colorName
            ],
            $taxable = $faker->boolean(),
            $lineItem = false
        );

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFee(Request $request)
    {
        LaraCart::addFee('deliveryFee', 5);

        return back();
    }

    public function destroy()
    {
        LaraCart::destroyCart();

        return back();
    }
}
