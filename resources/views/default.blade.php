<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- Add these lines to your layout file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>

</head>
<body>
	<div class="container">

          <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/') }}">Home</a>
              </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('unittypes*') ? 'active' : '' }}" href="{{ route('unittypes.index') }}">Unit Type</a>
              </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
            </li>

          </ul>
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
          </div>
	</div>
    @stack('scripts')
</body>
</html>
