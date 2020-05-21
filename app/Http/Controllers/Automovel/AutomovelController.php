<?php

namespace App\Http\Controllers\Automovel;

use App\Http\Controllers\Controller;
use App\Model\Filial;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $filiais = Filial::all();
        return view('pages.automovel.create-edit',compact('filiais'));
    }
    
}
