---
navigation:
    label: "Customizing your Site"
    priority: 25
---

# Customizing your Site

## Introduction

Hyde favours <a href="https://en.wikipedia.org/wiki/Convention_over_configuration">"Convention over Configuration"</a>
and comes preconfigured with sensible defaults. However, Hyde also strives to be modular and endlessly customizable
if you need it. This page guides you through the many options available!

All the configuration files are stored in the config directory, and allow you to customize almost all aspects of your site.
Each option is documented, so feel free to look through the files and get familiar with the options available to you.


## Accessing Configuration Values

### Configuration API Recap

HydePHP uses the same configuration system as Laravel. Here's a quick recap from the [Laravel Documentation](https://laravel.com/docs/10.x/configuration):

You may easily access your configuration values using the global `config` function from anywhere in your project code.
The configuration values may be accessed using "dot notation" syntax, which includes the name of the file and option you wish to access.

```php
$value = config('hyde.name');
```

A default value may also be specified and will be returned if the configuration option does not exist:

```php
$value = config('hyde.name', 'HydePHP');
```

HydePHP also provides a strongly typed `Config` facade which extends the Laravel `Config` facade, but allows strict types:

```php
use Hyde\Facades\Config;

// Will always return a string, or it throws a TypeError
$name = Config::getString('hyde.name', 'HydePHP'): string;
```

### Dot Notation

As seen in the example above, when referencing configuration options, we often use "dot notation" to specify the configuration file.
For example, `config('hyde.name')` means that we are looking for the `name` option in the `config/hyde.php` file.

### Front Matter or Configuration Files?

In some cases, the same options can be set in the front matter of a page or in a configuration file. Both ways are always documented, and it's up to you to choose which one you prefer. Note that in most cases, if a setting is set in both the front matter and the configuration file, the front matter setting will take precedence.

### A note on file paths

When Hyde references files, especially when passing filenames between components, the file path is almost always
relative to the root of the project. Specifying absolute paths yourself could lead to unforeseen problems.


## Configuration Files Overview

There are a few configuration files available in the `config` directory. All options are documented, so feel free to look through the files and get familiar with the options available to you.

Below are two tables over the different configuration files. Click on a file name to see the default file on GitHub.

### HydePHP Configuration Files

These are the main configuration files for HydePHP and lets you customize the look and feel of your site, as well as the behaviour of HydePHP itself.
The main configuration file, `hyde.php`, is used for things ranging from site name and base URL to navigation menus and what features to enable.

| Config File                                                                                                        | Description                                                                                       |
|--------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------|
| <a href="https://github.com/hydephp/hyde/blob/master/config/hyde.php" rel="nofollow noopener">hyde.php</a>         | Main HydePHP configuration file for customizing the overall project.                              |
| <a href="https://github.com/hydephp/hyde/blob/master/config/docs.php" rel="nofollow noopener">docs.php</a>         | Options for the HydePHP documentation site generator module.                                      |
| <a href="https://github.com/hydephp/hyde/blob/master/config/markdown.php" rel="nofollow noopener">markdown.php</a> | Configure Markdown related services, as well as change the CommonMark extensions.                 |
| <a href="https://github.com/hydephp/hyde/blob/master/app/config.php" rel="nofollow noopener">app/config.php</a>    | Configures the underlying Laravel application. (Commonly found as config/app.php in Laravel apps) |

