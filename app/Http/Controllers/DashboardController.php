<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Lead;

class DashboardController extends Controller
{

    /**
     * Add the auth middleware
     * @return void 
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // vuetify admin dashboard
        // $slug = Auth::user()->slug;        
        // return view('dashboard.index',compact('slug'));

        // sb admin 2 dashboard
        return view('dashboard.home');

    }

    /**
     * Renders users dashboard
     */
    public function user(){
        $user = Auth::user();
        // Get a summary of leads for last 7 days...
        $leadsDate = $this->leadsDates();
        $leadsNumber = $this->leadsNumbers();
        $leads = $user->leads()->orderBy('id','DESC')->get();
        $tasks = $user->tasks()->orderBy('id','DESC')->get();
        return view('users.index',compact('leads','tasks','leadsDate','leadsNumber'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a summary of leads for the last 7 days
     */
    public function leadsSummary(){
        $leads = Auth::user()->leads()->whereBetween('created_at',[now()->subDays(7),now()])
                  ->orderBy('created_at')
                  ->get()
                  ->groupBy(function($val){
                      return \Carbon\Carbon::parse($val->created_at)->format('d');
                  });
        return $leads;
    }

    /**
     * Get the date of leads for the last 7 days
     */
    public function leadsDates(){
        $leads = $this->leadsSummary();
        $dates = [];
        foreach($leads as $key => $value){
          $dates[] = now()->format('F') . " " . $key;
        }
        return $dates;
    }

    /**
     * Get the number of leads for the last 7 days
     */
    public function leadsNumbers(){
        $leads = $this->leadsSummary();
        $numbers = [];
        foreach($leads as $key => $value){
         $numbers[] = $value->count();
        }
        return $numbers;
    }


}
