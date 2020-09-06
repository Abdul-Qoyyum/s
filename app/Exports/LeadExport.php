<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\FromView;

use App\Lead;

use Maatwebsite\Excel\Concerns\FromCollection;

class LeadExport implements FromView
{
    public function view(): View
    {
        return view('users.exports.leads', [
            'leads' => Auth::user()->leads
        ]);
    }
}
