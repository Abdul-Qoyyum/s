<?php

namespace App\Exports;

use App\Client;

use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;


class ClientExport implements FromView
{

    public function view(): View
    {
        return view('exports.invoices', [
            'clients' => Invoice::all()
        ]);
    }
}
