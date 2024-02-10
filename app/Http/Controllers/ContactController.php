<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return View('contacts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request): View
    {
        $data = [ "email" => $request["email"],  "message" => htmlentities($request["message"]) ];

        Log::info("<pre>".print_r($data,true)."</pre>");

        return View('contacts.show',  [ "item" => $data ] );
    }

}
