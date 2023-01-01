---
label: "Advanced Markdown"
priority: 26
---

# Advanced Markdown

## Introduction

Since HydePHP makes heavy use of Markdown there are some extra features and helpers created just for Hyde to make using Markdown even easier!

## Raw HTML Tags

HydePHP uses the GitHub Flavored Markdown extension to convert Markdown. This, by default strips out some HTML tags. If you want to allow all arbitrary HTML tags, and understand the risks involved, enable all HTML tags by setting the following option to true in your `config/markdown.php` file.

```php
// filepath: config/markdown.php
// torchlight! {"lineNumbers": false}
'allow_html' => true,
```

This, will behind the scenes add the bundled `DisallowedRawHtml` extension, and configure it so that no HTML tags are stripped out.

## Blade Support

Since Hyde v0.30.x you can use Laravel Blade in Markdown files!

### Using Blade in Markdown

To use Blade in your Markdown files, simply use the Blade shortcode directive,
followed by your desired Blade string.

#### Standard syntax

```markdown
 [Blade]: {{ "Hello World!" }} // Will render: 'Hello World!'
```

#### Blade includes

Only single-line shortcode directives are supported. If you need to use multi-line Blade code,
use an `@include` directive to render a more complex Blade template. 
You can pass data to includes by specifying an array to the second argument.

```markdown
 [Blade]: @include("hello-world")
 [Blade]: @include("hello", ["name" => "World"])
```

### Enabling Blade-supported Markdown
It's disabled by default since it allows arbitrary PHP to run, which could be a security risk,
depending on your setup. However, if your Markdown is trusted, and you know it's safe,
you can enable it in the `config/markdown.php` file.

```php
// torchlight! {"lineNumbers": false}
'enable_blade' => true,
```

#### Limitations

All shortcodes must be the first word on a new line.
For example, using a space before the `[Blade]:` will intentionally cause it to not render.

## Coloured Blockqoutes

The HydePHP Markdown converter also supports some extra directives and features. One of them being four different coloured blockquotes. Simply append the colour after the initial `>` character.


```markdown
‎> Normal Blockquote
‎>info Info Blockquote
‎>warning Warning Blockquote
‎>danger Danger Blockquote
‎>success Success Blockquote
```

> Normal Blockquote
>info Info Blockquote
>warning Warning Blockquote
>danger Danger Blockquote
>success Success Blockquote

#### Customizations

You can easily customize these styles too by adding and editing the following in your `resources/app.css` file, and then recompiling your site styles.
The code examples here use the Tailwind `@apply` directives, but you could also use `border-color: blue;` just as well.

```css
/* filepath resources/app.css

/* Markdown Features */

.prose blockquote.info {
	@apply border-blue-500;
}

.prose blockquote.success {
	@apply border-green-500;
}

.prose blockquote.warning {
	@apply border-amber-500;
}

.prose blockquote.danger {
	@apply border-red-600;
}
```

#### Limitations

Note that these currently do not support multi-line blockquotes.

## Code block filepaths

When browsing these documentation pages you may have noticed a label in the top right corner of code blocks specifying the file path.
These are also created by using a custom Hyde feature that turns code comments into automatic code blocks.

Simply add a code comment in the **first line** of a `fenced code block` like so:

````markdown
// Filepath: _docs/advanced-markdown.md
```php
// Filepath: hello-world.php // HYDE! {"shortcodes": false} HYDE! // 

echo 'Hello World!';
```
````

Which becomes:

```php
// Filepath: hello-world.php 

echo 'Hello World!';
```

#### Alternative syntax

The syntax is rather forgiving by design, and supports using both `//` and `#` for comments.
The colon is also optional, and the 'f' can be both upper or lower case. So the following is also perfectly valid:

````markdown
```js
// filepath hello.js // HYDE! {"shortcodes": false} HYDE! //
console.log('Hello World!');
```
````

If you have a newline after the filepath like in the first example, it will be removed so your code stays readable.

#### Limitations

The filepaths are hidden on mobile devices using CSS to prevent them from overlapping with the code block.
