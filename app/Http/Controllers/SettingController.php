<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\HelperTraits;

class SettingController extends Controller
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
        //
        return view('users.settings.index');
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
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }

    public function account(Request $request)
    {
        return view('users.settings.accountsubscription');
    }

    /**
     *  Company 
     */

    public function company(Request $request)
    {
        return view('users.settings.companies');
    }

    /**
     * Show Company
     */
    // public function editview($id)
    public function editview()
    {
        return view('users.settings.editcompany');
    }

    /**
     * Edit Company
     */

    public function editcompany($id)
    {
        # code...
    }

    /**
     *  Company User
     */

    public function user()
    {
        return view('users.settings.user');
    }

    /**
     *  Company currencytaxes
     */

    public function currencytaxes()
    {
        return view('users.settings.currencytaxes');
    }
    /**
     *  Company emailsettings
     */

    public function emailsettings()
    {
        return view('users.settings.emailsettings');
    }
    /**
     *  Company datetime
     */

    public function datetime()
    {
        return view('users.settings.datetime');
    }
    /**
     *  Company paymentmethod
     */

    public function paymentmethod()
    {
        return view('users.settings.paymentmethod');
    }
    /**
     *  Company paymentschedule
     */

    public function paymentschedule()
    {
        return view('users.settings.paymentschedule');
    }
    /**
     *  Company productpackages
     */

    public function productpackages()
    {
        return view('users.settings.productpackages');
    }
    /**
     *  Company User
     */

    public function contact()
    {
        return view('users.settings.contactform');
    }
    /**
     *  Company workflows
     */

    public function workflows()
    {
        return view('users.settings.workflows');
    }
    /**
     *  Company jobtypes
     */

    public function jobtypes()
    {
        return view('users.settings.jobtypes');
    }
    /**
     *  Company emailtemplates
     */

    public function emailtemplates()
    {
        return view('users.settings.emailtemplates');
    }
    /**
     *  Company labels
     */

    public function labels()
    {
        return view('users.settings.labels');
    }

    /**
     *  Company User Refer Friend
     */

    public function referfriend()
    {
        return view('users.settings.referfriend');
    }
}
