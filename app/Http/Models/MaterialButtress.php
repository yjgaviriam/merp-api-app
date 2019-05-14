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
 * Modelo representativo del material relacionado a un apoyo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class MaterialButtress extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['buttress_id', 'date_installation', 'material_id', 'price_unit', 'quantity',
        'type_material_id'];
}