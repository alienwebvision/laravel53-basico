<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('auth')->only([
//            'contact',
//            'categoria'
//        ]);
//        $this->middleware('auth')
//            ->except([
//                'index',
//                'contact'
//            ]);
    }


    public function index()
    {
        $var1 = '123';
        $xss = '<script>alert("Ataque XSS");</script>';

        $arrayData = [];

        return view('site.home.index', compact('var1', 'xss','arrayData'));


    }

    public
    function contato()
    {
        return view('site.contact.index');
    }

    public
    function categoria(
        $id
    ) {
        return "Listagem dos posts da categoria: {$id}";
    }

    public
    function categoriaOp(
        $id = 1
    ) {
        return "Listagem dos posts da categoria: {$id}";
    }
}
