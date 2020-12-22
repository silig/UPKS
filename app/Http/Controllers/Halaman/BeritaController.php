<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Berita;
use App\Models\Halaman\Gambar_berita;
use Storage;
use Validator;
use JsValidator;
use DataTables;
use File;
use DB;

class BeritaController extends Controller
{
	protected function Rules() {
        // $rule['judul'] = 'required';
        // $rule['pengumuman'] = 'required';
        // $rule['lampiran'] = 'required';
        
        $rule = ['judul' => 'required',
        		'konten' => 'required',
        		];
        return $rule;
    }

    protected function Pesan(){
    	$pesan = ['judul.required' => 'Judul tidak boleh kosong',
        		 'konten.required' => 'Pengumuman tidak boleh kosong',
        		];
        return $pesan;
    }

    public function index(Request $request){
    	$data = Berita::orderBy('id', 'desc')->get();
    	
    	if ($request->ajax()){
            return DataTables::of($data)->toJson();
        }

        
    	return view('halaman.berita', compact('data'));
    }

    public function create(Request $request){

    	$validator = JsValidator::make($this->Rules());

        return view('berita.create', compact('validator'));
    }

	public function store(Request $request)
    {
    	
		$detail=$request->berita;

		$dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
		$gambar = array();
		$i = 0;
		foreach($images as $k => $img){
			$data = $img->getattribute('src');

			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);

			$data = base64_decode($data);
			$image_name= time().$k.'.png';
			$path = public_path() .'/Halaman/Berita/'. $image_name;

			file_put_contents($path, $data);

			$img->removeattribute('src');
			$img->setattribute('src', asset('/Halaman/Berita/'. $image_name));
            //$img->setattribute('src', $image_name);

			$gambar[$k]['pict'] = $image_name;
		}

		
		$detail = $dom->savehtml();
		$summernote = new Berita;
		$summernote->judul = $request->judul;
		$summernote->konten = $detail;
		$summernote->summary = $request->summary;
		$summernote->save();

        //menyimpan gambar ke database
		foreach ($gambar as $key => $value) {
			$gambar = new Gambar_berita;
			$gambar->gambar = $value['pict'];
			$gambar->berita_id = $summernote->id;
			$gambar->save();
		}

		return response()->json(['gambar' => $gambar]);
        //return redirect()->action('Halaman\BeritaController@index')->with('success', 'Data has been saved');
			    
    }

    public function edit($id){
    	$data = Berita::find($id);

    	return view('berita.edit', compact('data'));
    }

    //update masih error gak tau kenapa
    public function update(Request $request){
    	
    	$detail=$request->berita;

		$dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        
		foreach($images as $k => $img){
			$data = $img->getattribute('src');

			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);

			$data = base64_decode($data);
			$image_name= time().$k.'.png';
			$path = public_path() .'/Halaman/Berita/'. $image_name;

			file_put_contents($path, $data);

			$img->removeattribute('src');
			$img->setattribute('src', asset('/Halaman/Berita/'. $image_name));

		}

		$detail = $dom->savehtml();

		$summernote = Berita::find($request->id);
		$summernote->judul = $request->judul;
		$summernote->konten = $detail;
		$summernote->summary = $request->summary;
		$summernote->save();

		return response()->json('berhasil');

    }

    public function delete($id){
    	$delete = Berita::find($id);
    	$delete->delete();

    	$gambar = Gambar_berita::where('berita_id', $id)->get();
    	foreach ($gambar as $key => $value) {
    		File::delete(public_path('Halaman/Berita/'.$value->gambar));
    	}
    	

    	DB::table('halaman_gambar_berita')->where('berita_id', $id)->delete();

    	return redirect()->action('Halaman\BeritaController@index')->with('success', 'Data has been saved');
    }

    public function show($id){
        $berita = Berita::find($id);

        if(isset($berita)){
            $newer = DB::select(DB::raw("select a.id,judul, summary, a.created_at, (select gambar from halaman_gambar_berita b where a.id = b.berita_id limit 1) gambar ,
                (select id from halaman_gambar_berita b where a.id = b.berita_id limit 1) id_gambar
                from halaman_berita a order by a.id desc limit 4"));

            return view('berita.show', compact('berita', 'newer'));
        }else{
            return view('template.errors.404');
        }
    }
}
