<?php

namespace App\Exports;

use App\Client;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class ClientSampleExport implements FromView
{
        public function view(): View
    {
        return view('users.exports.clients_sample');
    }

}
