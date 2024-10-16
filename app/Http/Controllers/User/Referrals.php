<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Bonus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Referrals extends Controller
{
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'Referrals',
            'siteName'=>$web->name,
            'referrals'=>User::where('referral',$user->id)->get(),
            'bonus'=>Bonus::where('user',$user->id)->where('type',1)->sum('amount'),
        ];

        return view('user.referrals',$dataView);
    }
}
