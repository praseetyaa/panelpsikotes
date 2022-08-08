<?php

namespace App\Http\Controllers\Test;

use Auth;
use PDF;
use Dompdf\FontMetrics;
use Illuminate\Http\Request;
use App\Models\Description;

class DISC1Controller extends \App\Http\Controllers\Controller
{
    /**
     * Display the specified resource.
     *
     * @param  object  $result
     * @return \Illuminate\Http\Response
     */
    public static function detail($result)
    {
        // Check the access
        // has_access(method(__METHOD__), Auth::user()->role_id);
        
        // Set the result
        $disc = array('D', 'I', 'S','C');
        $m_score = $result->result['M'];
        $l_score = $result->result['L'];

        // Set the ranking
        $disc_score_m = sortScore($m_score);
        $disc_score_l = sortScore($l_score);

        // Set the code
        $code_m = setCode($disc_score_m);
        $code_l = setCode($disc_score_l);

        // Set the description
        $description = Description::where('packet_id','=',$result->packet_id)->first();
        $description->description = json_decode($description->description, true);
        $description_code = substr($code_l[0],1,1);
        switch($description_code) {
            case 'D':
                $description_result = $description->description[searchIndex($description->description, "disc", "D")]["keterangan"];
            break;
            case 'I':
                $description_result = $description->description[searchIndex($description->description, "disc", "I")]["keterangan"];
            break;
            case 'S':
                $description_result = $description->description[searchIndex($description->description, "disc", "S")]["keterangan"];
            break;
            case 'C':
                $description_result = $description->description[searchIndex($description->description, "disc", "C")]["keterangan"];
            break;
        }

        // View
        return view('admin/result/disc-1/detail', [
            'result' => $result,
            'disc' => $disc,
            'disc_score_m' => $disc_score_m,
            'disc_score_l' => $disc_score_l,
            'code_m' => $code_m,
            'code_l' => $code_l,
            'description_code' => $description_code,
            'description_result' => $description_result,
        ]);
    }

    /**
     * Print to PDF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        // DISC
        $disc = array('D', 'I', 'S','C');

        // Set the description
        $description = Description::where('packet_id','=',$request->packet_id)->first();
        $description->description = json_decode($description->description, true);
        $description_code = $request->description_code;
        switch($description_code){
            case 'D':
                $desc = $description->description[searchIndex($description->description, "disc", "D")]["keterangan"];
            break;
            case 'I':
                $desc = $description->description[searchIndex($description->description, "disc", "I")]["keterangan"];
            break;
            case 'S':
                $desc = $description->description[searchIndex($description->description, "disc", "S")]["keterangan"];
            break;
            case 'C':
                $desc = $description->description[searchIndex($description->description, "disc", "C")]["keterangan"];
            break;
        }
        
        // PDF
        $pdf = PDF::loadview('admin/result/disc-1/pdf', [
            'mostChartImage' => $request->mostChartImage,
            'leastChartImage' => $request->leastChartImage,
            'desc' => $desc,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'position' => $request->position,
            'test' => $request->test,
            'disc_score_m' => json_decode($request->disc_score_m, true),
            'disc_score_l' => json_decode($request->disc_score_l, true),
            'most' => $request->most,
            'least' => $request->least,
            'disc' => $disc,
        ]);
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream($request->name . '_' . $request->test . '.pdf');
    }
}