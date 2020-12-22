<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Kontak;

class KontakController extends Controller
{
    public function index(){
    	$data = Kontak::orderBy('id')->get();
    	return view('halaman.kontak', compact('data'));
    }

    public function store(Request $request){
    	Kontak::create([
    		'hp' => $request->nohp,
    		'email' => $request->email
    		]);

    	return redirect()->action('Halaman\KontakController@index')->with('success', 'Data has been saved');
    }

    public function update($id, Request $request ){
    	$data = Kontak::find($id);
    	$data->hp = $request->nohp;
    	$data->email = $request->email;
    	$data->save();

    	return redirect()->action('Halaman\KontakController@index')->with('success', 'Data has been saved');
    }
}
