<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Profil;
use App\Models\Halaman\Service;

class ProfilController extends Controller
{
    public function index(){
    	$model = Profil::orderBy('id')->first();
    	$service = Service::orderBy('id')->get();

    	return view('halaman.profil', compact('model', 'service'));
    }

    public function simpan(Request $request)
    {
        $detail=$request->profil;

        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
        $src = $image->getAttribute('src');
        if (preg_match('/data:image/', $src)) {
            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
            $mimeType = $groups['mime'];
            $path = '/images/' . uniqid('', true) . '.' . $mimeType;
            Storage::disk('s3')->put($path, file_get_contents($src));
            $image->removeAttribute('src');
            $image->setAttribute('src', Storage::disk('s3')->url($path));
        }
        }

        $detail = $dom->savehtml();
        
        $model = Profil::find(1);
        $model->keterangan = $request->profil;
        $model->save();
        
        
        // return view('summernote_display',compact('summernote'));

        return redirect(route('profil.index'));
    }

    public function simpanservice(Request $request){
    	$data = new Service;
    	$data->judul = $request->judul;
    	$data->keterangan = $request->keterangan;
    	$data->save();

    	return redirect()->back()->with('success', $data->judul.' berhasil ditambahkan');
    }

    public function updateservice(Request $request){
    	
    	$data =  Service::find($request->id);
    		if(isset($request->judul)){
    			$data->judul = $request->judul;
    			$data->save();
    		}
    		if(isset($request->keterangan)){
    			$data->keterangan = $request->keterangan;
    			$data->save();
    		}
    	
    	return response()->json($data->id);
    }

    public function hapusservice($id){
        
        $data =  Service::find($id);
        $data->delete();
        
        return redirect()->action('Halaman\ProfilController@index')->with('success', 'Data has been deleted');
    }
}
