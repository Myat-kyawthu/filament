<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Treatment extends Model
{
    use HasFactory;

    protected $casts =[
        'price' => MoneyCast::class,
    ];
    public function patient(): BelongsTo{
        return $this->belongsTo(Patient::class);
    }
    protected function getData() : array 
    {
        $data = Trend::model(Treatment::class)
        ->between(
            start:now()->subYear(),
            end: now(),
        )
        ->perMonth()
        ->count();

        return[
            "datasets" => [
                [
                    "label" => "Treatments",
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            "labels" => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }
}
