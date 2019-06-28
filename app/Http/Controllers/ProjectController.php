<?php

namespace App\Http\Controllers;

use App\Http\Models\Project;
use App\Http\Models\User;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => ProjectResource::collection(Project::with(['city', 'circuit', 'typeNetwork', 'typeTown'])->get())
        ], Response::HTTP_OK);
    }

    /**
     * Permite obtener los proyectos asociados a un usuario
     *
     * @param $userId Identificador del usuario
     * @return JsonResponse
     */
    public function getProjectsByUser($userId) {
        try {
            return response()->json([
                'data' => ProjectResource::collection(User::findOrFail($userId)->projects()->get())
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json([
                'data' => []
            ], Response::HTTP_OK);
        }
    }

    /**
     * Permite eliminar un proyecto
     *
     * @param $projectId Identificador del proyecto
     * @return JsonResponse
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

    /**
     * Permite asociar un proyecto a un usuario
     *
     * @param $code Identificador del proyecto
     * @param $userId Identificador del usuario
     * @return JsonResponse
     */
    public function downloadProject($code, $userId) {
        $project = Project::where('code', $code)->first();
        $user = User::where('id', $userId)->first();

        if ($project !== null && $user !== null) {
            try {
                $project->users()->attach($user->id);

                return response()->json([
                    'data' => [
                        'message' => 'Registro actualizado.'
                    ]
                ], Response::HTTP_OK);
            } catch (Exception $exception) {
                return response()->json([
                    'data' => [
                        'message' => 'No se ha podido descargar el proyecto.'
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        return response()->json([
            'data' => [
                'message' => 'No se ha podido descargar el proyecto.'
            ]
        ], Response::HTTP_BAD_REQUEST);

    }

    /**
     * Permite agregar un nuevo proyecto
     *
     * @return JsonResponse
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
     * @return JsonResponse
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
