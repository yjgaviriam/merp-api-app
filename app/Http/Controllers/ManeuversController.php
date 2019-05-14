<?php

namespace App\Http\Controllers;

use App\Http\Models\Maneuvers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de las maniobras
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class ManeuversController extends Controller
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
     * Permite obtener el listado de las maniobras
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' =>Maneuvers::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un personal
     *
     * @param $maneuversId Identificador de las maniobra
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($maneuversId)
    {
        try {
            // Eliminamos la informacion
            $maneuvers = Maneuvers::findOrFail($maneuversId);
            $maneuvers->delete();

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
     * Permite agregar una nueva maniobra
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new Maneuvers())->create([
                'action' => $params['action'],
                'element' => $params['element'],
                'date' => $params['date'],
                'description' => $params['description'],
                'project_id' => $params['project_id']
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
     * Permite actualizar la maniobra
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $maneuvers = Maneuvers::findOrFail($params['maneuversId']);
            $maneuvers->action = $params['action'];
            $maneuvers->element = $params['element'];
            $maneuvers->date = $params['date'];
            $maneuvers->description = $params['description'];
            $maneuvers->project_id = $params['project_id'];

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
