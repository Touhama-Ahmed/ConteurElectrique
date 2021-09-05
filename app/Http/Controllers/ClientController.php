<?php

namespace App\Http\Controllers;

use App\Maison;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// imports

class ClientController extends Controller
{
    public function I_maisons(Request $request)
    {
        $user = User::find(Auth::user()->id_User);
        $maisons = $user->getAllMaisons();
        return view("client.maisons")->with([
            'maisons' => $maisons,
        ]);
    }
    public function I_maison($id)
    {
        $maison = Maison::find($id);
        $consomation = $maison->getAllConsomations();
        $lastConsomation = $maison->getLastConsomations();
        return view("client.singleMaison")->with([
            'maison' => $maison,
            'consomations' => $consomation,
            'lastConsomation' => $lastConsomation,
        ]);
    }

}
