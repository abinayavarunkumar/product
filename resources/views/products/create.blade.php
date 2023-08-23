@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

    {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

		<div class="mb-3">
			{{ Form::label('product_name', 'Product Name', ['class'=>'form-label']) }}
			{{ Form::text('product_name', null, array('class' => 'form-control')) }}
		</div>
        <div class="mb-3">
            {{ Form::label('unit_type_id', 'Unit Type', ['class'=>'form-label']) }}
            {{ Form::select('unit_type_id', $unittypes, null, ['class' => 'form-control']) }}
        </div>
		<div class="mb-3">
			{{ Form::label('product_category', 'Product Category', ['class'=>'form-label']) }}
			{{ Form::text('product_category', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('product_images', 'Product Images', ['class'=>'form-label']) }}
            {{ Form::file('product_images[]', ['class' => 'form-control', 'multiple' => true]) }}
        </div>
		<div class="mb-3">
			{{ Form::label('product_price', 'Product Price', ['class'=>'form-label']) }}
			{{ Form::number('product_price', null, array('class' => 'form-control','min'=>'0','step'=>'1')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('discount_percentage', 'Discount Percentage', ['class'=>'form-label']) }}
			{{ Form::number('discount_percentage', null, array('class' => 'form-control','min'=>'0','max'=>'100','step'=>'1')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('discount_amount', 'Discount Amount', ['class'=>'form-label']) }}
			{{ Form::number('discount_amount', null, array('class' => 'form-control','min'=>'0','step'=>'1')) }}
		</div>
		<div class="mb-3">
            {{ Form::label('discount_start_date', 'Discount Start Date', ['class'=>'form-label']) }}
            {{ Form::text('discount_start_date', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off','id'=>'start']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('discount_end_date', 'Discount End Date', ['class'=>'form-label']) }}
            {{ Form::text('discount_end_date', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off','id'=>'end']) }}
        </div>

		<div class="mb-3">
			{{ Form::label('tax_percentage', 'Tax Percentage', ['class'=>'form-label']) }}
			{{ Form::number('tax_percentage', null, array('class' => 'form-control','min'=>'0','max'=>'100','step'=>'1')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tax_amount', 'Tax Amount', ['class'=>'form-label']) }}
			{{ Form::number('tax_amount', null, array('class' => 'form-control','min'=>'0','step'=>'1')) }}
		</div>
        <div class="mb-3">
            {{ Form::label('stock_entry', 'Stock Entry', ['class' => 'form-label']) }}
            <div class="form-check">
                {{ Form::radio('stock_entry', 'instock', true, ['class' => 'form-check-input']) }}
                {{ Form::label('instock', 'In Stock', ['class' => 'form-check-label']) }}
            </div>
            <div class="form-check">
                {{ Form::radio('stock_entry', 'outofstock', false, ['class' => 'form-check-input']) }}
                {{ Form::label('outofstock', 'Out of Stock', ['class' => 'form-check-label']) }}
            </div>
        </div>



		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
@push('scripts')
<script>


    $('#start').datepicker({
       startDate: new Date(),
       autoclose: true,
  }).on("changeDate", function (e) {
       $('#end').datepicker('setStartDate', e.date);
  });

  $('#end').datepicker({
      autoclose: true,
  }).on("changeDate", function (e) {
       $('#start').datepicker('setEndDate', e.date);
  });;
</script>
@endpush
