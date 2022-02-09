<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mohalla;
use Illuminate\Http\Request;

class PeopleDataController extends Controller
{
    public function mohallas(){
        $mohallas = Mohalla::all();
        return response()->json($mohallas);
    }
}
