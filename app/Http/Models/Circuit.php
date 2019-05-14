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
 * Modelo representativo de un circuito
 *
 * @author Jhonier Gaviria M. - May. 09-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Circuit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'substation_id'];

    /**
     * Obtiene la subestacion a la cual esta registrado el circuito
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function substation()
    {
        return $this->belongsTo(Substation::class);
    }
}