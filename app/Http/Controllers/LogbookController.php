<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Logbook;
use App\Models\UKM;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    public function __construct(){
        $this->Hashids = new \Hashids\Hashids( env('MY_SECRET_SALT_KEY','MySecretSalt') );
    }

    public function index(){
        return view('dashboard.logbook.index',[
            'title'=>'Logbook Kegiatan'
        ]);
    }

    public function show()
    {
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('detail'))[0];
        if (request('detail')) {
            $logbook = Logbook::find($url_id);
        }
        $varKegiatan = Kegiatan::find($logbook->kegiatan_id);
        $varUKM = UKM::find($varKegiatan->ukm_id);
        return view('dashboard.logbook.show',[
            'title'=> 'Proposal | Detail Logbook',
            'ukm'=>$varUKM,
            'logbook'=>$logbook
        ]);
    }

    public function data_logbook(){
        $activity = Logbook::select([
            'logbooks.id','logbooks.tgl_logbook','logbooks.uraian','logbooks.progress','logbooks.hasil','logbooks.kegiatan_id','logbooks.kendala','logbooks.created_at','logbooks.updated_at'])->with(['kegiatan']);
            return DataTables::of($activity)
            // edit kolom status
            ->editColumn('progress',function($progress){
                if($progress->progress == 0){
                    return '<p class="badge bg-danger">Gagal</p>';
                }elseif ($progress->progress == 1) {
                    return '<p class="badge bg-success">Sukses</p>';
                }
                elseif ($progress->progress == 2) {
                    return '<p class="badge bg-warning">Sedang berjalan</p>';
                }
            })
            ->addColumn('action', function($data){
                $url_show = url('/lg-detailLogbook?detail='.$data->id);
                // cara mengembalikan id yg telah di hash
                // $url_show = $this->Hashids->decode($data->id)[0];
                $varKegiatan = $data->kegiatan->ukm_id;
                $varUKM = UKM::find($varKegiatan);
                if ($varUKM->status != 0) {
                    '<div class="dropdown">'.
                    $button = '<a class="text-muted">
                    <div class="col-auto">
                    <div class="dropdown">
                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
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
            ->editColumn('uraian',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->uraian), 30);
                return $varWrap;
            })
            ->editColumn('hasil',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->hasil), 30);
                return $varWrap;
            })
            ->editColumn('kendala',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->kendala), 30);
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
            })
            ->rawColumns(['action','tgl_logbook','progress','ukm'])
            ->make(true);
        }

    }
