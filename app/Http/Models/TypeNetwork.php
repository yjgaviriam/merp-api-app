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
 * Modelo representativo de un tipo de red
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class TypeNetwork extends Model
{

    /**
     * Identificador por defecto para el tipo de red aerea
     */
    public const TYPE_NETWORK_AERIAL = 1;

    /**
     * Identificador por defecto para el tipo de red subterranea
     */
    public const TYPE_NETWORK_UNDERGROUND = 2;

    /**
     * Nombre por defecto para el tipo de red aerea
     */
    public const TYPE_NETWORK_AERIAL_NAME = 'Aérea';

    /**
     * Nombre por defecto para el tipo de red subterranea
     */
    public const TYPE_NETWORK_UNDERGROUND_NAME = 'Subterránea';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}