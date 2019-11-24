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
            ->select(DB::raw('*,kokugo+sugaku+eigo AS goukei'))
            ->where('tid', $tid)
            ->orderBy('goukei', 'desc')
            ->get();

        $kekka = new Kekka();
        $testAvg= $kekka
            ->select(DB::raw('avg(kokugo) AS kokugoavg,avg(sugaku) AS sugakuavg,avg(eigo) AS eigoavg,avg(kokugo+sugaku+eigo) AS goukeiavg'))
            ->where('tid', $tid)
            ->get();

        $kokugoMax= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->join('test', 'test.tid', '=', 'kekka.tid')
            ->whereIn(DB::raw('name'),
                function($query)
                {
                    $query->select('kokugo', DB::raw('max(kokugo)'))
                        ->from('kekka');
                })
            ->where('test.tid', $tid)
            ->get();

        dd($kokugoMax);

        return view('school.seiseki', ['testData' => $testData,'testAvg' => $testAvg]);
    }

    public function kobetuseiseki($seitoid)
    {
        $seito = new Seito();
        $testData= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->join('test', 'test.tid', '=', 'kekka.tid')
            ->select(DB::raw('*,kokugo+sugaku+eigo AS goukei'))
            ->where('seito.seitoid', $seitoid)
            ->orderBy('test.tid', 'asc')
            ->get();

        $testAvg= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->select(DB::raw('avg(kokugo) AS kokugoavg,avg(sugaku) AS sugakuavg,avg(eigo) AS eigoavg,avg(kokugo+sugaku+eigo) AS goukeiavg'))
            ->where('seito.seitoid', $seitoid)
            ->get();

        return view('school.kobetuseiseki', ['testData' => $testData,'testAvg' => $testAvg]);
    }
}
