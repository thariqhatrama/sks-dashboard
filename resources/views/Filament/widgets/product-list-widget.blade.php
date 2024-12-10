<div class="bg-dark rounded-lg shadow p-4">
    <h2 class="text-lg font-bold mb-4">{{ $heading }}</h2>
    <ul>
        @forelse ($products as $product)
            <li class="border-b py-2">
                <div class="flex justify-between">
                    <span>{{ $product->name }}</span>
                    <span class="text-gray-500">{{ $product->created_at->format('M d, Y') }}</span>
                </div>
            </li>
        @empty
            <li class="text-gray-500">No products available.</li>
        @endforelse
    </ul>
</div>
