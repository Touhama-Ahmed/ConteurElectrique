<?php

namespace App\Http\Controllers;

use App\Maison;
use App\Region;
use App\User;
use Illuminate\Http\Request;
// imports
use App\Repository\AdminRepository;

class AdminController extends Controller
{
    //interface
    public function I_dashboard(Request $request){
        return view("admin.index");
    }
    public function I_clients(Request $request){
        $regions = Region::all();
        return view("admin.clients")->with([
            'regions' => $regions,
        ]);
    }
    public function createNewClient(Request $request){
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
            'password' => $request->input('name'),
            'Img_User' => null,
            'Type_User' => 1,
        ];

        // Sending data to our repository
        $success = AdminRepository::createNewUser($dataUser);
        if ($success){
            $idUser = User::orderBy('id_User', 'desc')->first();
            $dataMaison = [
                'id_Maison' => $request->input('conteur'),
                'Adresse_Maison' => $request->input('address'),
                'Id_Ville' => $request->input('ville'),
                'Id_User' => $idUser->id_User,
            ];
            $success = AdminRepository::createNewMaison($dataMaison);
            $idMaison = Maison::orderBy('id_Maison', 'desc')->first();
            return response()->json([
                'Success' => $success,
                'client'  => $dataMaison,
            ]);
        } else
            return response()->json([
                'Success' => $success
            ]);
    }

    public function listVille(Request $request){
        $request->validate([
            'region' => 'required',
        ]);
        $idRegion = $request->input('region');
        $region = Region::find($idRegion);

        if ($region != null){
            $villes = $region->getAllVilles();
            return response()->json([
                'Success' => 1,
                'villes'  => $villes,
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
			'Email' => 'required | unique:users,Email_User',
			'password' => 'required',
			'Type' => 'required',
		]);

		$data = [
			'Name_User' => $request->input('name'),
			'Email_User' => $request->input('Email'),
			'password' => $request->input('password'),
			'Img_User' => null,
			'Type_User' => $request->input('Type'),
		];

		// Sending data to our repository
		$success = AdminRepository::createNewUser($data);
		// returning results
		//return back()->with('Success', $status);
		return response()->json([
		'Success' => $success
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
			'password' => $request->input('password'),
			'Img_User' => null,
			'Type_User' => $request->input('Type'),
		];

		// Sending data to our repository
		$success = RepositoryName::updateUser($request->input('id'), $data);
		// returning results
		//return back()->with('Success', $status);
		return response()->json([
		'Success' => $success
		]);

	}
	public function deleteUser(Request $request)
	{

		// Sending request to our repository
		$success = RepositoryName::deleteUser($request->input('id'));
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
		$success = RepositoryName::createNewMaison($data);
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
		$success = RepositoryName::updateMaison($request->input('id'), $data);
		// returning results
		//return back()->with('Success', $status);
		return response()->json([
		'Success' => $success
		]);

	}
	public function deleteMaison(Request $request)
	{

		// Sending request to our repository
		$success = RepositoryName::deleteMaison($request->input('id'));
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
		$success = RepositoryName::createNewConsomation($data);
		// returning results
		//return back()->with('Success', $status);
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
		$success = RepositoryName::updateConsomation($request->input('id'), $data);
		// returning results
		//return back()->with('Success', $status);
		return response()->json([
		'Success' => $success
		]);

	}
	public function deleteConsomation(Request $request)
	{

		// Sending request to our repository
		$success = RepositoryName::deleteConsomation($request->input('id'));
		// returning results
		//return back()->with('Success', $status);
		return response()->json([
		'Success' => $success
		]);

	}
}
