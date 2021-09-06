<?php

namespace App\Http\Controllers;

use App\Maison;
use App\Region;
use App\Repository\AdminRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// imports

class AdminController extends Controller
{
    //interface
    public function I_dashboard(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->Type_User == 1)
                return ClientController::I_maison();
            if (Auth::user()->Type_User == -99)
                return view("admin.index");
        } else
            return view("guest.login");
    }

    public function I_maisons(Request $request)
    {
        $maisons = Maison::all();
        $regions = Region::all();
        $clients = User::all();
        return view("admin.maisons")->with([
            'regions' => $regions,
            'maisons' => $maisons,
            'clients' => $clients,
        ]);
    }

    public function I_maison($id)
    {
        $maison = Maison::find($id);
        $consomation = $maison->getAllConsomations();
        $lastConsomation = $maison->getLastConsomations();
        return view("admin.singleMaison")->with([
            'maison' => $maison,
            'consomations' => $consomation,
            'lastConsomation' => $lastConsomation,
        ]);
    }

    public function I_clients(Request $request)
    {
        $clients = User::getAllClient();
        return view("admin.clients")->with([
            'clients' => $clients,
        ]);
    }

    public function I_client($id)
    {
        $client = User::find($id);
        $maisons = $client->getAllMaisons();
        $regions = Region::all();
        return view("admin.singleClient")->with([
            'client' => $client,
            'maisons' => $maisons,
            'regions' => $regions,
        ]);
    }

    public function createNewMaison(Request $request)
    {
        $request->validate(['clientCheck' => 'required',]);
        $clientCheck = $request->input('clientCheck');

        if ($clientCheck == "true") {

            $request->validate([
                'name' => 'required',
                'email' => 'required | unique:users,Email_User',
                'address' => 'required',
                'ville' => 'required',
                'conteur' => 'required | unique:maisons,id_Maison',
            ]);
            $dataUser = [
                'Name_User' => $request->input('name'),
                'Email_User' => $request->input('email'),
                'password' => bcrypt($request->input('name')),
                'Img_User' => null,
                'Type_User' => 1,
            ];

            // Sending data to our repository
            $success = AdminRepository::createNewUser($dataUser);
            if ($success) {
                $idUser = User::orderBy('id_User', 'desc')->first();
                $dataMaison = [
                    'id_Maison' => $request->input('conteur'),
                    'Adresse_Maison' => $request->input('address'),
                    'Id_Ville' => $request->input('ville'),
                    'Id_User' => $idUser->id_User,
                ];
                $success = AdminRepository::createNewMaison($dataMaison);
                return response()->json([
                    'Success' => $success,
                    'id' => $idUser,
                ]);
            } else
                return response()->json([
                    'Success' => $success
                ]);
        } else {
            $request->validate([
                'client' => 'required',
                'address' => 'required',
                'ville' => 'required',
                'conteur' => 'required | unique:maisons,id_Maison',
            ]);
            $dataMaison = [
                'id_Maison' => $request->input('conteur'),
                'Adresse_Maison' => $request->input('address'),
                'Id_Ville' => $request->input('ville'),
                'Id_User' => $request->input('client'),
            ];
            $success = AdminRepository::createNewMaison($dataMaison);
            return response()->json([
                'Success' => $success,
            ]);
        }


    }

    public function listVille(Request $request)
    {
        $request->validate([
            'region' => 'required',
        ]);
        $idRegion = $request->input('region');
        $region = Region::find($idRegion);

        if ($region != null) {
            $villes = $region->getAllVilles();
            return response()->json([
                'Success' => 1,
                'villes' => $villes,
            ]);
        } else
            return response()->json([
                'Success' => false,
            ]);
    }

    // controller functions
    public function addUser(Request $request)
    {
        $request->validate([
            'email' => 'required | unique:users,Email_User',
            'type' => 'required',
        ]);

        $data = [
            'Name_User' => $request->input('name'),
            'Email_User' => $request->input('email'),
            'password' => bcrypt($request->input('name')),
            'Img_User' => null,
            'Type_User' => $request->input('type'),
        ];

        // Sending data to our repository
        $success = AdminRepository::createNewUser($data);
        $idUser = User::orderBy('id_User', 'desc')->first();
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success,
            'idUser' => $idUser->id_User,
        ]);

    }

    public function editUser(Request $request)
    {

        $request->validate([
            'Email' => 'required | unique:users,Email_User',
            'password' => 'required',
            'Type' => 'required',
        ]);

        $data = [
            'Name_User' => null,
            'Email_User' => $request->input('Email'),
            'password' => bcrypt($request->input('password')),
            'Img_User' => null,
            'Type_User' => $request->input('Type'),
        ];

        // Sending data to our repository
        $success = AdminRepository::updateUser($request->input('id'), $data);
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function deleteUser(Request $request)
    {

        // Sending request to our repository
        $success = AdminRepository::deleteUser($request->input('id'));
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function addMaison(Request $request)
    {

        $request->validate([
            'Id_Ville' => 'required',
            'Adresse_Maison' => 'required',
            'Id_User' => 'required | unique:maisons,Id_User',
        ]);

        $data = [
            'Adresse_Maison' => null,
            'Id_Ville' => $request->input('Id_Ville'),
            'Id_User' => $request->input('Id_User'),
        ];

        // Sending data to our repository
        $success = AdminRepository::createNewMaison($data);
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function editMaison(Request $request)
    {

        $request->validate([
            'Id_Ville' => 'required',
            'Id_User' => 'required | unique:maisons,Id_User',
        ]);

        $data = [
            'Adresse_Maison' => null,
            'Id_Ville' => $request->input('Id_Ville'),
            'Id_User' => $request->input('Id_User'),
        ];

        // Sending data to our repository
        $success = AdminRepository::updateMaison($request->input('id'), $data);
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function deleteMaison(Request $request)
    {

        // Sending request to our repository
        $success = AdminRepository::deleteMaison($request->input('id'));
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function addConsomation(Request $request)
    {

        $request->validate([
            'Isactive' => 'required',
            'Id_Maison' => 'required',
        ]);

        $data = [
            'Courrant_Consomation' => $request->input('courrant'),
            'Tension_Consomation' => $request->input('tension'),
            'Energie_Consomation' => $request->input('energie'),
            'Facteurpuissance_Consomation' => $request->input('Fpuissance'),
            'Frequence_Consomation' => $request->input('frequence'),
            'PuissanceW_Consomation' => $request->input('puissance'),
            'Isactive_Consomation' => $request->input('Isactive'),
            'Id_Maison' => $request->input('Id_Maison'),
        ];

        // Sending data to our repository
        $success = AdminRepository::createNewConsomation($data);
        // returning results
        if ($success)
            return back()->with(['success_msg' => 'Success!']);
        return back()->with('error_msg', 'Erreur !!');

    }

    public function setConsomation(Request $request)
    {
        $request->validate([
            'isActive' => 'required',
            'id' => 'required',
        ]);
        $isActive = ($request->input('isActive') == "true") ? 0 : 1;
        $data = [
            'Isactive_Consomation' => $isActive,
        ];
        $id_Consomation = $request->input('id');

        $success = AdminRepository::updateConsomation($id_Consomation, $data);
        // returning results
        return response()->json([
            'Success' => $success
        ]);

    }

    public function editConsomation(Request $request)
    {

        $request->validate([
            'Isactive' => 'required',
            'Id_Maison' => 'required',
        ]);

        $data = [
            'Courrant_Consomation' => null,
            'Tension_Consomation' => null,
            'Energie_Consomation' => null,
            'Facteurpuissance_Consomation' => null,
            'Frequence_Consomation' => null,
            'PuissanceW_Consomation' => null,
            'Isactive_Consomation' => $request->input('Isactive'),
            'Id_Maison' => $request->input('Id_Maison'),
        ];

        // Sending data to our repository
        $success = AdminRepository::updateConsomation($request->input('id'), $data);
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }

    public function deleteConsomation(Request $request)
    {

        // Sending request to our repository
        $success = AdminRepository::deleteConsomation($request->input('id'));
        // returning results
        //return back()->with('Success', $status);
        return response()->json([
            'Success' => $success
        ]);

    }
}
