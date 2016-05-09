# Chingford & District Model Engineering Club Website

This directory contains the code for the Chingford & District Model Engineering Club website  [http://cdmec.co.uk](http://cdmec.co.uk)

## TL;DR

This website is built using [Jekyll](http://jekyllrb.com/)

Assets managed with [jekyll-assets](https://jekyll.github.io/jekyll-assets/)

***

## Usage

Start local server by running

```
jekyll serve
```

Then visit [http://localhost:4000](http://localhost:4000).

## Deployment

Currently done via FTP with the clubs shared web host. Run

```
jekyll build
```

to generate the site, then copy the contents of `_site/` to the `public_html/` root directory.

## Assets

Fonts, images, CSS, and JavaScript are managed using [jekyll-assets](https://jekyll.github.io/jekyll-assets/).

### Fonts

* Gill Sans MT: `_assets/fonts/` Included using `@font-face` in `main.css.scss`
* [Bootstrap](http://getbootstrap.com/) Glyphicons: `_assets/fonts/vendor/bootstrap/`
* [FontAwesome](https://fortawesome.github.io/Font-Awesome/): Uses Font Awesome CDN, JavaScript included in `<head>`

### Images

All images should be compressed and optimised before inclusion in the repository.

### CSS

The main CSS file `_assets/stylesheets/main.css.scss` is included in `_includes/head.html` and includes [Bootstrap](http://getbootstrap.com/) and all the components for custom styling. This is minified by [jekyll-assets](https://jekyll.github.io/jekyll-assets/) on build.

#### Bootstrap

This website is designed using [Bootstrap](http://getbootstrap.com/) for responsive mobile first styling.
Currently using [Bootstrap](http://getbootstrap.com/) official [Sass port](https://github.com/twbs/bootstrap-sass), v3.3.6.

**Upgrading:**
To upgrade, `_assets/stylesheets/vendor/_bootstrap.scss` must be modified to include the `_assets/stylesheets/_bootstrap_variables.scss` override file after Bootstrap includes its own variables file.

### JavaScript

`_assets/javascripts/main.js` includes all JavaScript components and is included in `_layouts/default.html` before `</body>` with [JQuery](https://jquery.com/) hosted by [Google CDN](https://developers.google.com/speed/libraries/#jquery).

#### Bootstrap

Pre-minified [Bootstrap](http://getbootstrap.com/) placed in `_assets/javascripts/vendor/_bootstrap.min.js`.


## Favicon

See [favicon-cheat-sheet](https://github.com/audreyr/favicon-cheat-sheet).


## Downloadable files

Downloadable files should be placed in `/files`.
