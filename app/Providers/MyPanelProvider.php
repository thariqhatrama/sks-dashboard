<?php

namespace App\Providers;

use App\Filament\Widgets\ProductListWidget;
use Filament\Panel;
use Illuminate\Support\ServiceProvider;

class MyPanelProvider extends ServiceProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->dashboardWidgets([
                ProductListWidget::class, // Tambahkan widget produk
            ])
            ->widgets([]);
    }
}
