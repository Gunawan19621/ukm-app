<?php

namespace App\Http\Controllers;

use App\Models\UKM;
use App\Models\Kegiatan;
use App\Models\Proposal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'title'=>'Dashboard',
            'ukms'=>UKM::all()->sortDesc()
        ]);
    }

    public function swKegiatan()
    {
        // validasi status UKM
        $req = UKM::firstWhere('slug',request('detail'));
        if (request('detail')) {
            $varKegiatan = Kegiatan::where('ukm_id',$req->id)->with(['ukm'])->get();
        }

        return view('dashboard.showKegiatan',[
            'title' => 'Detail Kegiatan | ' . request('detail'),
            'activities' => $varKegiatan,
            'ukm'=>$req

        ]);
    }
    public function swProposal()
    {
        // mengambil id UKM yang dipilih dari hasil request url
        $req = UKM::firstWhere('slug',request('detail'));
        $var = $req->id;
        // if (request('detail')) {
        //     $varKegiatan = Kegiatan::where('ukm_id',$var)->get();
        // }
        // $varr = $varKegiatan->id;
        // dd($varProposal);
        //     return false;
        $varProposal = Proposal::where('kegiatan_id',$varr)->get();

        return view('dashboard.showProposal',[
            'title' => 'Detail Proposal | ' . request('detail'),
            'props' => $varProposal,
            'ukm'=>$req

        ]);
    }
}
