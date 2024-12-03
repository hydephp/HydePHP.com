@extends('hyde::layouts.app')
@section('content')
@php($title = 'Elegant and Powerful Static Site Generator')
<style>
    mark {
        background: linear-gradient(-100deg, #fece2f2f, #fddf47a4 95%, #fece2f27);
        border-radius: 1em 0;
        padding: 0.125rem 0.5rem;
    }
    .dark mark {
        background: linear-gradient(-100deg, #fece2fbe, #fddf47a4 95%, #fece2fbd);
    }
    /* Gradients by https://uigradients.com/ */
    .dark .app-gradient {
        /* Royal */
        background: #141E30; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left bottom, #243B55, #141E30); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left bottom, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #main-navigation {
        z-index: 10;
    }
    .theme-toggle-button {
        display: none!important;
    }
    #app {
        min-width: 100vw;
    }
    #docs-nav-button {
        margin-right: 0.75rem;
    }
    .pricing-list li::marker {
        color: #777;
    }
</style>
@push('meta')
    <meta name="keywords" content="HydePHP, Static App Builder, Static Sites, Blogs, Documentation, Static Site Generator, Hyde, PHP, PHP Framework">
    <meta name="subtitle" content="The Static Site Generator You've Been Waiting For, is Here.">
    <meta name="twitter:image" content="https://hydephp.com/media/og-image-index.png">
    <meta property="og:image" content="https://hydephp.com/media/og-image-index.png">
    <!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "SoftwareApplication",
          "name": "HydePHP",
          "image": "https://hydephp.com/media/logo.svg",
          "url": "https://hydephp.com",
          "author": {
            "@type": "Person",
            "name": "Caen De Silva"
          },
          "datePublished": "2023-03-14",
          "publisher": {
            "@type": "Organization",
            "name": "HydePHP"
          },
          "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
          },
          "applicationCategory": "DeveloperApplication",
          "applicationSubCategory": "Static Site Generator",
          "downloadUrl": "https://hydephp.com/docs/1.x/quickstart",
          "featureList": "Markdown, Laravel, PHP, Static Site Generator",
          "operatingSystem": "Windows, Linux, macOS",
          "requirements": "PHP 8.1",
          "screenshot": "https://opengraph.githubassets.com/1/hydephp/hyde",
          "softwareVersion": "v1.x"
        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebPage",
          "mainEntity": {
            "@type": "SoftwareSourceCode",
            "url": "https://github.com/hydephp/hyde",
            "codeRepository": "https://github.com/hydephp/hyde"
          }
        }
    </script>
@endpush
<div class="relative items-center justify-center w-screen min-h-screen">
    <div class="pt-36 md:pt-64 container self-center my-auto flex flex-col items-center justify-center h-full max-w-6xl pl-0 mx-auto -mt-24 sm:pl-8 xl:pl-0 md:flex-row md:justify-between">
        <div class="flex flex-col items-center w-5/6 md:items-start sm:w-1/2 lg:w-3/5 lg:-mt-4">
            <div class="relative md:text-left text-center">
                <h1 class="relative mb-4 text-4xl font-black leading-none text-center text-black lg:text-5xl xl:text-6xl md:text-left">
                    HydePHP
                </h1>
                <small class="relative mb-4  text-xl font-black leading-none  text-black lg:text-2xl xl:text-3xl md:text-left text-center">
                    The Static Site Generator You've Been Waiting For, is here.
                </small>
                <img class="absolute top-0 right-0 hidden w-20 -mt-16 mr-48 transform rotate-45 lg:block xl:mr-48 xl:-mt-14" style="transform: rotate(35deg)" src="{{ Asset::mediaLink('logo.svg') }}" alt="HydePHP Logo">
            </div>
            <p class="my-3 text-base text-center text-gray-600 xl:text-xl md:text-left ">
                Create websites, blogs, documentation sites, and more, with the power of Laravel and the simplicity of Markdown.
                Your next website is minutes away from becoming a reality.
            </p>
            <a href="{{ DocumentationPage::home() }}" class="relative mt-5 group">
                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded group-hover:m-0"></span>
                <span class="relative inline-block w-full h-full px-8 py-3 text-base font-bold bg-white border-2 border-black rounded group-hover:bg-violet-400 xl:text-xl fold-bold">
                To the Documentation!
            </span>
            </a>
        </div>
        <div class="flex flex-col items-end justify-center w-5/6 h-auto pl-0 pr-0 mt-16 mb-12 sm:pl-20 sm:pr-8 xl:pr-0 md:mt-0 md:h-full sm:w-2/3 lg:-mt-4">
            <img src="{{ Asset::mediaLink('header.png') }}" alt="Two developers collaboratively working on a static site displayed on a large monitor, illustrating the ease of website creation with HydePHP.">
        </div>
    </div>
    <svg class="absolute bottom-0 w-screen text-violet-300 fill-current" viewBox="0 0 1400 50" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0c309.151 33.333 542.484 50 700 50 157.516 0 390.849-16.667 700-50v50H0V0z"/>
    </svg>
