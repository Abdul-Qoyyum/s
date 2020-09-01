<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Resources\EmailTemplateResource;

use App\EmailTemplate;

class EmailTemplateController extends Controller
{
    /**
     * Get all email templates
     */
    public function index(){
      return EmailTemplateResource::collection(EmailTemplate::all());
    }

}
