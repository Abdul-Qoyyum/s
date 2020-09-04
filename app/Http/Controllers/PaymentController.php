<?php

namespace App\Http\Controllers;

use App\PaymentSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\HelperTraits;

class PaymentController extends Controller
{
    // use custom trait
    use HelperTraits;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentSchedule $paymentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentSchedule  $paymentSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSchedule $paymentSchedule)
    {
        //
    }
}
