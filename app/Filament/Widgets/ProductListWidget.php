<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\Widget;

class ProductListWidget extends Widget
{
    protected static ?string $heading = 'Product List';

    protected function getData(): array
    {
        return [
            'heading' => static::$heading, // Tambahkan heading ke data
            'products' => Product::latest()->take(5)->get(), // Ambil 5 produk terbaru
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.product-list-widget', $this->getData());
    }
}
