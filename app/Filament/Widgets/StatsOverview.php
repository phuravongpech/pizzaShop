<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;


    protected function getCards(): array
    {   
    $today = Carbon::today();
    $income = OrderDetail::join('food', 'order_details.food_id', '=', 'food.id')
                        ->whereDate('order_details.created_at', $today)
                        ->sum(DB::raw('order_details.quantity * food.price'));
    $order = OrderDetail::whereDate('created_at',$today)->count();
        return [
            Card::make('Total Menu',Food::count()),
            Card::make('Today Income',$income),
            Card::make('Today Order',$order),
            Card::make('Total User',User::count()),
        ];
    }
    
}