</div>
<div class="relative w-full px-8 py-20 bg-violet-300 sm:py-32 md:py-40">
    <div class="container flex flex-col items-center justify-center h-full max-w-6xl mx-auto sm:flex-row sm:justify-between">
        <div class="relative flex flex-col items-start justify-center w-full mb-10 sm:w-1/3 lg:w-2/5 sm:mb-0 sm:pr-10">
            <h2 class="mb-5 text-2xl font-black leading-tight xl:text-4xl">New to Hyde?
                <small><br>Start your journey here.</small>
            </h2>
            <p class="mb-8 text-base text-violet-900 md:text-lg xl:text-xl md:max-w-lg">
                HydePHP is an open-source console application that turns easy-to-use Markdown text files into amazing static websites, backed by the power of Laravel.
            </p>
            <a href="docs/1.x/quickstart" class="relative group">
                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded group-hover:m-0"></span>
                <span class="relative inline-block w-full h-full px-5 py-3 text-lg font-bold  bg-white border-2 border-black rounded fold-bold group-hover:bg-violet-500 group-hover:text-white">GET STARTED</span>
            </a>
        </div>
        <div class="relative flex flex-col justify-center w-full h-full -mr-0 sm:w-2/3 lg:w-3/5 sm:-mr-20">
            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/727679114?h=839eaecd83&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="HydePHP in 100 seconds"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
        </div>
    </div>
