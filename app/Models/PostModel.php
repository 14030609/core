<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $clave_post
 * @property int $clave_categoria
 * @property int $clave_usuario
 * @property string contenido
 * @property string descripcion
 * @property string $fecha_alta
 * @property string $imagen
 * @property string $titulo
 */

class PostModel extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogo_post';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'clave_post';

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
    protected $fillable = ['clave_categoria','clave_usuario','contenido', 'fecha_alta','descripcion', 'titulo','imagen'];

}
