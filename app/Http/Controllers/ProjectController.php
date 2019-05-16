<?php

namespace App\Http\Controllers;

use App\Http\Models\Project;
use App\Http\Resources\ProjectResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de los proyectos de la aplicacion
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
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
     * Permite obtener el listado de proyectos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => ProjectResource::collection(Project::with(['city', 'circuit', 'typeNetwork', 'typeTown', 'circuit.substation'])->get())
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar un proyecto
     *
     * @param $projectId Identificador del proyecto
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($projectId)
    {
        try {
            // Eliminamos la informacion
            $user = Project::findOrFail($projectId);
            $user->delete();

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

    public function download($code) {
        dd($code);
    }

    /**
     * Permite agregar un nuevo proyecto
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Se crea el registro
            $project = new Project();
            $project->address = $params['address'];
            $project->circuit_id = $params['circuitId'];
            $project->city_id = $params['cityId'];
            $project->code = $params['code'];
            $project->electrical_voltage_level = $params['electricalVoltageLevel'];
            $project->type_network_id = $params['typeNetworkId'];
            $project->type_town_id = $params['typeTownId'];
            $project->save();

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
     * Permite actualizar un proyecto
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $project = Project::findOrFail($params['id']);
            $project->address = $params['address'];
            $project->circuit_id = $params['circuitId'];
            $project->city_id = $params['cityId'];
            $project->code = $params['code'];
            $project->electrical_voltage_level = $params['electricalVoltageLevel'];
            // $project->status = $params['status'];
            $project->type_network_id = $params['typeNetworkId'];
            $project->type_town_id = $params['typeTownId'];
            $project->save();

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
