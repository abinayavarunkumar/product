@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('product_name', 'Product_name', ['class'=>'form-label']) }}
			{{ Form::text('product_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('unit_type_id', 'Unit_type_id', ['class'=>'form-label']) }}
			{{ Form::string('unit_type_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('product_category', 'Product_category', ['class'=>'form-label']) }}
			{{ Form::text('product_category', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('product_images', 'Product_images', ['class'=>'form-label']) }}
			{{ Form::text('product_images', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('product_price', 'Product_price', ['class'=>'form-label']) }}
			{{ Form::string('product_price', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('discount_percentage', 'Discount_percentage', ['class'=>'form-label']) }}
			{{ Form::string('discount_percentage', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('discount_amount', 'Discount_amount', ['class'=>'form-label']) }}
			{{ Form::string('discount_amount', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('discount_range', 'Discount_range', ['class'=>'form-label']) }}
			{{ Form::text('discount_range', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tax_percentage', 'Tax_percentage', ['class'=>'form-label']) }}
			{{ Form::string('tax_percentage', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tax_amount', 'Tax_amount', ['class'=>'form-label']) }}
			{{ Form::string('tax_amount', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('stock_entry', 'Stock_entry', ['class'=>'form-label']) }}
			{{ Form::string('stock_entry', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
