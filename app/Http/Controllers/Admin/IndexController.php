<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function title()
    {
        $titlePage = "Inicio";
        return view('admin.admin', compact('titlePage'));
    }

}
