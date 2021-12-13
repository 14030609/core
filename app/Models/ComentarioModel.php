<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $clave_post
 * @property int $clave_comentario
 * @property string comentario
 * @property string correo
 * @property string $fecha_alta
 */

class ComentarioModel extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogo_comentario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'clave_comentario';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['clave_post','comentario', 'fecha_alta','correo'];

}
