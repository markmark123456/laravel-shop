@extends('layouts.app')

@section('title', 'Корзина')

@section('content')

<h2>Корзина</h2>

<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Стоимость</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->products as $product)
            <tr>
                <td>
                    <img height="56px" 
                        src="{{ $product->image ?? 'https://via.placeholder.com/56' }}" 
                        alt="{{ $product->name }}">
                    {{ $product->name }}
                </td>
                <td>{{ $product->pivot->quantity }}
                <div class="btn-group">
                <form action="{{ route('cart.remove', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-danger"
                                            href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                 <form action="{{ route('cart.add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                       href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                <td>{{ $product->price }} руб.</td>
                <td>{{ $product->getPriceForQuantity() }} руб.</td>
                </div></td>
            </tr>
        @endforeach
        <tr>
            <td>{{ $order->getFullPrice() }} </td>
        </tr>
    </tbody>
            
    

</table>





@endsection