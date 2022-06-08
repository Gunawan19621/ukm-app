<?php

namespace App\Http\Controllers;

use App\Models\UKM;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('dashboard.act_ukm.index',[
            'title'=>'Kegiatan UKM POLINDRA'
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Kegiatan  $kegiatan
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        $title='';
        if (request('selengkapnya')) {
            $kegiatan = Kegiatan::firstWhere('slug',request('selengkapnya'));
            $title = request('selengkapnya');
        }
        return view('dashboard.act_ukm.show',[
            'title'=> 'Kegiatan | '.$title,
            'kegiatan'=>$kegiatan
        ]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Kegiatan  $kegiatan
    * @return \Illuminate\Http\Response
    */
    public function edit($slug)
    {
        $kegiatan = Kegiatan::firstWhere('slug',$slug);
        return view('dashboard.act_ukm.createComment',[
            'title'=>'Tambah Komentar',
            'kegiatan'=>$kegiatan
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Kegiatan  $kegiatan
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $message = [
            'required'=> ':attribute tidak boleh kosong!'
        ];
        $rules = [
            'komentar'=>'required'
        ];
        $validated = $request->validate($rules,$message);
        Kegiatan::where('id',$kegiatan->id)->update($validated);
        return redirect('act-komentar?act-ditolak='.$kegiatan->slug)->with('komentarSuccess','store');
    }

    public function deleteKomentar(Request $request, Kegiatan $kegiatan){
        $rules = [
            'komentar'=>'',
        ];
        $validated = $request->validate($rules);
        Kegiatan::where('id',$kegiatan->id)->update($validated);
        return redirect()->back()->with('komentarSuccessDelete','Komentar berhasil dihapus');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Kegiatan  $kegiatan
    * @return \Illuminate\Http\Response
    */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }

    public function kegiatanDiterima(Request $request){
        if (request('diterima')) {
            $Urlditerima = Kegiatan::firstWhere('slug',request('diterima'));
        }
        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Kegiatan::where('id',$Urlditerima->id)->update($validated);
        return redirect()->back()->with('ubah-status','update');
    }
    public function kegiatanDitolak(Request $request){
        if (request('ditolak')) {
            $Urlditolak = Kegiatan::firstWhere('slug',request('ditolak'));
        }
        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Kegiatan::where('id',$Urlditolak->id)->update($validated);
        return redirect('act-komentar?act-ditolak='.$Urlditolak->slug)->with('ubah-status','update');
    }
    public function kegiatanPending(Request $request){
        if (request('pending')) {
            $Urlpending = Kegiatan::firstWhere('slug',request('pending'));
        }
        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Kegiatan::where('id',$Urlpending->id)->update($validated);
        return redirect()->back()->with('ubah-status','update');
    }

    public function komentar(){
        if (request('act-ditolak')) {
            $komentar = Kegiatan::firstWhere('slug',request('act-ditolak'));
        }
        return view('dashboard.act_ukm.comment',[
            'title'=> 'Komentar | '. request('act-ditolak'),
            'komentar'=> $komentar
        ]);

    }

    public function data_kegiatan(){
        // \DB::statement(\DB::raw('set @rownum=0'));
        // cara-1
        // return DataTables::of(Kegiatan::query())->make(true);
        // cara 2
        $activity = Kegiatan::select([
            // \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'kegiatans.id','kegiatans.slug','kegiatans.nama_kegiatan','kegiatans.deskripsi','kegiatans.ukm_id','kegiatans.file','kegiatans.tgl_kegiatan','kegiatans.komentar','kegiatans.status','kegiatans.created_at','kegiatans.updated_at'])->with(['ukm']);
            return DataTables::of($activity)
            // edit kolom status
            ->editColumn('status',function($status){
                if($status->status == 0){
                    return '<p class="badge bg-warning">Menunggu</p>';
                }elseif ($status->status == 1) {
                    return '<p class="badge bg-success">Diterima</p>';
                }
                elseif ($status->status == 2 ) {
                    $komentar = url('/act-komentar?act-ditolak='.$status->slug);
                    if ($status->komentar) {
                        if ($status->ukm->status != 0) {
                            return '<p class="badge bg-danger">Ditolak</p>
                            <a href="'.$komentar.'" class="link-danger" title="Komentar"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <desc>Download more icon variants from https://tabler-icons.io/i/message-report</desc>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                            <line x1="12" y1="8" x2="12" y2="11"></line>
                            <line x1="12" y1="14" x2="12" y2="14.01"></line>
                            </svg>
                            </a>
                            ';
                        }else {
                            return '<p class="badge bg-danger">Ditolak</p>
                            <span title="Komentar terkunci"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <desc>Download more icon variants from https://tabler-icons.io/i/lock</desc>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                            <circle cx="12" cy="16" r="1"></circle>
                            <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                            </svg></span>';
                        }
                    }
                    else {
                        return '<p class="badge bg-danger">Ditolak</p>
                        <small class="text-muted fst-italic">Tidak ada komentar</small>';
                    }
                }
            })
            // edit kolom file
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
            ->addColumn('action', function($data){
                $url_show = url('/act-detailKegiatan?selengkapnya='.$data->slug);
                $varUKM = $data->ukm_id;
                $varValidatedUKM = UKM::find($varUKM);
                if ($varValidatedUKM->status != 0) {
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
            ->editColumn('deskripsi',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->deskripsi), 30);
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
            ->rawColumns(['file','action','status','tgl_kegiatan','ukm'])
            ->make(true);
            // if ($keyword = $request->get('search')['value']) {
                //     $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
                // }
                // return $datatables->make(true);
            }
        }
