<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $clave_categoria
 * @property string $categoria
 * @property string descripcion
 * @property string $fecha_alta
 * @property string $fuc
 */


class CategoriaModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogo_categoria';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'clave_categoria';

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
    protected $fillable = ['categoria', 'fecha_alta','descripcion', 'fuc'];

}
