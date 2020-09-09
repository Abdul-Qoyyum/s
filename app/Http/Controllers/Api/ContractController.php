<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Resources\ContractResource;

use App\Contract;

class ContractController extends Controller
{
    //
    public function getAllContract(){
       return ContractResource::collection(Contract::all());
    }
}
