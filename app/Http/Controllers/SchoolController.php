<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            ->select(DB::raw('name'))
            ->whereRaw('kokugo=(SELECT MAX(kokugo) FROM kekka WHERE tid=:tid) AND tid=:tid2',['tid' => $tid,'tid2' => $tid])
            ->distinct()
            ->get();

        $goukeiMax= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->select(DB::raw('name'))
            ->whereRaw('kokugo+sugaku+eigo=(SELECT MAX(kokugo+sugaku+eigo) FROM kekka WHERE tid=:tid) AND tid=:tid2',['tid' => $tid,'tid2' => $tid])
            ->get();

        $seitoid= $kekka
            ->select(DB::raw('seitoid'))
            ->where('tid', $tid)
            ->distinct()
            ->get();

        $seitoData = $seito
            ->select(DB::raw('seitoid,name'))
            ->whereNotIn('seitoid',$seitoid)
            ->get();

        $test = new Test();
        $testData2 = $test
            ->find($tid);

        return view('school.seiseki', ['testData' => $testData,'testAvg' => $testAvg,'kokugoMax' => $kokugoMax,'goukeiMax' => $goukeiMax,'seitoData' => $seitoData,'tid' => $tid,'testData2' => $testData2]);
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

        $seitoData = $seito
            ->find($seitoid);

        $testAvg= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->select(DB::raw('avg(kokugo) AS kokugoavg,avg(sugaku) AS sugakuavg,avg(eigo) AS eigoavg,avg(kokugo+sugaku+eigo) AS goukeiavg'))
            ->where('seito.seitoid', $seitoid)
            ->get();

        return view('school.kobetuseiseki', ['testData' => $testData,'testAvg' => $testAvg,'seitoData' => $seitoData]);
    }

    public function testaddkakunin(\App\Http\Requests\SchoolAddRequest $request)
    {
        $tname = $request->input('tname');

        return view('school.testaddkakunin',['tname' => $tname]);
    }

    public function testaddkanryou(Request $request)
    {
        $tname = $request->input('tname');

        $test = new Test();
        $test->create(['tname' => $tname]);

        return view('school.kanryou',['shori' => 'テスト追加']);
    }

    public function seisekiaddkakunin(Request $request)
    {
        $seitoid = $request->input('seitoid');
        $tid = $request->input('tid');
        $kokugo = $request->input('kokugo');
        $sugaku = $request->input('sugaku');
        $eigo = $request->input('eigo');

        $seito = new Seito();
        $seitoData = $seito
            ->find($seitoid);

        $test = new Test();
        $testData = $test
            ->find($tid);

        return view('school.seisekiaddkakunin',['seitoData' => $seitoData,'testData' => $testData,'seitoid' => $seitoid,'tid' => $tid,'kokugo' => $kokugo,'sugaku' => $sugaku,'eigo' => $eigo]);
    }

    public function seisekiaddkanryou(Request $request)
    {
        $seitoid = $request->input('seitoid');
        $tid = $request->input('tid');
        $kokugo = $request->input('kokugo');
        $sugaku = $request->input('sugaku');
        $eigo = $request->input('eigo');

        $kekka = new Kekka();
        $kekka->create(['seitoid' => $seitoid,'tid' => $tid,'kokugo' => $kokugo,'sugaku' => $sugaku,'eigo' => $eigo]);

        return view('school.seisekiaddkanryou',['shori' => '成績追加','tid' => $tid]);
    }

    public function seitoaddkakunin(Request $request)
    {
        $name = $request->input('name');
        $birth = $request->input('birth');
        $tel = $request->input('tel');

        return view('school.seitoaddkakunin',['name' => $name,'birth' => $birth,'tel' => $tel]);
    }

    public function seitoaddkanryou(Request $request)
    {
        $name = $request->input('name');
        $birth = $request->input('birth');
        $tel = $request->input('tel');

        $seito = new Seito();
        $seito->create(['name' => $name,'birth' => $birth,'tel' => $tel]);

        return view('school.kanryou',['shori' => '成績追加']);
    }

    public function seitohenkou($seitoid)
    {
        $seito = new Seito();
        $seitoData = $seito->find($seitoid);

        $seitoDataAll = $seito->all();

        return view('school.seitohenkou',['seitoData' => $seitoData,'seitoDataAll' => $seitoDataAll]);
    }

    public function seitohenkoukanryou(Request $request)
    {
        $seitoid = $request->input('seitoid');
        $name = $request->input('name');
        $birth = $request->input('birth');
        $tel = $request->input('tel');

        $seito = new Seito();
        $seito->where('seitoid',$seitoid)
            ->update(['name' => $name,'birth' => $birth,'tel' => $tel]);

        return view('school.kanryou',['shori' => '変更']);
    }

    public function seitodelkakunin($seitoid)
    {
        $seito = new Seito();
        $seitoData = $seito->find($seitoid);

        return view('school.seitodelkakunin',['seitoData' => $seitoData]);
    }

    public function seitodelkanryou(Request $request)
    {
        $seitoid = $request->input('seitoid');

        $seito = new Seito();
        $seito -> where('seitoid', $seitoid)->delete();

        return view('school.kanryou',['shori' => '削除']);
    }

    public function tensuuhenkou($kid)
    {
        $seito = new Seito();
        $testData= $seito
            ->join('kekka', 'kekka.seitoid', '=', 'seito.seitoid')
            ->where('kid', $kid)
            ->get();

        return view('school.tensuuhenkou',['testData' => $testData]);
    }

    public function tensuuhenkoukanryou(Request $request)
    {
        $kid = $request->input('kid');
        $tid = $request->input('tid');
        $kokugo = $request->input('kokugo');
        $sugaku = $request->input('sugaku');
        $eigo = $request->input('eigo');

        $kekka = new Kekka();
        $kekka->where('kid',$kid)
            ->update(['kokugo' => $kokugo,'sugaku' => $sugaku,'eigo' => $eigo]);

        return view('school.seisekiaddkanryou',['shori' => '点数変更','tid' => $tid]);
    }
}
