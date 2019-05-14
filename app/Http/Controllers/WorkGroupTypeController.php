<?php

namespace App\Http\Controllers;

use App\Http\Models\WorkGroupType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de los tipos de grupo de trabajo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class WorkGroupTypeController extends Controller
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
     * Permite obtener el listado de tipos de grupo de trabajos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => WorkGroupType::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un tipo de grupo de trabajo
     *
     * @param $workGroupTypeId Identificador de un tipo de grupo de trabajp
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($workGroupTypeId)
    {
        try {
            // Eliminamos la informacion
            $workGroupType = WorkGroupType::findOrFail($workGroupTypeId);
            $workGroupType->delete();

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
     * Permite agregar un nuevo tipo de grupo de trabajo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new WorkGroupType())->create([
                'quantity' => $params['quantity'],
                'type_worker_id' => $params['type_worker_id'],
                'work_group_id' => $params['work_group_id']
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
     * Permite actualizar un tipo de grupo de trabajo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $workGroupType = WorkGroupType::findOrFail($params['workGroupTypeId']);
            $workGroupType->quantity = $params['quantity'];
            $workGroupType->type_worker_id = $params['type_worker_id'];
            $workGroupType->work_group_id = $params['work_group_id'];

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
