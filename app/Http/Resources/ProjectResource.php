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
 * Recurso para transformar el modelo proyecto a la informacion necesaria
 *
 * @author Jhonier Gaviria M. - May. 14-2019
 * @version 1.0.0
 * @package App\Http\Resources
 */
class ProjectResource extends JsonResource
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
            'address' => $this->address,
            'circuit' => [
                'id' => $this->circuit->id,
                'code' => $this->circuit->code,
                'name' => $this->circuit->name,
                'substation' => [
                    'id' => $this->circuit->substation->id,
                    'name' => $this->circuit->substation->name
                ]
            ],
            'city' => [
                'id' => $this->city->id,
                'name' => $this->city->name
            ],
            'code' => $this->code,
            'electricalVoltageLevel' => $this->electrical_voltage_level,
            'image' => $this->image,
            'status' => $this->status,
            'typeNetwork' => [
                'id' => $this->typeNetwork->id,
                'name' => $this->typeNetwork->name
            ],
            'typeTown' => [
                'id' => $this->typeTown->id,
                'name' => $this->typeTown->name
            ]
        ];
    }
}