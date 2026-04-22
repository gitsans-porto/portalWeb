<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\News;

use App\Models\Service;

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

        return view('beranda', compact('layananList', 'latestNews'));
    }

    /**
     * Halaman Detail Layanan
     */
    public function layanan(string $slug)
    {
        $layanan = Service::where('slug', $slug)->firstOrFail();
        
        // Fetch 3 other services for the "Layanan Lainnya" section
        $otherServices = Service::where('slug', '!=', $slug)
                                ->take(3)
                                ->get();

        return view('layanan', compact('layanan', 'otherServices'));
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
     * Halaman Kepala Sekolah
     */
    public function kepalaSekolah()
    {
        $profile = Profile::where('section', 'kepala_sekolah')->firstOrFail();
        return view('profil.kepala-sekolah', compact('profile'));
    }
}
