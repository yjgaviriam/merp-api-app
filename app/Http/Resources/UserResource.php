<?php
/**
 * Created by PhpStorm.
 * User: xJoni
 * Date: 13/05/2019
 * Time: 10:55 PM
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Recurso para transformar el modelo a la informacion necesaria
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'enterprise' => [
                'id' => $this->enterprise->id,
                'name' => $this->enterprise->name,
                'nit' => $this->enterprise->nit
            ],
            'lastName' => $this->last_name,
            'name' => $this->name,
            'role' => [
                'id' => $this->role->id,
                'name' => $this->role->name,

            ],
            'username' => $this->username,

        ];
    }
}