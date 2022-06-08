<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\UKM;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProposalController extends Controller
{
    public function __construct(){
        $this->Hashids = new \Hashids\Hashids( env('MY_SECRET_SALT_KEY','MySecretSalt') );
    }

    public function index()
    {
        return view('dashboard.proposal.index',[
            'title'=>'Proposal kegiatan UKM POLINDRA'
        ]);
    }

    public function show(Proposal $proposal)
    {
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('detail'))[0];
        $title='';
        if (request('detail')) {
            $proposal = Proposal::find($url_id);
            $title = request('detail');
        }
        return view('dashboard.proposal.show',[
            'title'=> 'Proposal | Detail',
            'proposal'=>$proposal
        ]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Proposal  $proposal
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode($id)[0];

        $proposal = Proposal::firstWhere('id',$url_id);
        return view('dashboard.proposal.createComment',[
            'title'=>'Tambah Komentar',
            'proposal'=>$proposal
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Proposal  $proposal
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {

        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('update-proposal'))[0];
        if (request('update-proposal')) {
            $urlProposal = Proposal::firstWhere('id',$url_id);
        }

        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        $rules = [
            'komentar'=>'required',
        ];
        $validated = $request->validate($rules,$message);
        Proposal::where('id',$url_id)->update($validated);
        return redirect('ac-komentar?ac-ditolak='.$urlProposal->id)->with('komentarSuccess','store');
    }

    public function deleteKomentar(Request $request, Proposal $proposal){
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode($request->id)[0];

        $rules = [
            'komentar'=>'',
        ];
        $validated = $request->validate($rules);
        Proposal::where('id',$url_id)->update($validated);
        return redirect()->back()->with('komentarSuccessDelete','Komentar berhasil dihapus');

    }

    public function proposalDiterima(Request $request){

        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('diterima-proposal'))[0];

        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Proposal::where('id',$url_id)->update($validated);
        return redirect()->back()->with('ubah-status','update');
    }
    public function proposalDitolak(Request $request){
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('ditolak-proposal'))[0];

        if (request('ditolak-proposal')) {
            $Urlditolak = Proposal::firstWhere('id',$url_id);
        }

        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Proposal::where('id',$url_id)->update($validated);
        return redirect('/ac-komentar?ac-ditolak='.$Urlditolak->id)->with('ubah-status','update');
    }
    public function proposalPending(Request $request){
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('pending-proposal'))[0];

        $rules = [
            'status'=>'required'
        ];
        $validated = $request->validate($rules);
        Proposal::where('id',$url_id)->update($validated);
        return redirect()->back()->with('ubah-status','update');
    }

    public function komentar(){
        // cara mengembalikan id yg telah di hash
        $url_id = $this->Hashids->decode(request('ac-ditolak'))[0];
        if (request('ac-ditolak')) {
            $komentar = Proposal::firstWhere('id',$url_id);
        }
        return view('dashboard.proposal.comment',[
            'title'=> 'Komentar',
            'komentar'=> $komentar
        ]);

    }

    public function data_proposal(){
        $activity = Proposal::select([
            'proposals.id','proposals.nama_proposal','proposals.tgl_proposal','proposals.keterangan','proposals.status','proposals.file','proposals.kegiatan_id','proposals.komentar','proposals.created_at','proposals.updated_at'])->with(['kegiatan']);
            return DataTables::of($activity)
            // edit kolom status
            ->editColumn('status',function($status){
                if($status->status == 0){
                    return '<p class="badge bg-warning">Menunggu</p>';
                }elseif ($status->status == 1) {
                    return '<p class="badge bg-success">Diterima</p>';
                }
                elseif ($status->status == 2) {
                    $komentar = url('/ac-komentar?ac-ditolak='.$status->id);
                    if ($status->komentar) {
                        $varKegiatan = $status->kegiatan->ukm_id;
                        $varValidatedUKM = UKM::find($varKegiatan);

                        if ($varValidatedUKM->status != 0) {
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
                    }else {
                        return '<p class="badge bg-danger">Ditolak</p>
                        <small class="text-muted fst-italic">Tidak ada komentar</small>';
                    }
                }
            })
            // add kolom ukm
            ->addColumn('ukm',function($ukm){
                $varKegiatan = $ukm->kegiatan->ukm_id;
                $varValidatedUKM = UKM::find($varKegiatan);
                return $varValidatedUKM->nama_ukm;

            })
            ->editColumn('keterangan',function($request){
                // untuk memotong kalimat. search : string helpers. strip_tags adalah method untuk menghilangkan tag html
                $varWrap = Str::limit(strip_tags($request->keterangan), 30);
                return $varWrap;
            })
            // edit kolom file
            ->editColumn('file',function($file){
                if($file->file == null){
                    return '<small class="text-muted fst-italic">Data Kosong</small>';
                }
            })
            ->addColumn('action', function($data){
                $url_show = url('/ac-detailProposal?detail='.$data->id);
                $varKegiatan = $data->kegiatan->ukm_id;
                $varValidatedUKM = UKM::find($varKegiatan);
                if ($varValidatedUKM->status != 0) {
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
            ->editColumn('created_at',function($created){
                $dibuat = \Carbon\Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a');
                return $dibuat;
            })
            ->editColumn('updated_at',function($updated){
                $diubah = \Carbon\Carbon::parse($updated->created_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a');
                return $diubah;
            })
            ->rawColumns(['file','action','status','ukm','nama_proposal','kegiatan'])
            ->make(true);
            // if ($keyword = $request->get('search')['value']) {
                //     $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
                // }
                // return $datatables->make(true);
            }
        }
