
{{-- filepath: resources/views/products/product_form.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h1>
    <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ $product->name ?? '' }}" required><br>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" value="{{ $product->price ?? '' }}" required><br>
        <button type="submit">{{ isset($product) ? 'Update' : 'Simpan' }}</button>
    </form>
@endsection