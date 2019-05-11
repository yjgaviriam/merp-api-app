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
 * Modelo representativo de un tipo de sector urbano
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class TypeTown extends Model
{

    /**
     * Identificador por defecto para el tipo de sector barrio
     */
    public const TYPE_TOWN_VILLAGE = 1;

    /**
     * Identificador por defecto para el tipo de sector vereda
     */
    public const TYPE_TOWN_NEIGHBORHOOD = 2;

    /**
     * Nombre por defecto para el tipo de sector barrio
     */
    public const TYPE_TOWN_VILLAGE_NAME = 'Barrio';

    /**
     * Nombre por defecto para el tipo de sector vereda
     */
    public const TYPE_TOWN_NEIGHBORHOOD_NAME = 'Vereda';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}