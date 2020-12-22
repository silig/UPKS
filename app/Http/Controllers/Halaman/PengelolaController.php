<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Pengelola;
use DataTables;
use Validator;
use JsValidator;
use File;
use Response;
use Storage;
use Image;

class PengelolaController extends Controller
{
    protected function Rules() {
     
        $rule = ['nama' => 'required',
                'foto' => 'required|mimes:jpg,png,jpeg|max:1028',
                'jabatan' => 'required'
        		
        		];
        return $rule;
    }

    protected function Pesan(){
    	$pesan = ['nama.required' => 'Nama tidak boleh kosong',
                 'foto.required' => 'foto tidak boleh kosong',
        		 'jabatan.required' => 'jabatan tidak boleh kosong',
        		 'foto.mimes' => 'foto harus berformat gambar',
        		 'foto.max' => 'maksimal 1Mb',
        		];
        return $pesan;
    }

    public function index(){
    	$data = Pengelola::orderBy('id')->paginate(10);
    	$validator = JsValidator::make($this->Rules(),$this->Pesan());
    	return view('halaman.pengelola', compact('data', 'validator'));
    }

    public function store(Request $request){
        
    	$validation = Validator::make($request->all(), $this->Rules(), $this->Pesan());
        if ($validation->fails()) {
            // return redirect()->withInput()->withErrors($validation->errors());
            return response()->json(['error' => $validation->errors()]);
        }

        try {
            // $path = Storage_path('App/public/uploads/pengelola');
            // $lampiran= $request->file('foto')->getClientOriginalName();
            // Image::make($request->file('foto'))->resize(450, 450)->save($path . '/' . $lampiran);
            $lampiran = $this->UploadAble($request->file('foto'));
    	    $anggota = Pengelola::create([
                'nama' => $request->nama,
                'foto' => $lampiran,
                'jabatan' => $request->jabatan
                ]);

    	return response()->json(['success' => 'berhasil']);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()]);
        }
    }

    public function update(Request $request){
    	$data = Pengelola::find($request->id);
    		//hapus file diserver
            if ($request->hasFile('foto')) {
                !empty($data->foto) ? File::delete(public_path('storage/uploads/pengelola/' . $data->foto)):null;
                $foto = $this->UploadAble($request->file('foto'));
            }
            $data->nama = $request->nama;
            $data->foto = $request->hasFile('foto') ? $foto:$data->foto;
            $data->jabatan = $request->jabatan;
            $data->save();

        return redirect()->back()->with('success', 'Data has been saved');
    }

    //untuk upload file
    private function UploadAble($file)
    {
        
        $NamaFile = $file->getClientOriginalName();
        $path = Storage_path('App/public/uploads/pengelola');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 
        Image::make($file)->resize(450, 450)->save($path . '/' . $NamaFile);
        
        //$surat->storeas('public/uploads/pengelola/',$surat1);
        //Storage::make($surat)->save($path . '/' . $surat1); 
        
        return $NamaFile;
    }

    //hapus pengelola
    public function delete($id){
    	$data = Pengelola::find($id);
    	File::delete(public_path('storage/uploads/pengelola/' . $data->foto));
    	$data->delete();

    	return redirect()->back()->with('success', 'Data has been deleted');
    }
}
