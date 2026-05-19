<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\News;
use App\Models\Service;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;

class PortalController extends Controller
{
    /**
     * Halaman Beranda
     */
    public function index()
    {
        $layananList = Service::select(['slug', 'name', 'tagline', 'description', 'color', 'icon'])
                             ->get();

        $latestNews = News::whereNotNull('published_at')
                          ->where('published_at', '<=', now())
                          ->orderBy('published_at', 'desc')
                          ->take(3)
                          ->get();

        $kepalaSekolah = Profile::where('section', 'kepala_sekolah')->first();
        $sejarahSekolah = Profile::where('section', 'sejarah')->first();
        $galleries = \App\Models\Gallery::latest()->take(6)->get();

        $rawSettings = Setting::all();
        $settings = [];
        foreach ($rawSettings as $s) {
            $settings[$s->key] = $s->value;
            $settings[$s->key . '_label'] = $s->label;
        }

        return view('beranda', compact('layananList', 'latestNews', 'kepalaSekolah', 'sejarahSekolah', 'galleries', 'settings'));
    }

    /**
     * Halaman Detail Layanan (Informasi)
     */
    public function layanan(string $slug)
    {
        $layanan = Service::where('slug', $slug)->firstOrFail();
        
        // Fetch other services for navigation sidebar
        $otherServices = Service::where('slug', '!=', $slug)->get();

        return view('layanan', compact('layanan', 'otherServices'));
    }

    /**
     * Halaman Dokumentasi / Panduan Lengkap Layanan
     */
    public function dokumentasi(string $slug)
    {
        $layanan = Service::where('slug', $slug)->firstOrFail();

        return view('layanan.dokumentasi', compact('layanan'));
    }

    /**
     * Halaman Tentang Sekolah
     */
    public function tentangSekolah()
    {
        $profile = Profile::where('section', 'tentang_sekolah')->firstOrFail();
        return view('profil.tentang-sekolah', compact('profile'));
    }

    /**
     * Halaman Visi & Misi
     */
    public function visiMisi()
    {
        $profile = Profile::where('section', 'visi_misi')->firstOrFail();
        return view('profil.visi-misi', compact('profile'));
    }


    /**
     * Download Panduan PDF Layanan
     */
    public function downloadPanduan(string $slug)
    {
        $layanan = Service::where('slug', $slug)->firstOrFail();
        
        $pdf = Pdf::loadView('layanan.panduan-pdf', compact('layanan'));
        
        return $pdf->download('panduan-' . $layanan->slug . '.pdf');
    }
}
