<?php
/**
 * Created by PhpStorm.
 * User: xJoni
 * Date: 9/05/2019
 * Time: 3:59 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Modelo representativo de un proyecto
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Project extends Model
{

    /**
     * Indica que el proyecto esta en un estado pendiente
     */
    public const STATUS_IS_PENDING = 1;

    /**
     * Indica que el proyecto esta en un estado de ejecucion
     */
    public const STATUS_IS_EXECUTING = 2;

    /**
     * Indica que el proyecto esta en un estado de terminado
     */
    public const STATUS_IS_FINISH = 3;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => self::STATUS_IS_PENDING
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['address', 'circuit_id', 'city_id', 'code', 'electrical_voltage_level', 'image', 'status', 'type_network_id', 'type_town_id'];
}