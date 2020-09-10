<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\HelperTraits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function currentstore(Request $request)
    {
        var_dump('route running');
        die();
        // get currently authenticated in user
        /*$user = Auth::user();
        // validates incoming request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'email' => 'email:rfc,dns'
        ]);
        //redirect back if validation fails
        if ($validator->fails()) {
            notify()->warning('Oops something went wrong :)');
            return redirect()->back();
        }
        // store user's client's data
        $user->clients()->create($request->all());
        notify()->success('Saved successfully');
        return redirect()->back();*/
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
        $user = Auth::user();
        $packages = DB::table('packages')->get();
        // var_dump($packages);
        // die();
        return view('users.settings.productpackages', ['packages' => $packages]);
    }
    public function getPackages(){
        // $leads = DB::package()->get();
        // return $leads;
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
        $workflows = DB::table('workflows')->get();
        return view('users.settings.workflows', ['workflows' => $workflows]);
    }
    /**
     *  Company jobtypes
     */

    public function jobtypes()
    {
        $jobs = DB::table('jobs')->get();
        return view('users.settings.jobtypes', ['jobs' => $jobs]);
    }
    /**
     *  Company emailtemplates
     */

    public function emailtemplates()
    {
        $emails = DB::table('email_templates')->get();
        return view('users.settings.emailtemplates', ['emails' => $emails]);
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
