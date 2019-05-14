<?php

namespace App\Http\Controllers;

use App\Http\Models\PhotoButtress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Controlador dedicado al manejo de la logica de las fotos del apoyo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class PhotoButtressController extends Controller
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
     * Permite obtener el listado de las fotos del apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => PhotoButtress::all()
        ], Response::HTTP_OK);
    }

    /**
     * Permite eliminar una foto del apoyo
     *
     * @param $photoButtressId Identificador de una estructura
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($photoButtressId)
    {
        try {
            // Eliminamos la informacion
            $photoButtress = PhotoButtress::findOrFail($photoButtressId);
            $photoButtress->delete();

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
     * Permite agregar una nueva foto de apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new PhotoButtress())->create([
                'path' => $params['path'],
                'buttress_id' => $params['buttress_id']
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
     * Permite actualizar una foto de apoyo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            // Actualizamos la informacion
            $photoButtress = PhotoButtress::findOrFail($params['photoButtressId']);
            $photoButtress->code = $params['code'];
            $photoButtress->description = $params['description'];

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