</div>
<div class="relative w-full py-20 pb-20 overflow-hidden bg-white md:pt-40 md:pb-64">
    <svg class="absolute top-0 w-full text-violet-300 fill-current" viewBox="0 0 1400 50" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 50C309.151 16.667 542.484 0 700 0c157.516 0 390.849 16.667 700 50V0H0v50z"/>
    </svg>

    <div class="container relative flex flex-col justify-between h-full max-w-6xl px-8 mx-auto xl:px-0">
        <header class="mb-8">
            <div class="flex mb-2">
                <h2 class="relative  items-center self-start inline-block w-auto text-4xl font-black">
                    <span class="relative">Feature List</span>
                </h2>
            </div>
            <p class="text-lg max-w-2xl">
                While Hyde is packed with far too many quality features to list on this page, here are some highlights that make Hyde a great choice for your next project.
            </p>
        </header>
        <div class="flex w-full h-full">
            <div class="w-full lg:w-2/3">
                <div class="flex flex-col w-full mb-10 sm:flex-row">
                    <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                        <div class="relative ml-0 mr-0 sm:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
                            <div class="relative p-5 bg-white border-2 border-indigo-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <svg class="w-8 h-8 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="48px" viewBox="0 0 20 20" width="48px" fill="#000000"><g><rect fill="none" height="20" width="20"/></g><g><g><path d="M15.71,13.21l-3.46-3.46l1.33-1.33l-2-2l-1.33,1.33L6.79,4.29C6.4,3.9,5.76,3.9,5.37,4.29L4.29,5.37 C3.9,5.76,3.9,6.4,4.29,6.79l3.46,3.46L4,14v2h2l3.75-3.75l3.46,3.46c0.39,0.39,1.02,0.39,1.41,0l1.08-1.08 C16.1,14.24,16.1,13.6,15.71,13.21z M8.46,9.54L5,6.08L6.08,5c0,0,0,0,0,0l0.69,0.69L6.23,6.23L6.89,6.9l0.54-0.54l1.06,1.06 L7.95,7.96l0.67,0.67l0.54-0.54l0.38,0.38L8.46,9.54z M13.92,15l-3.46-3.46l1.08-1.08l0.4,0.4L11.4,11.4l0.67,0.67l0.54-0.54 l1.06,1.06l-0.54,0.54l0.67,0.67l0.54-0.54L15,13.92L13.92,15z"/><path d="M15.62,6.38c0.2-0.2,0.2-0.51,0-0.71l-1.29-1.29c-0.2-0.2-0.51-0.2-0.71,0l-1.34,1.34l2,2L15.62,6.38z"/></g><g/></g></svg>
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Easy Content Creation</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-indigo-500 uppercase">Markdown, Blade, both? It's up to you.</p>
                                <p class="mb-2 text-gray-600">
                                    Create content with Markdown and let Hyde do the heavy lifting.
                                    Sprinkle in some Front Matter for extra credit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div class="relative ml-0 md:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-purple-500 rounded-lg"></span>
                            <div class="relative p-5 bg-white border-2 border-purple-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <svg class="w-8 h-8 text-purple-500 fill-current" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4v2h16V4zm1 10v-2l-1-5H4l-1 5v2h1v6h10v-6h4v6h2v-6h1zm-9 4H6v-4h6v4z"/></svg>
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Built-in Frontend</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-purple-500 uppercase">Batteries (and more) Included</p>
                                <p class="mb-2 text-gray-600">
                                    Hyde comes shipped with a full-featured frontend using TailwindCSS and customizable Laravel Blade templates.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full mb-5 sm:flex-row">
                    <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                        <div class="relative ml-0 mr-0 sm:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
                            <div class="relative p-5 bg-white border-2 border-blue-400 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <svg class="w-8 h-8 text-blue-400 fill-current" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M16.01 7L16 3h-2v4h-4V3H8v4h-.01C7 6.99 6 7.99 6 8.99v5.49L9.5 18v3h5v-3l3.5-3.51v-5.5c0-1-1-2-1.99-1.99z"/></svg>
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">The power of Laravel</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-blue-400 uppercase">Based on Laravel Zero</p>
                                <p class="mb-2 text-gray-600">Laravel Developers will feel right at home with Hyde.
                                    You're gonna love our Artisan-based CLI and Blade templating</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div class="relative ml-0 md:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-teal-500 rounded-lg"></span>
                            <div class="relative p-5 bg-white border-2 border-teal-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <svg class="w-8 h-8 text-teal-500 fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48px" viewBox="0 0 24 24" width="48px" fill="#000000"><rect fill="none" height="24" width="24"/><g><path d="M17.41,6.59L15,5.5l2.41-1.09L18.5,2l1.09,2.41L22,5.5l-2.41,1.09L18.5,9L17.41,6.59z M21.28,12.72L20.5,11l-0.78,1.72 L18,13.5l1.72,0.78L20.5,16l0.78-1.72L23,13.5L21.28,12.72z M16.24,14.37l1.94,1.47l-2.5,4.33l-2.24-0.94 c-0.2,0.13-0.42,0.26-0.64,0.37L12.5,22h-5l-0.3-2.41c-0.22-0.11-0.43-0.23-0.64-0.37l-2.24,0.94l-2.5-4.33l1.94-1.47 C3.75,14.25,3.75,14.12,3.75,14s0-0.25,0.01-0.37l-1.94-1.47l2.5-4.33l2.24,0.94c0.2-0.13,0.42-0.26,0.64-0.37L7.5,6h5l0.3,2.41 c0.22,0.11,0.43,0.23,0.64,0.37l2.24-0.94l2.5,4.33l-1.94,1.47c0.01,0.12,0.01,0.24,0.01,0.37S16.25,14.25,16.24,14.37z M13,14 c0-1.66-1.34-3-3-3s-3,1.34-3,3s1.34,3,3,3S13,15.66,13,14z"/></g></svg>
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Customizable to the Core</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-teal-500 uppercase">Convention over configuration</p>
                                <p class="mb-2 text-gray-600">Hyde is pre-configured for the majority of use cases. Not happy with something? You have the power to change it.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden w-1/3 lg:block">
                <div class="absolute w-screen max-w-4xl pl-12 -mt-20">
                    <div class="absolute top-0 left-0 w-full h-full mt-2 ml-10 bg-gray-900 rounded-lg"></div>
                    <div class="relative overflow-hidden border-2 border-black rounded-lg">
                        <img src="media/markdown-pages.png" alt="Splitscreen view of the Markdown source for a HydePHP website, and it's Markdown preview" class="object-cover w-full h-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('testimonials')
    <svg class="absolute bottom-0 w-full text-gray-100 fill-current" viewBox="0 0 1400 74" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z" /></svg>
</div>

