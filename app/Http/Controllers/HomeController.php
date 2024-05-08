<?php

namespace App\Http\Controllers;

use App\Models\Apps;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $products = Apps::with(['category'])->get();

        return Inertia::render('Home', [
            'products' => $products,
        ]);
    }
}
