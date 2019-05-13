<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


/**
 * Controlador dedicado al manejo de la logica de los usuarios
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * Token para validar que se tenga acceso a la aplicacion
     */
    public const TOKEN = 'evfj8NiMdff20m5SJpUPJcIZMXM1Y';

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
     * Permite obtener el listado de usuarios
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => User::all()
        ], Response::HTTP_OK);
    }

    public function destroy()
    {

    }

    /**
     * Se encarga de validar el inicio de sesion de un usuario y le entrega un token valido
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        // Obtenemos los parametros recibidos
        $params = $this->request->all();

        // Obtenemos el usuario segun el username recibido
        $user = User::where('nickname', $params['username'])->first();

        // Si hay un usuario identificado
        if(isset($user)) {

            // Validamos la contraseña concuerde
            if(Hash::check($params['password'], $user->password)) {
                return response()->json([
                    'data' => [
                        'token' => self::TOKEN
                    ]
                ], Response::HTTP_OK);
            }
        }

        return response()->json([
            'data' => [
                'message' => 'Usuario no autorizado'
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function show()
    {

    }

    /**
     * Permite agregar un nuevo usuario
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        try {
            // Obtenemos los parametros recibidos
            $params = $this->request->all();

            (new User())->create([
                'email' => $params['email'],
                'enterprise_id' => $params['enterprise_id'],
                'last_name' => $params['last_name'],
                'name' => $params['name'],
                'nickname' => $params['nickname'],
                'role_id' => $params['role_id']
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

    public function update()
    {

    }
}
