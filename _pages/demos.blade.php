@extends('hyde::layouts.app')
@section('content')
@php($title = "Live Demos")
@php($navigation = ['title' => 'Demos'])

<main class="mx-auto max-w-7xl py-16 px-8">
	<header>
		<h1 class="text-center mb-5 text-2xl font-black leading-tight xl:text-4xl">Live Demos</h1>
		<div class="prose dark:prose-invert mx-auto text-center">
			<p class="lead mb-3">Wondering what a HydePHP site looks like?</p>
			<p class="mt-3">
				Here are some live demo websites built with Hyde that you can try out!
			</p>
		</div>
	</header>


	<div class="flex flex-col items-center justify-center py-10 sm:flex-row">
		<div class="py-4 sm:px-6 w-96 max-w-full">
			<div class="flex flex-col overflow-hidden bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
				<a href="https://hydephp.github.io/portfolio-demo"><img class="h-56 rounded-t-lg m-0 w-full" alt="article image"
					src="/media/portfolio-composite-min.png"></a>
				<div class="px-6 pt-4 mb-2 text-xl font-bold">
					<span>Markdown Portfolio Site</span>
				</div>
				<div class="px-6 pt-2">
					<small>By HydePHP.com | 2022-07-15</small>
					<div class="overflow-hidden h-16 mt-2">A simple one-page photography portfolio made with Markdown.</div>
				</div>
				<div class="px-6 pb-4 text-center mt-3">
					<a href="https://github.com/hydephp/portfolio-demo" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
					<a href="https://hydephp.github.io/portfolio-demo" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
				</div>
			</div>
		</div>
		<div class="py-4 sm:px-6 w-96 max-w-full">
			<div class="flex flex-col overflow-hidden bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
				<a href="https://hydephp.com/"><img class="h-56 rounded-t-lg m-0 w-full" alt="article image"
					src="/media/hydephp-com-composite-min.png"></a>
				<div class="px-6 pt-4 mb-2 text-xl font-bold">
					<span>HydePHP.com</span>
				</div>
				<div class="px-6 pt-2">
					<small>By HydePHP.com | 2022-06-22</small>
					<div class="overflow-hidden h-16 mt-2">The very same site you are currently browsing!</div>
				</div>
				<div class="px-6 pb-4 text-center mt-3">
					<a href="https://github.com/hydephp/hydephp.com" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
					<a href="https://hydephp.com/" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
				</div>
			</div>
		</div>
        
		{{-- 
        
            TEMPLATE FOR ADDING NEW DEMOS
            1. Copy the entire div below
            2. Paste it above the closing div tag
            3. Update the image, title, description, and links
            
        <div class="py-4 sm:px-6 w-96 max-w-full">
			<div class="flex flex-col overflow-hidden bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
				<img class="h-56 rounded-t-lg m-0 w-full" alt="article image"
					src="/media/your-image-here.png">
				<div class="px-6 pt-4 mb-2 text-xl font-bold">
					<span>Website Name</span>
				</div>
				<div class="px-6 pt-2">
					<small>John Doe | 2022-01-01</small>
					<div class="overflow-hidden h-16 mt-2">A short description of the site. Maybe a sentence or two.</div>
				</div>
				<div class="px-6 pb-4 text-center mt-3">
					<a href="https://github.com/username/repository" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-gray-400 dark:bg-gray-500 rounded-full">GitHub Source Code</a>
					<a href="https://example.com" class="inline-block px-3 py-1 my-1 mr-2 text-sm font-semibold text-white bg-indigo-500 dark:bg-indigo-400 rounded-full">Live Demo</a>
				</div>
			</div>
		</div>
        
        --}}
	</div>
	<footer>
		<div class="prose dark:prose-invert mx-auto text-center">
			<p>Have an idea for a demo? Want to submit yours? <a href="https://github.com/hydephp/hydephp.com/edit/master/_pages/demos.blade.php">Make a pull request</a>!</p>
		</div>
	</footer>
</main>

@endsection
