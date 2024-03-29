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
 * Modelo representativo de un contracto
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Contract extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'date', 'enterprise_id'];

    /**
     * Obtiene la empresa a la cual esta registrado el contrato
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}