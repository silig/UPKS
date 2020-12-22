<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Panduan;
use DataTables;
use Validator;
use JsValidator;
use App\Traits\UploadAble;
use File;
use Response;
use Storage;

class PanduanController extends Controller
{
    protected function Rules() {
        $rule = ['judul' => 'required',
        		
        		'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx'
        		];
        return $rule;
    }

    protected function Pesan(){
    	$pesan = ['judul.required' => 'Judul tidak boleh kosong',
        		 'file.mimes' => 'hanya format pdf,doc,docx,xls,xlsx'
        		];
        return $pesan;
    }

    public function index(Request $request){
    	$model = Panduan::orderBy('id', 'desc')->get();
    	if ($request->ajax()){
            return DataTables::of($model)->toJson();
        }
        $validator = JsValidator::make($this->Rules(), $this->Pesan());
    	return view('halaman.panduan', compact('model','validator'));
    }

    public function simpan(Request $request){

    	$validation = Validator::make($request->all(), $this->Rules(), $this->Pesan());
        if ($validation->fails()) {
            return redirect()->withInput()->withErrors($validation->errors());
        }

        try {
            if ($request->hasFile('file')) {
                $lampiran = $this->UploadAble($request->file('file'));    
            }else{
                $lampiran = null;
            }
            
    	    $anggota = Panduan::create([
                'judul' => $request->judul,
                'file' => $lampiran,
                ]);

    	return response()->json(['success' => 'berhasil']);
        } catch (\Exception $e) {
            return response()->withErrors($e->getMessage());
        }

    }

    public function update(Request $request){
    	
    		$data = Panduan::find($request->id);
            if ($request->hasFile('file')) {
                !empty($data->file) ? File::delete(public_path('storage/uploads/panduan/' . $data->file)):null;
                $lampiran = $this->UploadAble($request->file('file'));
            }
            $data->judul = $request->judul;
            $data->pengumuman = $request->pengumuman;
            $data->lampiran = $request->hasFile('file') ? $lampiran:$data->file;
            $data->save();

    	return response()->json(['success' => 'berhasil']);
        
    }

    public function delete($id){
    	
	    	$data = Panduan::find($id);
	    	!empty($data->file) ? File::delete(public_path('storage/uploads/panduan/' . $data->file)):null;
	    	$data->delete();

	    	return redirect()->back()->with('success', 'Data has been deleted');

    }

    public function Find(Request $request){	
    	
    	$data = Panduan::find($request->input('id'));

    	return response()->json($data);
    }

    private function UploadAble($surat)
    {
        
        $surat1 = $surat->getClientOriginalName();
        $path = Storage_path('App/public/uploads/panduan');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 
        $surat->storeas('public/uploads/panduan/',$surat1);
        //Storage::make($surat)->save($path . '/' . $surat1); 
        //Image::make($photo)->save($path . '/' . $images);
        return $surat1;
    }
}
