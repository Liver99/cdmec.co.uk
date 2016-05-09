# Chingford & District Model Engineering Club Website

This directory contains the code for the Chingford & District Model Engineering Club website  [http://cdmec.co.uk](http://cdmec.co.uk)

## Build Instructions

This website is built with [Jekyll](http://jekyllrb.com/)

Assets managed using [jekyll-assets](https://jekyll.github.io/jekyll-assets/)

## Usage

Run local server by running
```
jekyll serve
```

## Deployment

Currently done via FTP with the clubs shared web host. Run

```
jekyll build
```

to generate the site, then copy the contents from `_site/` to the `public_html/` root directory
