<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Flowframe\Trend\Trend;
use App\Models\OrderDetail;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class IncomeChart extends LineChartWidget
{
    protected static ?string $heading = 'Income';
    protected static string $color = 'info';
    protected static ?int $sort = 2;



    protected function getData(): array{   
        $data = Trend::model(OrderDetail::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
            return [
                'datasets'=>[
                    [
                        'label'=>'Income',
                        'data'=>$data->map(fn(TrendValue $value)=> $value->aggregate),
                    ],
                ],
                    'labels'=>$data->map(fn(TrendValue $value)=>$value->date),
            ];
        }
        protected function getType(): string{
            return 'line';
        }
    }
