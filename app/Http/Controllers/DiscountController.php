<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();

        return view('admin.discounts.index')->with([
            'discounts' => $discounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:discounts',
            'amount' => 'required|numeric',
        ]);

        $discount = new Discount;
        $discount->code = $request->code;
        $discount->amount = $request->amount;
        $discount->save();

        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }

    /**
     * Check if the dicsount code is valid and active.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request, Discount $discount)
    {
        $discount = Discount::where([
            ['code', $request->code],
            ['active', true]
        ])->first();

        if (!$discount) {
            return response('The discount code is not valid.', 422);
        }

        return response()->json([
            'code' => $discount->code,
            'active' => $discount->active,
            'amount' => $discount->amount,
        ]);
    }
}
