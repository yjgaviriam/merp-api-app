<?php

namespace App\Http\Controllers;

use App\Http\Models\Structure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de una estructura
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class StructureController extends Controller
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
     * Permite obtener el listado de una estructura
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => Structure::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar una estructura
     *
     * @param $structureId Identificador de una estructura
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($structureId)
    {
        try {
            // Eliminamos la informacion
            $structure = Structure::findOrFail($structureId);
            $structure->delete();

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
     * Permite agregar una nueva estructura
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new Structure())->create([
                'code' => $params['code'],
                'description' => $params['description']
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
     * Permite actualizar una estructura
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $structure = Structure::findOrFail($params['structureId']);
            $structure->code = $params['code'];
            $structure->description = $params['description'];

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
