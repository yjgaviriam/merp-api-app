<?php

namespace App\Http\Controllers;

use App\Http\Models\TypeMaterial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de un tipo de material
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class TypeMaterialController extends Controller
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
     * Permite obtener el listado de un tipo de material
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => TypeMaterial::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un tipo de material
     *
     * @param $typeMaterialId Identificador de un tipo de material
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($typeMaterialId)
    {
        try {
            // Eliminamos la informacion
            $typeMaterial = TypeMaterial::findOrFail($typeMaterialId);
            $typeMaterial->delete();

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
     * Permite agregar un nuevo tipo de material
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new WorkGroup())->create([
                'name' => $params['name']
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
     * Permite actualizar un tipo de material
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $typeMaterial = TypeMaterial::findOrFail($params['typeMaterialId']);
            $typeMaterial->name = $params['name'];

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
