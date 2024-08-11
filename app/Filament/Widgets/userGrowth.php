<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\BarChartWidget;

class userGrowth extends BarChartWidget
{
    protected static ?string $heading = 'User Growth';
    protected static ?int $sort = 3;
    protected static string $color = 'info';


    protected function getData(): array
    {
        $data = Trend::model(User::class)
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
}
