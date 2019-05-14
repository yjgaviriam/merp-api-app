<?php

namespace App\Http\Controllers;

use App\Http\Models\MaterialButtress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de un material de apoyo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class MaterialButtressController extends Controller
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
     * Permite obtener el listado de los materiales de apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => MaterialButtress::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un material de apoyo
     *
     * @param $materialButtressId Identificador de un material de apoyo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($materialButtressId)
    {
        try {
            // Eliminamos la informacion
            $materialButtress = MaterialButtress::findOrFail($materialButtressId);
            $materialButtress->delete();

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
     * Permite agregar un nuevo material de apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new MaterialButtress())->create([
                'buttress_id' => $params['buttress_id'],
                'date_installation' => $params['date_installation'],
                'material_id' => $params['material_id'],
                'price_unit' => $params['price_unit'],
                'type_material_id' => $params['type_material_id'],
                'quantity' => $params['quantity']
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
     * Permite actualizar un material de apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $materialButtress = MaterialButtress::findOrFail($params['materialButtressId']);
            $materialButtress->buttress_id = $params['buttress_id'];
            $materialButtress->date_installation = $params['date_installation'];
            $materialButtress->material_id = $params['material_id'];
            $materialButtress->price_unit = $params['price_unit'];
            $materialButtress->type_material_id = $params['type_material_id'];
            $materialButtress->quantity = $params['quantity'];

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
