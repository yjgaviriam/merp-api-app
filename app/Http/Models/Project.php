<?php
/**
 * Created by PhpStorm.
 * User: xJoni
 * Date: 9/05/2019
 * Time: 3:59 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo representativo de un proyecto
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Project extends Model
{

    use SoftDeletes;

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

    /**
     * Obtiene el municipio donde se encuentra el proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Obtiene el tipo de red que maneja el proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeNetwork()
    {
        return $this->belongsTo(TypeNetwork::class);
    }

    /**
     * Obtiene el tipo de circuito que maneja el proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    /**
     * Obtiene si el proyecto esta en un barrio o vereda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeTown()
    {
        return $this->belongsTo(TypeTown::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}