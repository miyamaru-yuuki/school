<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Seito;
use App\Models\Kekka;
use App\Models\Test;
use DB;

class SchoolController extends Controller
{
    public function index()
    {
        $seito = new Seito();
        $seitoData = $seito
            ->all();

        $test = new Test();
        $testData = $test
            ->all();

        return view('school.index', ['seitoData' => $seitoData,'testData' => $testData]);
    }

    public function seiseki($tid)
    {
        $seito = new Seito();
        $testData= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->select(DB::raw('sum(kokugo) AS kokugosum,sum(sugaku) AS sugakusum,sum(eigo) AS eigosum,name'))
            ->groupBy('kekka.tid','name')
            ->where('tid', $tid)
            ->get();

        dd($testData);

        return view('school.seiseki', ['testData' => $testData]);
    }
}
