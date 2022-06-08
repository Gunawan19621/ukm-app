<?php

namespace App\Http\Controllers;

use App\Models\UKM;
use Illuminate\Http\Request;

class UKMApiController extends Controller
{
    public function index()
    {
        $ukm = UKM::all();
        return response()->json(['message'=>'success','data'=>$ukm]);
    }
    public function show($id)
    {
        $ukm = UKM::find($id);
        return response()->json(['message'=> 'success','data'=>$ukm]);
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
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

        $ukm = UKM::create($validatedData);
        return response()->json(['message'=>'data berhasil ditambahkan!','data'=>$ukm]);
    }

    public function update(Request $request, $id)
    {
        $ukm = UKM::find($id);
        $ukm->update($request->all());
        return response()->json(['message'=>'data berhasil di update!', 'data'=>$ukm]);
    }

    public function destroy($id)
    {
        $ukm = UKM::find($id);
        $ukm->delete();
        return response()->json(['message'=>'data berhasil dihapus', 'data'=>[]]);
    }
}
