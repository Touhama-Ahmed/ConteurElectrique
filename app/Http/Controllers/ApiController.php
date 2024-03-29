<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addConsomation(Request $request)
    {
//        http://127.0.0.1:8000/addConsomation?Id_Maison=123&Isactive=1&courrant=14&tension=2&energie=45&Fpuissance=3&frequence=47&puissance=14
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
            return back()->with(['success_msg'=>'Success!']);
        return back()->with('error_msg','Erreur !!');

    }
}
