<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanApiController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return response()->json(['message'=>'success','data'=>$kegiatan]);
    }
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return response()->json(['message'=> 'success','data'=>$kegiatan]);
    }
    public function store(Request $request)
    {
        $kegiatan = Kegiatan::create($request->all());
        return response()->json(['message'=> 'success','data'=>$kegiatan]);
    }
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update($request->all());
        return response()->json(['message'=> 'success','data'=>$kegiatan]);
    }
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return response()->json(['message'=>'data berhasil dihapus', 'data'=>[]]);
    }
}
