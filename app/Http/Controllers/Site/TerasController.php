<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halaman\Pengumuman;
use App\Models\Halaman\Profil;
use App\Models\Halaman\Service;
use App\Models\Halaman\Kontak;
use App\Models\Halaman\Berita;
use App\Models\Halaman\Pengelola;
use App\Models\Halaman\Panduan;
use DB;

class TerasController extends Controller
{
    public function index(){
    	$pengumuman = Pengumuman::orderBy('id', 'desc')->limit(3)->get();
    	$service = Service::orderBy('id')->get();
        $berita = Berita::orderBy('id', 'desc')->limit(3)->get();
    	$id = Service::orderBy('id', 'asc')->first();
    	$id = $id->id;
        $news = DB::select(DB::raw("select a.id,judul, summary, a.created_at, (select gambar from halaman_gambar_berita b where a.id = b.berita_id limit 1) gambar ,
            (select id from halaman_gambar_berita b where a.id = b.berita_id limit 1) id_gambar
            from halaman_berita a order by a.id desc limit 3"));
    	return view('beranda.index', compact('pengumuman', 'service','id', 'news'));
    }

    public function kontak(){
    	$hp = Kontak::select('hp')->orderBy('id')->get();
    	$email = Kontak::select('email')->orderBy('id')->get();
    	return view('beranda.kontak', compact('hp', 'email'));
    }

    public function pengumuman(){

    	$data = Pengumuman::orderby('id', 'desc')->paginate(10);
    	
    	return view('beranda.pengumuman', compact('data'));
    }

    public function profil(){
    	$profil = Profil::find(1);
        $service = Service::orderBy('id')->get();
    	$id = Service::orderBy('id', 'asc')->first();
    	$id = $id->id;
    	return view('beranda.profil', compact('profil', 'service', 'id'));
    }

    public function berita(){

        $berita = Berita::orderby('id', 'desc')->paginate(2);
        $newer = DB::select(DB::raw("select a.id,judul, summary, a.created_at, (select gambar from halaman_gambar_berita b where a.id = b.berita_id limit 1) gambar ,
            (select id from halaman_gambar_berita b where a.id = b.berita_id limit 1) id_gambar
            from halaman_berita a order by a.id desc limit 4"));

        return view('beranda.berita', compact('berita', 'newer'));
    }

    public function pengelola(){
        $pengelola = Pengelola::orderBy('id')->get();

        return view('beranda.pengelola', compact('pengelola'));
    }

    public function kerjasama(){

        return view('beranda.kerjasama');
    }

    public function panduan(){
        $panduan = Panduan::orderBy('id')->get();

        return view('beranda.panduan', compact('panduan'));
    }
}
