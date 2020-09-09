<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Resources\PackageResource;

use App\Package;

class PackageController extends Controller
{
    //

    public function getAllPackage(){
        return PackageResource::collection(Package::all());
    }
}
