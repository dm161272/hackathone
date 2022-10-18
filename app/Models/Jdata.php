<?php

/**
 *   'barri', 'titulats', 'aturats','renda_familiar', 'over_65', 'index_sobreenvelliment';
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jdata extends Model
{
    protected $fillable = ['user_id', 'barri', 'titulats',
    'aturats',  'renda_familiar', 'over_65', 'index_sobreenvelliment'];


   /**
     * Get database content form JSON data file.
     *
     * @return \Illuminate\Http\Response
     */
    public function getJson($name)
    {
        $name = file_get_contents($name); 
        $jdata = json_decode($name, true);
        //dd($jdata);
        foreach($jdata as $j) {
        Jdata::create($j);
        }

    }




   /**
     * Display all barris data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Jdata::select('id', 'barri', 'titulats', 'aturats', 'renda_familiar',  'over_65', 'index_sobreenvelliment' )
        ->get();
    }

    /**
     * Display specified barri data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBarri($id)
    {
        return Jdata::select('id', 'barri', 'titulats', 'aturats', 'renda_familiar',  'over_65', 'index_sobreenvelliment')
        ->where('id', $id)
        ->get();
    }

  
    



}

