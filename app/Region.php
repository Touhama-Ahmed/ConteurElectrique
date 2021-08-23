<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Region extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_Region';

    //CRUD methods
    static public function createNewRegion($data){

        try {
            $region = Region::create($data);
            return $region->save();

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function updateThisRegion($data){
        try {
            $this->update($data);
            return $this->save();
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function deleteThisRegion(){
        try{
            return Region::find($this->id_Region)->delete();
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    //static methods

    //methods

    public function getAllVilles(){
        return Ville::where('Id_Region', $this->id_Region)->orderBy('created_at','desc')->get();
        //returns array of Villes
    }

}
