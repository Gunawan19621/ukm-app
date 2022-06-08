<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserVerificationController extends Controller
{
    private $status;
    private $message;
    private $data;
    private $user;

    public function __construct()
    {
        $this->status = "INVALID";
        $this->message = "There is something wrong!";
        $this->data = [];
    }

    public function index()
    {
        return view('dashboard.log-activity.verification',[
            'title'=>'User Verification Page'
        ]);
    }

    public function checkQRCode(Request $request)
    {
        $qrCode = [];
        if (trim($request->get('qrCode'))) {
            // format code : appName/userId/emailUser/expire/signature
            $qrCode = explode('/', trim($request->get('qrCode')));
        } else {
            $this->setResponse('VALID', 'Invalid QR code');
            return response()->json($this->getResponse());
        }

        try {
            $this->checkUser($qrCode[1]);
            $this->checkEmail($qrCode[2]);
            $this->checkVerifiedEmail();
            $this->checkSignature($qrCode[0], $qrCode[3], $qrCode[4]);
            $this->checkExpire($qrCode[3]);
            $this->setResponse('VALID', "Valid QR code", [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'verified' => false,
            ]);
            return response()->json($this->getResponse());
        } catch (\Throwable $th) {
            return response()->json($this->getResponse());
        }
    }

    public function verify(Request $request)
    {
        $email = "";
        if (trim($request->get('email'))) {
            $email = trim($request->get('email'));
        } else {
            $this->setResponse('INVALID', 'Invalid email');
            return response()->json($this->getResponse());
        }
        try {
            $this->user = User::where('email', $email)->first();
            $this->user->markEmailAsVerified();
            $this->setResponse('VERIFIED', "User has been successfully verified", [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'verified' => true,
            ]);
            return response()->json($this->getResponse());
        } catch (\Throwable $th) {
            return response()->json($this->getResponse());
        }
    }

    //private
    private function checkUser($id)
    {
        $this->user = User::find($id);
        if (!$this->user) {
            $this->setResponse('INVALID', "Invalid QR code");
            throw new \Throwable();
        }
    }

    private function checkEmail($email)
    {
        if (!hash_equals((string) $email, sha1($this->user->email))) {
            $this->setResponse('INVALID', "Invalid QR code");
            throw new \Throwable();
        }
    }

    private function checkSignature($appName, $expire, $signature)
    {
        $appKey = config('app.key');
        $plainText = implode("/", [$appName, $this->user->id, sha1($this->user->getEmailForVerification()), $expire]);
        $original = hash_hmac('sha256', $plainText, $appKey);
        if (!hash_equals($original, $signature)) {
            $this->setResponse('INVALID', "Invalid QR code");
            throw new \Throwable();
        }
    }

    private function checkExpire($expire)
    {
        if (Carbon::now()->getTimestamp() > (int) $expire) {
            $this->setResponse('INVALID', 'QR code has expired!');
            throw new \Throwable();
        }
    }

    private function checkVerifiedEmail()
    {
        if ($this->user->hasVerifiedEmail()) {
            $this->setResponse(
                'INVALID',
                'The user has been verified on ' . $this->user->email_verified_at->isoFormat("dddd, D MMMM Y H:mm:ss"),
                [
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                    'verified' => true,
                    ]
                );
                throw new \Throwable();
            }
        }

        private function setResponse($status = "INVALID", $message = "There is something wrong!", $data = [])
        {
            $this->status = $status;
            $this->message = $message;
            $this->data = $data;
        }

        private function getResponse()
        {
            return [
                'status' => $this->status,
                'message' => $this->message,
                'data' => $this->data ? $this->data : null
            ];
        }
    }
