---
navigation:
    priority: 35
    label: "Helpers and Utilities"
---

# Helpers and Utilities

## Introduction

HydePHP comes with a few helper classes and utilities to make your life easier. This page will cover some of the most important ones.
Note that these helpers targets those who write custom code and Blade templates, and that you are expected to have a basic understanding of programming and PHP.


## File-based Collections

Hyde provides `DataCollections`, a subset of [Laravel Collections](https://laravel.com/docs/10.x/collections) giving you a similar developer experience to working with Eloquent Collections. However, instead of accessing a database,
it's all entirely file-based using static data files such as Markdown, Yaml, and JSON files which get parsed into objects that you can easily work with.

```php
use Hyde\Support\DataCollections;

// Gets all Markdown files in resources/collections/$name directory
DataCollections::markdown(string $name);

// Gets all YAML files in resources/collections/$name directory
DataCollections::yaml(string $name);

// Gets all JSON files in resources/collections/$name directory
DataCollections::json(string $name, bool $asArray = false);
```

See the [File-based Collections](collections) documentation for the full details.


## File Includes

The Includes facade provides a simple way to access partials in the includes directory.

If the file does not exist, the method will return `null`.
You can also supply a default value as the second argument.
Both Markdown and Blade includes will be rendered to HTML.

### Using Includes

Includes are stored in the `resources/includes` directory. You can access them using the `Includes` facade.

```php
use Hyde\Support\Includes;

// Get the raw contents of any arbitrary file in the includes directory
Includes::get('example.md');

// Get the raw contents of an HTML file in the includes directory
Includes::html('example.html');

// Get the rendered Blade of a partial file in the includes directory
Includes::blade('example.blade.php');

// Get the rendered Markdown of a partial file in the includes directory
Includes::markdown('example.md');
```

When using the `html`, `markdown`, and `blade` methods, the file extension is optional.

```php
use Hyde\Support\Includes;

Includes::html('example') === Includes::html('example.html');
Includes::blade('example')  === Includes::blade('example.blade.php');
Includes::markdown('example') === Includes::markdown('example.md');
```

All methods will return `null` if the file does not exist.
However, you can supply a default value as the second argument to be used instead.
Remember that Markdown and Blade defaults will still be rendered to HTML.

```php
use Hyde\Support\Includes;

// If the file does not exist, the default value will be returned
Includes::markdown('example.md', 'Default content');
```

### Stock Includes

HydePHP also supports some drop-in includes that you can use as an alternative to some config options. These currently are as follows:

- `footer` If a `footer.md` file exists in the includes directory, Hyde will use that as the footer text, instead of the one set in the `hyde.footer` config option.
- 'head' If a `head.html` file exists in the includes directory, Hyde include that within the `<head>` tag of the generated HTML, in addition to the one set in the `hyde.head` config option.
- 'scripts' If a `scripts.html` file exists in the includes directory, Hyde include that at the end of the `<body>` tag of the generated HTML, in addition to the one set in the `hyde.scripts` config option.


## Reading time helper

The `ReadingTime` helper provides a simple way to calculate the reading time of a given string, for example a blog post.

### Create a new `ReadingTime` instance

There are a few ways to create a new `ReadingTime` instance. Either create a new instance directly, or use the static `fromString` or `fromFile`  helpers.

In all cases, you will end up with a `ReadingTime` object that you can use to get the reading time.

```php
// Via constructor
$time = new ReadingTime('Input text string');

// Via static method
$time = ReadingTime::fromString('Input text string');

// Via static method (from file)
$time = ReadingTime::fromFile('path/to/file.txt');
```

### Get the reading time string

To make things really easy, the `ReadingTime` instance can be automatically cast to a human-readable string with the default formatting.

```php
(string) ReadingTime::fromString('Input text string'); // 1min, 0sec
```

```blade
{{ ReadingTime::fromString('Input text string') }} // 1min, 0sec
```

You can also call the `getFormatted` method directly.

```php
ReadingTime::fromString('Input text string')->getFormatted(); // 1min, 0sec
```

### Get the reading time data

We also provide a few methods to get the reading time data directly.

```php
// Get the reading time in seconds
$time->getSeconds();

// Get the reading time in minutes (rounded down)
$time->getMinutes();

// Get the remaining seconds after the rounded down minutes
// (Perfect for showing after the `getMinutes()` value)
$time->getSecondsOver();

// Get the word count of the input string
$time->getWordCount();
```

### Custom formatting

Additionally, there are several ways to customize the output format.

#### Specify sprintf format

The `getFormatted` method accepts a `sprintf` format string as the first argument.

```php
// The default format
$time->getFormatted('%dmin, %dsec');

// Custom format
$time->getFormatted('%d minutes and %d seconds');
```

The first `%d` will be replaced with the minutes, and the second `%d` will be replaced with the seconds.

#### Format using a custom callback

You can also use a custom callback to format the reading time string. This is perfect if you want to create custom formatting logic.

The closure will receive the minutes and seconds as integers and should return a string.

```php
$time->formatUsingClosure(function (int $minutes, int $seconds): string {
    return "$minutes minutes, $seconds seconds";
}); // 1 minutes, 30 seconds
```


## Pagination utility

The `Pagination` class provides utilities to help you create custom pagination components.

Hyde comes with a simple pagination view that you can use, but you can also use the utility to create your own custom pagination components.
You can of course also publish and modify the default pagination view to fit your needs.

The paginator is designed to paginate Hyde pages and their routes, but can also be used with other data sources.

### Base usage

To use the pagination component which is generic by design, you need to create the `Pagination` instance yourself, with the data you want to paginate.

To get started, simply create a paginator instance with a collection or array of items (like pages), and render the component.
You also need to pass the current page being rendered (if you're on pagination page 3, pass that to the constructor).

```php
use Hyde\Support\Paginator;
use Illuminate\Contracts\Support\Arrayable;

$paginator = new Paginator(
    Arrayable|array $items = [],
    int $pageSize = 25,
    int $currentPageNumber = null,
    string $paginationRouteBasename = null
);
```

```blade
@include('hyde::components.pagination-navigation')
```

### Constructor options breakdown

The first two are self-explanatory:

- `items` - The items to paginate. This can be a collection or an array.
- `pageSize` - How many items to show on each page.

The next may need some explanation:

#### `currentPageNumber`

This current page index. You will typically get this from the URL.

#### `paginationRouteBasename`

This adds an optional prefix for the navigation links. For example, if you're paginating blog posts,
you might want the links to be `/posts/page-1.html` instead of `/page-1.html`. You would then set this to `posts`.

### Practical example

HydePHP comes with a started homepage called 'posts'. This includes a component with the following code:

```blade
<div id="post-feed" class="max-w-3xl mx-auto">
    @include('hyde::components.blog-post-feed')
</div>
```

#### Creating our posts page

Now, let's paginate this feed! For this example, we will assume that you ran `php hyde publish:homepage posts`
and renamed the resulting `index.blade.php` file to `posts.blade.php`. We will also assume that you have a few blog posts set up.

The blog post feed component is a simple component that looks like this:

```blade
// filepath _pages/posts.blade.php
@foreach(MarkdownPost::getLatestPosts() as $post)
    @include('hyde::components.article-excerpt')
@endforeach
```

#### Setting up the new Blade components

So we are simply going to inline component, but with the paginator we also declare. So, replace the post feed include with the following:

```blade
// filepath _pages/posts.blade.php
@php
    $paginator = new \Hyde\Support\Paginator(
        // The items to paginate
        items: MarkdownPost::getLatestPosts(),
        // How many items to show on each page
        pageSize: 5,
        // The current page index
        currentPageNumber: 1,
        // Links will be 'posts/page-1.html' instead of 'page-1.html'
        paginationRouteBasename: 'posts'
    );
@endphp

@foreach($paginator->getItemsForPage() as $post)
    @include('hyde::components.article-excerpt')
@endforeach

@include('hyde::components.pagination-navigation')
```

This will set up the paginator loop through only the items for the current page, and render the article excerpts. The last line will render the pagination links.

#### Creating the pagination pages

However, we still need to create the pagination pages, because the paginator will not automatically create them for you.

In order to do this dynamically, we add the following to the `boot` of our `AppServiceProvider` (or any other provider or extension):

```php
// filepath app/Providers/AppServiceProvider.php
<?php

namespace App\Providers;

use Hyde\Hyde;
use Hyde\Support\Paginator;
use Hyde\Pages\MarkdownPost;
use Hyde\Pages\InMemoryPage;
use Hyde\Foundation\HydeKernel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // This registers a callback that runs after the kernel has booted
        Hyde::kernel()->booted(function (HydeKernel $hyde) {
            // First we create a paginator instance using the same settings as in our view
            $paginator = new Paginator(MarkdownPost::getLatestPosts(), 5, 1, 'posts');

            // Then we loop through the total number of pages and create a new page for each one
            foreach (range(1, $paginator->totalPages()) as $page) {
                // Now we set the paginator to the current page number
                $paginator->setCurrentPage($page);

                // Now we create the paginated listing page. We set the identifier to match the route basename we set earlier.
                $listingPage = new InMemoryPage(identifier: "posts/page-$page", matter: [
                    // And the paginator instance. We clone it so that we don't modify the original instance.
                    'paginator' => clone $paginator,

                    // Optionally, specify a custom page title.
                    'title' => "Blog Posts - Page {$page}",
                    // Here we add the paginated collection
                    'posts' => $paginator->getItemsForPage(),
                ],
                    // You can also use a different view if you want to, for example a simpler page just for paginated posts.
                    // This uses the same view system as Laravel, so you can use any vendor view, or a view from the `resources/views` directory.
                    // Hyde also loads views from `_pages/`, so setting `posts` here will load our posts page we created earlier.
                    view: 'posts'
                );

                // This is optional, as the page does not necessarily need to be added to the page collection
                $hyde->pages()->addPage($listingPage);

                // This however is required, so that Hyde knows about the route as we run this after the kernel has booted
                $hyde->routes()->addRoute($listingPage->getRoute());
            }
        });
    }
}
```

#### Updating the listing page view

Now, let's update our `posts` page to accept the paginator data. If you want to use a different view for the paginated posts,
just apply these changes to that new view, but for this example I'm going to update the `posts` view.

```blade
// filepath _pages/posts.blade.php
// torchlight! {"lineNumbers": false}
<h1>Latest Posts</h1>{{-- [tl! remove] --}}
<h1>{{ $page->matter('title') ?? $title }}</h1> {{-- [tl! add] --}}
```

to that new view, but for this example I'm going to update the `posts` view.

```blade
// filepath _pages/posts.blade.php
// torchlight! {"lineNumbers": false}
@php
    $paginator = new \Hyde\Support\Paginator( // [tl! remove]
    $paginator = $page->matter('paginator') ?? new \Hyde\Support\Paginator( // [tl! add]
        items: MarkdownPost::getLatestPosts(),
        pageSize: 5,
        currentPageNumber: 1,
        paginationRouteBasename: 'posts'
    );
@endphp
```

#### Conclusion

And that's it! You now have a paginated blog post feed. You can now visit `/posts/page-1.html` and see the first page of your blog posts.
You can then click the pagination links to navigate to the next pages.
