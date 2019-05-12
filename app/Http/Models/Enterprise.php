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
 * Modelo representativo de una empresa
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Enterprise extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'nit'];
}