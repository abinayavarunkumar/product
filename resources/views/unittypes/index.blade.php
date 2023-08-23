@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('unittypes.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				{{-- <th>Id</th> --}}
				<th>Name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($unittypes as $unittype)

				<tr>
					{{-- <td>{{ $unittype->id }}</td> --}}
					<td>{{ $unittype->name }}</td>

					<td>
						<div class="d-flex gap-2">
                            {{-- <a href="{{ route('unittypes.show', [$unittype->id]) }}" class="btn btn-info">Show</a> --}}
                            <a href="{{ route('unittypes.edit', [$unittype->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['unittypes.destroy', $unittype->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
