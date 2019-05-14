<?php

namespace App\Http\Controllers;

use App\Http\Models\WorkforceButtress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de la mano de obra asociada a un apoyo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class WorkforceButtressController extends Controller
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
     * Permite obtener el listado de mano de obra asociada a un apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => WorkforceButtress::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar una mano de obra asociada a un apoyo
     *
     * @param $workforceButtressId Identificador de mano de obra asociada a un apoyo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($workforceButtressId)
    {
        try {
            // Eliminamos la informacion
            $workforceButtress = WorkforceButtress::findOrFail($workforceButtressId);
            $workforceButtress->delete();

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
     * Permite agregar una nueva mano de obra asociada a un apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new WorkforceController())->create([
                'buttress_id' => $params['buttress_id'],
                'date_installation' => $params['date_installation'],
                'price_unit' => $params['price_unit'],
                'quantity' => $params['quantity'],
                'workforce_id' => $params['workforce_id']
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
     * Permite actualizar una mano de obra asociada a un apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $workforceButtress = WorkforceButtress::findOrFail($params['workforceButtressId']);
            $workforceButtress->buttress_id = $params['buttress_id'];
            $workforceButtress->date_installation = $params['date_installation'];
            $workforceButtress->price_unit = $params['price_unit'];
            $workforceButtress->quantity = $params['quantity'];
            $workforceButtress->workforce_id = $params['workforce_id'];

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
