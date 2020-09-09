<?php

namespace App\Exports;

use App\Task;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Support\Facades\Auth;

class TaskExport implements FromView
{
    public function view(): View
    {

        return view('users.exports.tasks', [
            'tasks' => Auth::user()->tasks
        ]);
    }

}
