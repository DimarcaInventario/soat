<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PolizaSoat extends Model
{
    use HasFactory;

    /** @var string Nombre real de la tabla (la convención daría `poliza_soats`). */
    protected $table = 'polizas_soat';

    protected $fillable = [
        'vehiculo_id',
        'numero_poliza',
        'fecha_inicio',
        'fecha_fin',
        'valor',
        'estado',
        'aseguradora',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'valor' => 'decimal:2',
    ];

    /**
     * New purchase/renewal validity: starts on the purchase date and lasts one year.
     *
     * @return array{inicio: Carbon, fin: Carbon}
     */
    public static function calcularVigenciaCompra(?Carbon $fechaReferencia = null): array
    {
        $inicio = ($fechaReferencia ?? Carbon::today())->copy()->startOfDay();
        $fin = $inicio->copy()->addYear();

        return [
            'inicio' => $inicio,
            'fin' => $fin,
        ];
    }

    /**
     * @return array{inicio: string, fin: string}
     */
    public static function vigenciaCompraFormateada(?Carbon $fechaReferencia = null): array
    {
        $vigencia = self::calcularVigenciaCompra($fechaReferencia);

        return [
            'inicio' => $vigencia['inicio']->format('d/m/Y'),
            'fin' => $vigencia['fin']->format('d/m/Y'),
        ];
    }

    /**
     * Placeholder dates for admin registration of an expired policy pending renewal.
     *
     * @return array{0: string, 1: string}
     */
    public static function fechasPolizaExpiradaRegistro(): array
    {
        $fin = Carbon::yesterday()->startOfDay();
        $inicio = $fin->copy()->subYear();

        return [
            $inicio->toDateString(),
            $fin->toDateString(),
        ];
    }

    /**
     * Get the vehiculo that owns the poliza.
     */
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