>info Tip: The values in `hyde.php` can also be set in YAML by creating a `hyde.yml` file in the root of your project. See [#yaml-configuration](#yaml-configuration) for more information.

### Publishable Laravel & Package Configuration Files

Since HydePHP is based on Laravel we also have a few configuration files related to them. As you most often don't need
to edit any of these, unless you want to make changes to the underlying application, they are not present in the
base HydePHP installation. However, you can publish them to your project by running `php hyde publish:configs`.

| Config File                                                                                                            | Description                                                             |
|------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------|
| <a href="https://github.com/hydephp/hyde/blob/master/config/view.php" rel="nofollow noopener">view.php</a>             | Configures the paths for the Blade View compiler.                       |
| <a href="https://github.com/hydephp/hyde/blob/master/config/cache.php" rel="nofollow noopener">cache.php</a>           | Configures the cache driver and cache path locations.                   |
| <a href="https://github.com/hydephp/hyde/blob/master/config/commands.php" rel="nofollow noopener">commands.php</a>     | Configures the Laravel Zero commands for the HydeCLI.                   |
| <a href="https://github.com/hydephp/hyde/blob/master/config/torchlight.php" rel="nofollow noopener">torchlight.php</a> | Configures settings for the Torchlight syntax highlighting integration. |

{.align-top}

If any of these files are missing, you can run `php hyde publish:configs` to copy the default files to your project.


## Configuration Options

While all options are already documented within the files, here are some further explanations of some of the options.

### RSS feed generation

When enabled, an RSS feed containing all your Markdown blog posts will be generated when you compile your static site.
Here are the default settings:

```php
// filepath config/hyde.php
'rss' => [
    // Should the RSS feed be generated?
    'enabled' => true,

    // What filename should the RSS file use?
    'filename' => 'feed.xml',

    // The channel description.
    'description' => env('SITE_NAME', 'HydePHP').' RSS Feed',
],
```

>warning Note that this feature requires that a site `url` is set!

### Authors

Hyde has support for adding authors in front matter, for example to
automatically add a link to your website or social media profiles.
However, it's tedious to have to add those to each and every
post you make, and keeping them updated is even harder.

You can predefine authors in the Hyde config.
When writing posts, just specify the username in the front matter,
and the rest of the data will be pulled from a matching entry.

#### Example

```php
// torchlight! {"lineNumbers": false}
'authors' => [
    Author::create(
        username: 'mr_hyde', // Required username
        name: 'Mr. Hyde', // Optional display name
        website: 'https://hydephp.com' // Optional website URL
    ),
],
```

This is equivalent to the following front matter in a blog post:

```yaml
author:
    username: mr_hyde
    name: Mr. Hyde
    website: https://hydephp.com
```

But you only have to specify the username:

```yaml
author: mr_hyde
```

### Footer

Most websites have a footer with copyright details and contact information. You probably want to change the Markdown to include your information, though you are of course welcome to keep the default attribution link!

The footer component is made up of a few levels of components, depending on how much you want to customize.

#### Customizing the Markdown text

There are two ways to customize the footer text. First, you can set it in the configuration file:

```php
// filepath: config/hyde.php
'footer' => 'Site proudly built with [HydePHP](https://github.com/hydephp/hyde) 🎩',
```

If you don't want to write Markdown in the configuration file, you can create a Markdown file in your includes directory. When this file is found, it will be used instead of the configuration setting.

```markdown
// filepath: resources/includes/footer.md
Site proudly built with [HydePHP](https://github.com/hydephp/hyde) 🎩
```

In both cases the parsed Markdown will be rendered in the footer Blade component.

#### Customizing the Blade component

The actual footer component is rendered using the [`layouts/footer.blade.php`](https://github.com/hydephp/framework/blob/master/resources/views/layouts/footer.blade.php) Blade template.

In this template we automatically render the configured footer Markdown text. If you want to change this behaviour, for example, HydePHP.com uses a more sophisticated footer, simply [publish the footer component](#blade-views).

#### Disabling the footer entirely

If you don't want to have a footer on your site, you can set the `'footer'` configuration option to `false`.

```php
// filepath: config/hyde.php
'footer' => 'false',
```

### Navigation Menu & Sidebar

A great time-saving feature of HydePHP is the automatic navigation menu and documentation sidebar generation.
Hyde is designed to automatically configure these menus for you based on the content you have in your project.

Still, you will likely want to customize some parts of these menus, and thankfully, Hyde makes it easy to do so.

#### Customizing the navigation menu

- To customize the navigation menu, use the setting `navigation.order` in the `hyde.php` config.
- When customizing the navigation menu, you should use the [route key](core-concepts#route-keys) of the page.

Learn more in the [Navigation Menu](navigation-menus) documentation.

#### Customizing the documentation sidebar

- To customize the sidebar, use the setting `sidebar_order` in the `docs.php` config.
- When customizing the sidebar, can use the route key, or just the [page identifier](core-concepts#page-identifiers) of the page.

Learn more in the [Documentation Pages](documentation-pages) documentation.

>info Tip: When using subdirectory-based dropdowns, you can set their priority using the directory name as the array key.

### Primer on priorities

All navigation menu items have an internal priority value that determines its order in the navigation.
Lower values means that the item will be higher up in the menu. The default for pages is `999` which puts them last.
However, some pages are autoconfigured to have a lower priority, for example, the `index` page defaults to a priority of `0`,

#### Basic syntax for changing the priorities

The cleanest way is to use the list-style syntax where each item will get the priority calculated according to its position in the list, plus an offset of `500`.
The offset is added to make it easier to place pages earlier in the list using front matter or with explicit priority settings.

```php
[
    'readme', // Gets priority 500
    'installation', // Gets priority 501
    'getting-started', // Gets priority 502
]
```

#### Explicit syntax for changing the priorities

You can also specify explicit priorities by adding a value to the array key:

```php
[
    'readme' => 10, // Gets priority 10
    'installation' => 15, // Gets priority 15
    'getting-started' => 20, // Gets priority 20
]
```

You can also combine these options if you want:

```php
[
    'readme' => 10, // Gets priority 10
    'installation', // Gets priority 500
    'getting-started', // Gets priority 501
]
```

You can also set the priority of a page directly in the front matter. This will override any dynamically inferred or
config defined priority. While this is useful for one-offs, it can make it harder to reorder items later on.
It's up to you which method you prefer to use. This setting can be used both for the navigation menu and the sidebar.

```markdown
---
navigation:
    priority: 25
---
```

#### Changing the menu item labels

Hyde makes a few attempts to find a suitable label for the navigation menu items to automatically create helpful titles.
You can override the label using the `navigation.label` front matter property.

From the Hyde config you can also override the label of navigation links using the by mapping the route key
to the desired title. Note that the front matter property will take precedence over the config property.

```php
// filepath config/hyde.php
'navigation' => [
    'labels' => [
        'index' => 'Start',
        'docs/index' => 'Documentation',
    ]
]
```

#### Excluding Items (Blacklist)

Sometimes, especially if you have a lot of pages, you may want to prevent links from showing up in the main navigation menu.
To remove items from being automatically added, simply add the page's route key to the blacklist.
As you can see, the `404` page has already been filled in for you.

```php
// filepath config/hyde.php
'navigation' => [
    'exclude' => [
        '404'
    ]
]
```

You can also specify that a page should be excluded by setting the page front matter.

```markdown
---
navigation:
    hidden: true
---

#### Adding Custom Navigation Menu Links

You can easily add custom navigation menu links similar how we add Authors. Simply add a `NavItem` model to the `navigation.custom` array.

When linking to an external site, you should use the `NavItem::forLink()` method facade. The first two arguments are the
destination and label, both required. Third argument is the priority, which is optional, and defaults to 500.

```php
// filepath config/hyde.php
use Hyde\Framework\Features\Navigation\NavItem;

'navigation' => [
    'custom' => [
        NavItem::forLink('https://github.com/hydephp/hyde', 'GitHub', 200),
    ]
]
```

Simplified, this will then be rendered as follows:

```html
<a href="https://github.com/hydephp/hyde">GitHub</a>
```

## Blade Views

Hyde uses the Laravel Blade templating engine. Most parts of the included templates have been extracted into components to be customized easily.
Before editing the views you should familiarize yourself with the [Laravel Blade Documentation](https://laravel.com/docs/10.x/blade).

To edit a default Hyde component you need to publish them first using the `hyde publish:views` command.

```bash
php hyde publish:views
```

The files will then be available in the `resources/views/vendor/hyde` directory.

## Frontend Styles

Hyde is designed to not only serve as a framework but a whole starter kit and comes with a Tailwind starter template
for you to get up and running quickly. If you want to customize these, you are free to do so.
Please see the [Managing Assets](managing-assets) page to learn more.

## Markdown Configuration

Hyde uses [League CommonMark](https://commonmark.thephpleague.com/) for converting Markdown into HTML, and
uses the GitHub Flavored Markdown extension. The Markdown related settings are found in the `config/markdown.php` file.
Below follows an overview of the Markdown configuration options available in Hyde.

### CommonMark Extensions

You can add any extra [CommonMark Extensions](https://commonmark.thephpleague.com/2.3/extensions/overview/),
or change the default ones, using the `extensions` array in the config file. They will then automatically be loaded into
the CommonMark converter environment when being set up by Hyde.

```php
// filepath: config/markdown.php
'extensions' => [
    \League\CommonMark\Extension\GithubFlavoredMarkdownExtension::class,
    \League\CommonMark\Extension\Attributes\AttributesExtension::class,
],
```

Remember that you may need to install any third party extensions through Composer before you can use them.

### CommonMark Configuration

In the same file you can also change the configuration values to be passed to the CommonMark converter environment.
Hyde handles many of the options automatically, but you may want to override some of them and/or add your own.

```php
// filepath: config/markdown.php
'config' => [
    'disallowed_raw_html' => [
        'disallowed_tags' => [],
    ],
],
```

See the [CommonMark Configuration Docs](https://commonmark.thephpleague.com/2.3/configuration/) for the available options.
Any custom options will be merged with the defaults.

### Allow Raw HTML

Since Hyde uses [GitHub Flavored Markdown](https://commonmark.thephpleague.com/2.3/extensions/github-flavored-markdown/),
some HTML tags are stripped out by default. If you want to allow all arbitrary HTML tags, and understand the risks involved,
you can use the `allow_html` setting to enable all HTML tags.

```php
// filepath: config/markdown.php
'allow_html' => true,
```

### Allow Blade Code

HydePHP also allows you to use Blade code in your Markdown files. This is disabled by default, since it allows
arbitrary PHP code specified in Markdown to be executed. It's easy to enable however, using the `enable_blade` setting.

```php
// filepath: config/markdown.php
'enable_blade' => true,
```

See the [Blade in Markdown](advanced-markdown#blade-support) documentation for more information on how to use this feature.

## YAML Configuration

The settings in the `config/hyde.php` file can also be set by using a `hyde.yml` file in the root of your project directory.

Note that YAML settings cannot call any PHP functions, so you can't access helpers like `env()` for environment variables,
nor declare authors or navigation links, as you cannot use facades and objects. But that doesn't stop you from using both
files if you want to. Just keep in mind that any duplicate settings in the YAML file override any made in the PHP file.

Here is an example showing some of the `config/hyde.php` file settings, and how they would be set in the YAML file.

```yaml
# filepath hyde.yml
name: HydePHP
url: "http://localhost"
pretty_urls: false
generate_sitemap: true
rss:
  enabled: true
  filename: feed.xml
  description: HydePHP RSS Feed
language: en
output_directory: _site
```

### Namespaced YAML Configuration

If you are running `v1.2` or higher, you can also use namespaced configuration options in the YAML file.

This allows you to set the settings of **any** configuration file normally found in the `config` directory.

This feature is automatically enabled when you have a `hyde:` entry **first** in your `hyde.yml` file

```yaml
# filepath hyde.yml
hyde:
  name: HydePHP

docs:
  sidebar:
    header: "My Docs"
```

This would set the `name` setting in the `config/hyde.php` file, and the `sidebar.header` setting in the `config/docs.php` file.

Each top level key in the YAML file is treated as a namespace, and the settings are set in the corresponding configuration file.
You can of course use arrays like normal even in namespaced configuration.
