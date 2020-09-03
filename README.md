_svbk
===

Hi. I'm a starter theme called `_svbk`, a superset of the popular [`_s`](https://github.com/Automattic/_s) theme. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

On top of the standard `_s` I feature:
* `Gulp` for real-time SASS compiling
* `Composer` for dependancy management
* An installer script
* Few extras and customizations that makes me less raw

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `inc/custom-header.php` just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* An `editor.php` to add and customize TinyMCE's editor buttons
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
Note: `.no-sidebar` styles are not automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Install
---------------

### Install Dependencies

```bash
npm install
```

I you don't aready have a gulp installed, you should install it via:

```bash
npm install -g gulp
```

### Setup

Edit the `config.json` file and customize all the parameters, primarly the `theme_name` and `theme_handle` parameters.

Run `gulp setup`, this builds all the `dist` files and customizes all the functions names with your theme prefix.

### Development

This theme has many `gulp` tasks to help development, you can find all of them in the `gulpfile.js`.

Here some of the most useful ones:

```bash
# Compile SASS, Images and JS in real time. 
gulp serve

# Replaces all function prefixes and text-domains with `theme_handle`, useful after git merges.
gulp replaceMarkers

# Compiles and overwrites all the assets in the `dist` folder for production.
gulp build
```

When you have completed your sprint, should bump the `theme_version` config entry in `composer.json`, this will be automatically added to all assets URLs to help cache-busting.

## Block Editor (Gutenberg) Blocks
This theme comes with many Blocks, you can find them in the `blocks` folder.

You can compile theme Blocks with:
```bash
# In real time while developing
npm run blocks

# To build the optimized production code
npm run blocks:build
```

## `wp-env`

This theme is compatible with the [wp-env](https://developer.wordpress.org/block-editor/packages/packages-env/) environment.

You can test or develop for this theme by running:

```bash
# To start the WP server
npm run wp-env start

# To refresh the wp-env after some options changes (WP_HOME, etc)
npm run wp-env start -- --update 

# To stop the WP server
npm run wp-env stop
```
The website will be available by default at [http://localhost](http://localhost).

If you need to run `wp-cli` commands you can use the `npm run wp` script helper.

Example:
```bash
# Outputs the current env user list
npm run wp user list
```

The `.wp-env.json` file contains the configuration for the environment, but if you need to customize it just for your current projects need it's better to create a [.wp-env.override.json](https://developer.wordpress.org/block-editor/packages/packages-env/#wp-env-override-json) file that isn't committed in the repo.

