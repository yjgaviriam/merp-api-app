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
 * Modelo representativo de un tipo de grupo de trabajo
 *
 * @author Jhonier Gaviria M. - May. 13-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class WorkGroupType extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity'];
}