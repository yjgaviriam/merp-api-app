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
 * Modelo representativo de una subestacion
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Substation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name'];

    /**
     * Obtiene los circuitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function circuits()
    {
        return $this->hasMany(Circuit::class);
    }
}