<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerDonateRequest;
use App\Models\CustomerDonate;
use Exception;
use Illuminate\Http\Request;

class CustomerDonateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCustomerDonate(CustomerDonateRequest $request)
    {
        try {
            CustomerDonate::create($request->all());
            return response()->json([
                'message' => 'Successful Donation.',
                'code' => 200,
            ], 200);
        } catch (Exception $errors) {
            return response()->json([
                'message' => 'Donation failed. Please try again!',
                'code' => 402,
            ], 402);
        }
    }
}
