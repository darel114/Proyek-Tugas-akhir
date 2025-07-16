<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', [
            'categoryCount' => \App\Models\Category::count(),
            'contentCount' => \App\Models\Content::count(),
            'latestContents' => \App\Models\Content::latest()->take(3)->get(),
        ]);
    }

    public function home()
    {
        // Memuat semua kategori beserta subkategori dan konten di dalamnya
        $categories = Category::with('subCategories.contents')->get();

        return view('user.home', compact('categories'));
    }

    public function kategori($slug)
    {
        $category = Category::where('slug', $slug)->with('subcategories.contents')->firstOrFail();
        return view('user.kategori', compact('category'));
    }

    public function konten($slug)
    {
        $konten = Content::where('slug', $slug)->with('subcategory.category')->firstOrFail();
        $latestContents = Content::where('slug', '!=', $slug)
                                 ->latest()
                                 ->take(3)
                                 ->get();
        return view('user.konten', compact('konten', 'latestContents'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function message()
    {
        return view('user.pesan');
    }
}