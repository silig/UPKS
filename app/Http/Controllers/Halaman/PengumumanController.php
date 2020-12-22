<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Pengumuman;
use DataTables;
use Validator;
use JsValidator;
use App\Traits\UploadAble;
use File;
use Response;
use Storage;

class PengumumanController extends Controller
{
	protected function Rules() {
        // $rule['judul'] = 'required';
        // $rule['pengumuman'] = 'required';
        // $rule['lampiran'] = 'required';
        
        $rule = ['judul' => 'required',
        		'pengumuman' => 'required',
        		'lampiran' => 'nullable|mimes:jpg,png,jpeg,pdf,doc,docx|max:2048'
        		];
        return $rule;
    }

    protected function Pesan(){
    	$pesan = ['judul.required' => 'Judul tidak boleh kosong',
        		 'pengumuman.required' => 'Pengumuman tidak boleh kosong',
                 'lampiran.max' => 'maksimal 2Mb',
        		 'lampiran.mimes' => 'hanya format gambar,pdf,doc'
        		];
        return $pesan;
    }

    public function index(Request $request){
    	$model = Pengumuman::orderBy('id', 'desc')->get();
    	if ($request->ajax()){
            return DataTables::of($model)->toJson();
        }
        $validator = JsValidator::make($this->Rules(), $this->Pesan());
    	return view('halaman.pengumuman', compact('model','validator'));
    }

    public function simpan(Request $request){

    	$validation = Validator::make($request->all(), $this->Rules(), $this->Pesan());
        if ($validation->fails()) {
            return redirect()->withInput()->withErrors($validation->errors());
        }

        try {
            if ($request->hasFile('lampiran')) {
                $lampiran = $this->UploadAble($request->file('lampiran'));    
            }else{
                $lampiran = null;
            }
            
    	    $anggota = Pengumuman::create([
                'judul' => $request->judul,
                'pengumuman' => $request->pengumuman,
                'tanggal' => now(),
                'lampiran' => $lampiran,
                ]);

    	return response()->json(['success' => 'berhasil']);
        } catch (\Exception $e) {
            return response()->withErrors($e->getMessage());
        }

    }

    public function update(Request $request){
    	
    		$data = Pengumuman::find($request->id);
            if ($request->hasFile('lampiran')) {
                !empty($data->lampiran) ? File::delete(public_path('storage/uploads/pengumuman/' . $data->lampiran)):null;
                $lampiran = $this->UploadAble($request->file('lampiran'));
            }
            $data->judul = $request->judul;
            $data->pengumuman = $request->pengumuman;
            $data->lampiran = $request->hasFile('lampiran') ? $lampiran:$data->lampiran;
            $data->save();

    	return response()->json(['success' => 'berhasil']);
        
    }

    public function delete($id){
    	
	    	$data = Pengumuman::find($id);
	    	!empty($data->lampiran) ? File::delete(public_path('storage/uploads/pengumuman/' . $data->lampiran)):null;
	    	$data->delete();

	    	return redirect()->back()->with('success', 'Data has been deleted');

    }

    public function Find(Request $request){	
    	
    	$data = Pengumuman::find($request->input('id'));

    	return response()->json($data);
    }

    private function UploadAble($surat)
    {
        
        $surat1 = $surat->getClientOriginalName();
        $path = Storage_path('App/public/uploads/pengumuman');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 
        $surat->storeas('public/uploads/pengumuman/',$surat1);
        //Storage::make($surat)->save($path . '/' . $surat1); 
        //Image::make($photo)->save($path . '/' . $images);
        return $surat1;
    }
}