<div class="relative w-full pt-24 pb-32 md:pb-56 bg-gray-100">

    <div class="container relative flex flex-col justify-between h-full max-w-6xl px-8 mx-auto">
        <div class="flex flex-col justify-center w-full">
            <h2 class="relative  items-center self-center inline-block w-auto mb-5 text-4xl md:text-5xl font-black">
                <span class="relative">Who's it for?</span>
            </h2>
            <p class="self-center mb-12 font-medium text-gray-600 mx-auto max-w-3xl text-center">
                While you don't need to know PHP or Laravel, Hyde is aimed at developers and requires basic command-line knowledge.
                Here is a breakdown of some key bullet points tailored to various use cases.
            </p>

            <div class="flex flex-col sm:flex-row items-center lg:items-stretch justify-center h-full sm:flex-wrap ">
                <div class="w-full min-w-[16rem] max-w-sm mx-4 lg:mx-0 lg:w-1/3 h-auto flex flex-auto">
                    <div class="flex flex-col h-full flex-auto items-center px-4 py-12 bg-white border-2 border-black rounded-lg lg:px-5 xl:px-12 lg:rounded-r-none lg:rounded-l-lg">
                        <h4 class="flex text-center items-center my-2 text-2xl font-black">Laravel Artisans</h4>
                        <div class="font-light text-center">Are Hyde <span class="font-bold text-red-500">first-class citizens</span>.</div>

                        <ul class="flex flex-col justify-start px-2 py-10 pt-8 list-disc pricing-list">

                            <li class="mt-2">
                                HydePHP is based on Laravel Zero
                            </li>

                            <li class="mt-2">
                                Render <span class="">Blade</span> files to HTML
                            </li>

                            <li class="mt-2">
                                Artisan-based CLI interface
                            </li>

                            <li class="mt-2">
                                Automatic <span class="">pseudo-routing</span>
                            </li>

                            <li class="mt-2">
                                Preconfigured Laravel Mix
                            </li>

                            <li class="mt-2">
                                File-based <span class="">Collections</span>
                            </li>
                        </ul>

                        <a href="https://hydephp.com/docs/1.x/architecture-concepts" class="relative w-full text-center group mt-auto">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-red-500 rounded  group-hover:m-0 "></span>
                            <span class="relative inline-block w-full h-full px-5 py-3 text-base font-bold bg-white border-2 border-black rounded fold-bold  group-hover:bg-red-300 ">Architecture Concepts</span>
                        </a>
                    </div>
                </div>

                <div class="w-full min-w-[16rem] max-w-sm mx-4 lg:mx-0 lg:w-1/3 h-auto flex flex-auto">
                    <div class="flex flex-col h-full flex-auto items-center px-4 py-12 my-8 bg-white border-2 border-black rounded-lg lg:border-l-0 lg:border-r-0 lg:my-0 lg:rounded-none lg:px-5 xl:px-12">
                        <h4 class="flex text-center items-center my-2 text-2xl font-black sm:whitespace-nowrap">Markdown Aficionados</h4>
                        <div class="font-light text-center">Have  <span class="font-bold text-blue-500">their rightful place</span>, at last.</div>

                        <ul class="flex flex-col justify-start px-2 py-10 pt-8 list-disc pricing-list">
                            <li class="mt-2">
                                <span class=""></span> Simple Markdown Pages
                            </li>

                            <li class="mt-2">
                                <span class="">Easy</span> Documentation sites
                            </li>

                            <li class="mt-2">
                                <span class="">Smart</span> Blog Posts
                            </li>

                            <li class="mt-2">
                                Torchlight Syntax Highlighting
                            </li>

                            <li class="mt-2">
                                YAML Front Matter
                            </li>

                            <li class="mt-2">
                                Automatic RSS feed
                            </li>
                        </ul>

                        <a href="https://hydephp.com/docs/1.x/blog-posts" class="relative w-full text-center group mt-auto">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded group-hover:m-0 "></span>
                            <span class="relative inline-block w-full h-full px-5 py-3 text-base font-bold bg-white border-2 border-black rounded fold-bold  group-hover:bg-blue-300 ">Markdown Documentation</span>
                        </a>
                    </div>
                </div>

                <div class="w-full min-w-[16rem] max-w-sm mx-4 lg:mx-0 lg:w-1/3 h-auto flex flex-auto">
                    <div class="flex flex-col h-full flex-auto items-center px-4 py-12 ml-0 bg-white border-2 border-black rounded-lg lg:px-6 xl:px-12 lg:rounded-l-none lg:rounded-r-lg">
                        <h4 class="flex text-center items-center my-2 text-2xl font-black">Developers & More</h4>
                        <div class="font-light text-center">And some <span class="font-bold text-green-500">more features</span>.</div>

                        <ul class="flex flex-col justify-start px-2 py-10 pt-8 list-disc pricing-list">

                            <li class="mt-2">
                                <span class="">Free</span> and Open Source
                            </li>

                            <li class="mt-2">
                                <span class="">Automatic</span> Navigation Menus
                            </li>

                            <li class="mt-2">
                                <span class="">Customizable</span> & Configurable
                            </li>

                            <li class="mt-2">
                                No databases needed
                            </li>

                            <li class="mt-2">
                                Version controllable
                            </li>

                            <li class="mt-2">
                                And Much More
                            </li>
                        </ul>
                        <a href="https://hydephp.com/docs/1.x/quickstart" class="relative w-full text-center group mt-auto">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded   group-hover:m-0 "></span>
                            <span class="relative inline-block w-full h-full px-5 py-3 text-base font-bold bg-white border-2 border-black rounded fold-bold group-hover:bg-green-300">Installation Guide</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="absolute bottom-0 w-full text-white fill-current" viewBox="0 0 1400 74" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z" /></svg>
</div>

<div>
    @include('sections.posts')
</div>

<style> html, body { scroll-behavior: smooth; } </style>
@endsection
