---
navigation:
    priority: 35
---

# Updating Hyde Projects

This guide will help you update your HydePHP project to the latest version.


## Before you start

When updating an existing installation, first ensure that you have a backup of your project in case anything goes wrong.
The recommended way to do this is to use Git as that allows you to smoothly roll back any changes.


## Version compatibility

HydePHP follows [semantic versioning](https://semver.org/), so you can expect that minor and patch releases will be backwards compatible.
Only major releases may introduce breaking changes, all of which are thoroughly documented in the accompanying release notes.

New features and bug fixes are added in minor and patch releases, so it is recommended to keep your project up to date.

### Side effects and ensuring a smooth update

Please note that due to the intricate nature of software, there is a possibility that an update contains side effects,
hence why version controlling your site is helpful when updating versions as you can roll back changes. It can also
be helpful to version control the compiled HTML, so you can view a diff of the changes. Be sure to test that your site
can be built and that it looks as expected after updating before deploying the changes to your live site.

We of course have extensive tests in place run on each single code commit to ensure all code is functional, however,
it is still possible that some edge cases slip through. This means that a bug fix may impact an edge case that you depend on.

Obligatory related XKCD: [https://xkcd.com/1172](https://xkcd.com/1172)


## Methods

### Which method?

Depending on how you installed Hyde, there are a few different ways to update it.

We have a few methods documented here. The [Git method](#using-git) is recommended as it is the easiest and safest way to
update your project. If you are not using Git, you can still update your project using any of the [manual methods](#manual-update).

Regardless of the method you use, make sure you follow the [post-update instructions](#post-update-instructions) at the end.

### Updating just the Framework

If you just want to update the framework patch version, you can do so by running the following command:

```bash
composer update hyde/framework
```

While the same can still be done for minor versions, it's best to also update your project scaffolding and resources to
ensure that everything is up to date, for which you should use the methods below.

### Using Git

First, make sure you have a remote set up for the base project repository.

```bash
git remote add upstream https://github.com/hydephp/hyde.git
```

Then pull the latest release from the upstream repository.

```bash
git pull upstream master
```

After this, you should update your composer dependencies:

```bash
composer update
```

Next, follow the post-update instructions.

### Manual Update

If you are not using Git, you can still update your project. This is a bit more involved, but it is still possible.

1. First, you will need to download the latest release archive from the [releases page](https://github.com/hydephp/hyde/releases).
2. Then extract the archive, and copy the contents into your project directory.

Since this may overwrite modified files, it may be safer to use the [hard update](#hard-update) method.

### Hard Update

If you are having trouble updating your project, you can try a hard update. In short, this approach consists of creating
a brand new project and copying over only your source and resource files. If you do not want to use Git, this may be
the safest option as you won't be overriding any of your existing files.

If you have changed any other files, for example in the App directory, you will need to update those files manually as well.
The same goes if you have created any custom Blade components or have modified Hyde ones.

**Here is an example CLI workflow, but you can do the same using a graphical file manager.**

```bash
mv my-project my-project-old
composer create-project hyde/hyde my-project

cp -r my-old-project/_pages my-project/content/_pages
cp -r my-old-project/_posts my-project/content/_posts
cp -r my-old-project/_media my-project/content/_media
cp -r my-old-project/_docs my-project/content/_docs
cp -r my-old-project/config my-project/config
```

Next, follow the post-update instructions. After verifying that everything is working, you can delete the old project directory.


## Post-update instructions

After updating Hyde you should update your config and resource files. This is where things can get a tiny bit dangerous
as existing files may be overwritten. If you are using Git, you can easily take care of any merge conflicts that arise.

First, ensure that your dependencies are up to date. If you have already done this, you can skip this step.

```bash
composer update
```

Then, update your config files. This is the hardest part, as you may need to manually copy in your own changes.

```bash
php hyde publish:configs
```

If you have published any of the included Blade components you will need to re-publish them.

```bash
php hyde publish:views layouts
php hyde publish:views components
```

Next, recompile your assets, if you are not using the built-in assets.

```bash
npm install
npm run dev/prod
```

Finally, you can rebuild your site.

```bash
php hyde build
```

Now, you should browse your site files to ensure things are still looking as expected.
