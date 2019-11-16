<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Seito;

class SchoolController extends Controller
{
    public function index()
    {
        $seito = new Seito();
        $seitoData = $seito
            ->all();

        return view('school.index', ['seitoData' => $seitoData]);
    }
}
