@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('products.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 10%;">Product ID</th>
				<th style="width: 5%;">Products</th>
				{{-- <th>unit_type_id</th> --}}
				<th style="width: 10%;">Categories</th>
                <th style="width: 5%;">Status</th>
                <th style="width: 10%;">Stock</th>
				{{-- <th>product_images</th> --}}
				<th style="width: 10%;">Price</th>
				<th style="width: 10%;">Discount Percentage</th>
				<th style="width: 10%;">Discount Amount</th>
				{{-- <th>Discount Range</th> --}}
				<th style="width: 10%;">Tax Percentage</th>
				<th style="width: 10%;">Tax Amount</th>
                <th style="width: 10%;">Net Price</th>


				{{-- <th>Action</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)

				<tr>
					<td>PRD{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</td>
					<td>@if ($product->product_images)
                        @foreach (json_decode($product->product_images) as $image)
                            <img src="{{ asset('storage/product_images/' . $image) }}" alt="{{ $product->product_name }}" class="img-thumbnail img-fluid">
                        @endforeach

                    @endif{{ $product->product_name }}</td>
					{{-- <td>{{ $product->unit_type_id }}</td> --}}
					<td>{{ $product->product_category }}</td>
                    <td>Published</td>
                    <td>@if($product->stock_entry =='instock')
                        <button type="button" class="btn btn-outline-success">In Stock</button>
                    @else
                        <button type="button" class="btn btn-outline-danger">Out of Stock</button>
                    @endif</td>
					{{-- <td>{{ $product->product_images }}</td> --}}
					<td>$ {{ (int)$product->product_price }}</td>
					<td>{{ (int)$product->discount_percentage }} % </td>
					<td>$ {{ (int)$product->discount_amount }}</td>
					{{-- <td>{{ $product->discount_start_date}} - {{ $product->discount_end_date}}</td> --}}
					<td>{{ (int)$product->tax_percentage }} %</td>
					<td>{{ (int)$product->tax_amount }} %</td>
                    <td>$ {{(int)($product->product_price+$product->tax_amount-$product->discount_amount )}}</td>


					{{-- <td>
						<div class="d-flex gap-2">
                            <a href="{{ route('products.show', [$product->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td> --}}
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
