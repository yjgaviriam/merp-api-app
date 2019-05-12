<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Controlador dedicado al manejo de la logica de las subestaciones
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class SubstationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store()
    {

    }
}
