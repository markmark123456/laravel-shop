<div>
    <h2>{{ $product->name }}</h2>
    <h2>{{ $product->code }}</h2>
    <p><strong>Категория:</strong> {{ $product->category->name ?? 'Без категории' }}</p>
    @if(!empty($product->description))
        <p>{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
    @endif
    <p>Цена: {{ number_format($product->price, 0, ',', ' ') }} ₽</p>
    <p>В наличии: {{ $product->in_stock ? 'Да' : 'Нет' }}</p>

    @if($product->in_stock)
    <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Добавить в корзину</button>
    </form>
    @endif
    
    <p>
        <a href="{{ route('products.show', ['code' => $product->code]) }}">Подробнее...</a>
    </p>
</div>