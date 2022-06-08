<?php

namespace App\Http\Controllers;

use App\Models\UKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Failed;
use UniSharp\LaravelFilemanager\Controllers\Controller;



class UKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'mimes' => ':attribute hanya dapat diisi :values',
            'max' => ':attribute maksimal :max karakter',
            'min'=>':attribute minimal :min karakter',
            'image'=>'File yang diupload bukan gambar',
            'string'=>'Hanya dapat diisi dengan karakter (Bukan angka)'
        ];
        $validatedData = $request->validate([
            'nama_ukm'=>'bail|required|string|max:255|min:5',
            'slug'=>'required|string|max:255',
            'logo'=>'required|image|mimes:png,jpg,jpeg|max:5000',
            'file'=>'required|file|mimes:pdf,doc,docx,xlsx|file|max:15000',
            'tgl_berdiri'=>'required|date',
            'deskripsi'=>'required'
        ],$messages);
        if ($request->file('logo')){
            $validatedData['logo'] = $request->file('logo')->store('logo-ukm');
        }
        if ($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('file-ukm');
        }

            UKM::create($validatedData);
            return redirect()->back()->withToastSuccess('UKM '.$request->nama_ukm.' Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UKM $ukm)
    {
        $title='';
        if (request('deskripsi')) {
            $ukm=UKM::firstWhere('slug',request('deskripsi'));
            $title=request('deskripsi');
        }

        return view('dashboard.desc_ukm.show',[
            'title'=>'Deskripsi UKM | ' . $title,
            'ukm'=>$ukm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNonaktif()
    {
        if (request('nonaktifukm')) {
            $Urlnonaktif = UKM::firstWhere('slug',request('nonaktifukm'));
        }
        if ($_GET['nonaktifukm']) {
         $valueFalse= 0;
        }
        UKM::where('id',$Urlnonaktif->id)->update([
            'status'=>$valueFalse
        ]);
        return redirect()->back()->with('UKM-nonaktif','update');
    }
    public function updateAktif()
    {
        if (request('aktifukm')) {
            $Urlnonaktif = UKM::firstWhere('slug',request('aktifukm'));
        }
        if ($_GET['aktifukm']) {
            $valueTrue=1;
        }
        UKM::where('id',$Urlnonaktif->id)->update([
            'status'=>$valueTrue
        ]);
        return redirect()->back()->with('UKM-aktif','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UKM $ukm)
    {
        if ($ukm->logo) {
            Storage::delete($ukm->logo);
        }
        if ($ukm->file) {
            Storage::delete($ukm->file);
        }

            Storage::delete('photos/1/');

        UKM::destroy($ukm->id);
        return redirect()->back()->with('UKM-delete','deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(UKM::class, 'slug', $request->nama_ukm);
        return response()->json(['slug' => $slug]);
    }
}
