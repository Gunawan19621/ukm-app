<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\AuthenticationLoggable;
use Yajra\DataTables\Facades\DataTables;



class AuthenticationLogController extends Controller
{
    // public function index()
    // {
    //     $items = DB::table('authentication_log ')->get();

    //     return response()->json([
    //         'data' => $items
    //     ], 200);
    // }

    public function index()
    {
        $users = AuthenticationLoggable::all()->sortDesc();
        $users_verify = User::all();
        return view('dashboard.log-activity.index',[
            'title'=>'Log-activity',
            // 'users'=>$users,
            // 'usersVerify' => $users_verify
        ]);
    }

    public function data_verification()
    {
        $activity = AuthenticationLoggable::select([
            'authentication_log.id','authentication_log.authenticatable_id','authentication_log.login_successful','authentication_log.logout_at','authentication_log.location'])->with(['user']);
            return DataTables::of($activity)
            ->editColumn('login_at',function($varLogin_at){
                $respon = \Carbon\Carbon::parse($varLogin_at->login_at)->isoFormat('dddd, DD MMMM Y HH:mm:s a');
                return $respon;
            })
            ->editColumn('login_successful',function($varlogin_successful){
                if($varlogin_successful->user->hasVerifiedEmail() && $varlogin_successful->login_successful == true){
                    $respon = '<p class="text-success">Berhasil login/Terverifikasi</p>';
                }
                else{
                    $respon = '<p class="text-danger">Gagal login/ Belum verifikasi email</p>';
                }
                return $respon;
            })
            ->editColumn('logout_at',function($varLogout_at){
                $respon = $varLogout_at->logout_at == NULL ? '-' : \Carbon\Carbon::parse($varLogout_at->logout_at)->isoFormat('dddd, DD MMMM Y HH:mm:ss a');
                return $respon;
            })
            ->editColumn('user.role',function($role){
                if($role->user->role == 1)
                {
                    $respon = "Kemahasiswaan";
                }
                elseif($role->user->role==2)
                {
                    $respon = "BAAK";
                }
                else
                {
                    $respon = "UKM";
                }
                return $respon;
            })
            ->rawColumns(['logout_at','login_at','role','login_successful'])
            ->make(true);
        }

    }
