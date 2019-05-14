<?php

namespace App\Http\Controllers;

use App\Http\Models\Circuit;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de los circuitos
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class CircuitController extends Controller
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
     * Permite obtener el listado de circuitos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => Circuit::with(['substation'])->get()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un circuito
     *
     * @param $circuitId Identificador del circuito
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($circuitId)
    {
        try {
            // Eliminamos la informacion
            $circuit = Circuit::findOrFail($circuitId);
            $circuit->delete();

            return response()->json([
                'data' => [
                    'message' => 'Registro eliminado.'
                ]
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'message' => 'Error al eliminar el registro.'
                ]
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Permite agregar un nuevo circuito
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new Circuit())->create([
                'code' => $params['code'],
                'name' => $params['name'],
                'substation_id' => $params['substationId']
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

    /**
     * Permite actualizar un circuito
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $circuit = Circuit::findOrFail($params['id']);
            $circuit->code = $params['code'];
            $circuit->name = $params['name'];
            $circuit->substation_id = $params['substationId'];
            $circuit->save();

            return response()->json([
                'data' => [
                    'message' => 'Registro actualizado.'
                ]
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'message' => 'Error al actualizar el registro.'
                ]
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
