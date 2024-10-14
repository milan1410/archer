<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
	<title>{{ $title ?? 'Livewire and Filament' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Main Style Sheet -->
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	@livewireStyles
</head>

<body class="bg-gray-100">

	<!-- Navigation -->
	<header class="bg-gray-800">
		<nav class="container mx-auto flex justify-between items-center py-4">
			<a class="text-white text-lg" wire:navigate href="{{ route('home') }}">
				<h1><strong>Time Office</strong></h1>
			</a>
			<button class="text-white block xl:hidden" id="navbarToggle">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
				</svg>
			</button>
			<div class="hidden xl:flex space-x-6" id="navbarContent">
				<a href="{{ route('home') }}" class="text-white" wire:navigate>Home</a>
				<a href="{{ route('time-log') }}" class="text-white" wire:navigate>Time Log</a>
				<a href="{{ route('logged-hours') }}" class="text-white" wire:navigate>Logged Hours</a>
				<!-- Check if the user is authenticated -->
				@if (Auth::check())
				<!-- User is logged in -->
				<div class="flex items-center space-x-4">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<button type="submit" class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition duration-200">
							Logout
						</button>
					</form>
				</div>
				@else
				<!-- User is not logged in -->
				<div class="flex items-center space-x-4">
					<a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition duration-200">
						Login
					</a>
					<a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
						Register
					</a>
				</div>
				@endif
			</div>
		</nav>
	</header>

	<!-- Main Content -->
	<main class="py-6">
		{{ $slot }}
	</main>

	<!-- Footer -->
	<footer class="bg-gray-800 text-white py-6">
		<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
			<div>
				<h5 class="text-xl mb-4 text-blue-400">Service</h5>
				<ul>
					<li class="mb-2"><a href="#!" class="text-gray-300">Digital Marketing</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Web Design</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Logo Design</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Graphic Design</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">SEO</a></li>
				</ul>
			</div>
			<div>
				<h5 class="text-xl mb-4 text-blue-400">Quick Links</h5>
				<ul>
					<li class="mb-2"><a href="#!" class="text-gray-300">About Us</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Contact Us</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Blog</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Team</a></li>
				</ul>
			</div>
			<div>
				<h5 class="text-xl mb-4 text-blue-400">Other Links</h5>
				<ul>
					<li class="mb-2"><a href="#!" class="text-gray-300">Privacy Policy</a></li>
					<li class="mb-2"><a href="#!" class="text-gray-300">Terms & Conditions</a></li>
				</ul>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>

	@livewireScripts
</body>

</html>