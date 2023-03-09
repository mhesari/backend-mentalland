<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use http\Message;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class mainC extends Controller
{

    public function index_m()
    {
       return view('message');
    }

    public function create_messages(Request $request)
    {
        Messages::create($request->all());

    }
}
