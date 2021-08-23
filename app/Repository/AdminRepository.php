<?php

namespace App\Repository;

use Illuminate\Http\Request;
// imports

class AdminRepository
{
    // controller functions
	static public function createNewUser($data)
	{
		
		try {
		$user = User::create($data);
		$saved = $user->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function updateUser($id_User,$data)
	{
		
		try {
		$user = User::find($id_User);
		$user->update($data);
		$saved =$user->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function deleteUser($id_User)
	{
		
		try{
		$deleted = User::find($id_User)->delete();
		return $deleted;
		} catch (\Exception $e) {
		report($e);
		return null;
		}
		
	}
	static public function createNewMaison($data)
	{
		
		try {
		$maison = Maison::create($data);
		$saved = $maison->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function updateMaison($id_Maison,$data)
	{
		
		try {
		$maison = Maison::find($id_Maison);
		$maison->update($data);
		$saved =$maison->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function deleteMaison($id_Maison)
	{
		
		try{
		$deleted = Maison::find($id_Maison)->delete();
		return $deleted;
		} catch (\Exception $e) {
		report($e);
		return null;
		}
		
	}
	static public function createNewConsomation($data)
	{
		
		try {
		$consomation = Consomation::create($data);
		$saved = $consomation->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function updateConsomation($id_Consomation,$data)
	{
		
		try {
		$consomation = Consomation::find($id_Consomation);
		$consomation->update($data);
		$saved =$consomation->save();
		return $saved;
		} catch (\Exception $e) {
		report($e);
		return false;
		}
		
	}
	public static function deleteConsomation($id_Consomation)
	{
		
		try{
		$deleted = Consomation::find($id_Consomation)->delete();
		return $deleted;
		} catch (\Exception $e) {
		report($e);
		return null;
		}
		
	}
}
