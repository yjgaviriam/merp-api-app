<?php

namespace App\Http\Controllers;

use App\Http\Models\WorkGroup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de el grupo de trabajo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class WorkGroupController extends Controller
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
     * Permite obtener el listado de el grupo de trabajo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => WorkGroup::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un grupo de trabajo
     *
     * @param $workGroupId Identificador de un grupo de trabajp
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($workGroupId)
    {
        try {
            // Eliminamos la informacion
            $workGroup = WorkGroup::findOrFail($workGroupId);
            $workGroup->delete();

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
     * Permite agregar un nuevo grupo de trabajo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new WorkGroup())->create([
                'date_init' => $params['date_init'],
                'date_end' => $params['date_end'],
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
     * Permite actualizar un grupo de trabajo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $workGroup = WorkGroup::findOrFail($params['workGroupId']);
            $workGroup->date_init = $params['date_init'];
            $workGroup->date_end = $params['date_end'];
            $workGroup->project_id = $params['project_id'];

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
