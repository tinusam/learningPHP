<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Identitycard;

class IdentitycardController extends Controller
{
    public function index()
{
   $identity = Identitycard::with(['user'])->get();
   dd($identity);
}
}
