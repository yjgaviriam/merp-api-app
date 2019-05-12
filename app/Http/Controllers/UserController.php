<?php

namespace App\Http\Controllers;

use App\Http\Models\Contract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de los contratos
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class ContractController extends Controller
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

    /**
     * Permite obtener el listado de contratos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => Contract::all()
        ], Response::HTTP_OK);
    }

    public function destroy()
    {

    }

    public function show()
    {

    }

    /**
     * Permite agregar un nuevo contrato
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new Contract())->create([
                'code' => $params['code'],
                'date' => $params['date']
            ]);

            return response()->json([
                'data' => [
                    'message' => 'Registro creado.'
                ]
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'message' => 'Error al crear el registro.'
                ]
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update()
    {

    }
}
