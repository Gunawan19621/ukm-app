<?php

namespace App\Http\Controllers;

use App\Models\UKM;
use App\Models\Laporan;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{

    public function __construct(){
        $this->Hashids = new \Hashids\Hashids( env('MY_SECRET_SALT_KEY','MySecretSalt') );
    }

    public function index(){
        return view('dashboard.laporan.index',[
            'title'=>'Rekap Laporan'
        ]);
    }

    public function show()
    {
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('detail'))[0];
        if (request('detail')) {
            $laporan = Laporan::find($url_id);
        }
        $varKegiatan = Kegiatan::find($laporan->kegiatan_id);
        $varUKM = UKM::find($varKegiatan->ukm_id);
        return view('dashboard.laporan.show',[
            'title'=> 'Proposal | Detail Laporan',
            'ukm'=> $varUKM,
            'laporan'=> $laporan
        ]);
    }


    public function data_laporan(){
        $activity = Laporan::select([
            'laporans.id','laporans.tgl_laporan','laporans.file','laporans.nama_laporan','laporans.keterangan','laporans.kegiatan_id','laporans.created_at','laporans.updated_at'])->with(['kegiatan']);
            return DataTables::of($activity)
            ->addColumn('action', function($data){
                $url_show = url('/lp-detailLaporan?detail='.$data->id);
                $varKegiatan = $data->kegiatan->ukm_id;
                $varUKM = UKM::find($varKegiatan);
                if ($varUKM->status != 0) {
                    '<div class="dropdown">'.
                    $button = '<a class="text-muted">
                    <div class="col-auto">
                    <div class="dropdown">
                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                    <a href="'.$url_show.'" class="dropdown-item">Detail</a>
                    <a href="#" class="dropdown-item">Export PDF</a>
                    <a href="" class="dropdown-item text-danger">Delete</a>
                    </div>
                    </div>
                    </div>
                    </a>
                    </div>';

                }else {
                    $button = '<span class="text-danger" title="Akses terkunci"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/lock</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                    <circle cx="12" cy="16" r="1"></circle>
                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                    </svg></span>';
                }
                return $button;
            })
            ->editColumn('keterangan',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->keterangan), 30);
                return $varWrap;
            })
            ->editColumn('created_at',function($created){
                $dibuat = \Carbon\Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a');
                return $dibuat;
            })
            ->editColumn('updated_at',function($updated){
                $diubah = \Carbon\Carbon::parse($updated->created_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a');
                return $diubah;
            })
            ->addColumn('ukm',function($ukm){
                $varKegiatan = $ukm->kegiatan->ukm_id;
                $varUKM = UKM::find($varKegiatan);
                return $varUKM->nama_ukm;
            })// edit kolom file
            ->editColumn('file',function($file){
                return $file->file === NULL ? '<small class="text-muted fst-italic">Data kosong</small>' : '<p class="text-muted fst-italic">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24"    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"  stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/file-description</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M9 17h6"></path>
                <path d="M9 13h6"></path>
                </svg>
                </p>';

            })
            ->rawColumns(['action','ukm','file'])
            ->make(true);
        }

}
