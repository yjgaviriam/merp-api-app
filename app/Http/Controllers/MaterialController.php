<?php

namespace App\Http\Controllers;

use App\Http\Models\Material;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de un material
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class MaterialController extends Controller
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
     * Permite obtener el listado de los materiales
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => Material::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un material
     *
     * @param $materialId Identificador de un material
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($materialId)
    {
        try {
            // Eliminamos la informacion
            $material = Material::findOrFail($materialId);
            $material->delete();

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
     * Permite agregar un nuevo material
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new Material())->create([
                'code' => $params['code'],
                'description' => $params['description'],
                'level' => $params['level'],
                'price' => $params['price']
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
     * Permite actualizar un material
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $material = Material::findOrFail($params['materialId']);
            $material->code = $params['code'];
            $material->description = $params['description'];
            $material->level = $params['level'];
            $material->price = $params['price'];

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
