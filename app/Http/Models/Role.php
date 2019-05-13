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
 * Modelo representativo de un role
 *
 * @author Jhonier Gaviria M. - May. 12-2019
 * @version 1.0.0
 * @package App\Http\Models
 */
class Role extends Model
{

    /**
     * Identificador de rol para el interventor
     */
    public const ROLE_INSPECTOR = 1;

    /**
     * Nombre por defecto para el rol de Interventor
     */
    public const ROLE_INSPECTOR_NAME = 'Interventor';

    /**
     * Identificador de rol para el interventor
     */
    public const ROLE_ASSISTANT_INSPECTOR = 2;

    /**
     * Nombre por defecto para el rol de Auxiliar Interventoria
     */
    public const ROLE_ASSISTANT_INSPECTOR_NAME = 'Auxiliar Interventoria';

    /**
     * Identificador de rol para el interventor
     */
    public const ROLE_SUPERVISOR = 3;

    /**
     * Nombre por defecto para el rol de Supervisor
     */
    public const ROLE_SUPERVISOR_NAME = 'Supervisor';

    /**
     * Identificador de rol para el interventor
     */
    public const ROLE_PLANNER = 4;

    /**
     * Nombre por defecto para el rol de Planillero
     */
    public const ROLE_PLANNER_NAME = 'Planillero';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Obtiene los usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}