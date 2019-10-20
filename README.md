# xtrp.io

## Description

[xtrp.io](https://xtrp.io/) is my personal website, where you can find my [blog](https://xtrp.io/blog/), [projects](https://xtrp.io/code/), and more. It is completely open-sourced, as this repository! xtrp.io is built with MVC architecture with PHP. It is not built with any PHP framework of any kind, and implements its own API (model), controllers, views, and routing system.

![Site Demo GIF](site_demo.gif)

## Pages

The site includes five main pages, which are:

 - [Home](https://xtrp.io/) &mdash; the homepage of the site, which includes latest blog posts and coding projects
 - [About](https://xtrp.io/about/) &mdash; a detailed about page with my history and experience
 - [Blog](https://xtrp.io/blog/) &mdash; my blog! I post on here every so often
 - [Code](https://xtrp.io/code/) &mdash; my latest coding projects
 - [Résumé](https://xtrp.io/resume/) &mdash; what I've done, what I know, and what I offeR

## File Structure

xtrp.io is built with MVC architecture, and has separate directories for the routers, models, controllers, and views. A detailed list of directories and main files and their usages is below:

 - ```api``` &mdash; the **model** of the site. Handles communication with the "database", and returns information as JSON.
   - ```content``` &mdash; publishable content such as blog posts, lists of projects, etc. This acts as the database for the site.
   - ```resources``` &mdash; any backend resources used by the API.
 - ```views``` &mdash; the **view** of the site, which includes frontend HTML templates to be accessed by controllers.
   - ```assets``` &mdash; the static frontend assets for the site, such as favicons, scripts, and stylesheets.
   - ```resources``` &mdash; any frontend resources used by views, for example, Modernizr.js or a CSS plugin.
 - ```controller``` &mdash; the **controller** of the site. This includes all the controllers for each of the unique pages, such as the homepage, blog page, post pages, etc.
 - ```index.php``` &mdash; this is the entry point of the site. It calls the router, and subsequently, the controllers and views.

There are several other files within the main directory, such as ```favicon.ico``` and ```robots.txt```, but those are pretty self-explanatory.

Note that the ```api/content``` directory is not included publicly, as content is edited on the web server and site directly.

## Built in HTML, CSS, JavaScript, and PHP

xtrp.io is built with HTML, CSS, vanilla JavaScript, and plain PHP, with an MVC framework I built myself (great learning experience by the way). The code is heavily commented, and this repo is completely in sync with the site. **The code on this repo is the code on the site, live, and realtime.**

## Resources Used

 - [Parsedown](https://github.com/erusev/parsedown) and [ParsedownExtra](https://github.com/erusev/parsedown-extra) by erusev on GitHub. Used for parsing markdown to HTML.
 - [PrismJS](https://prismjs.com/) by [many open source contributors](https://github.com/PrismJS/prism/graphs/contributors) on GitHub. Used for syntax highlighting on blog posts.
 - [Normalize.css](https://necolas.github.io/normalize.css/) by necolas on GitHub. Used for fast and responsive CSS resets.
 - [Skeleton](http://getskeleton.com) by dhg on GitHub. Used as a CSS boilerplate file for the site.
 - [Animate.css](https://daneden.github.io/animate.css/) by daneden on GitHub. Used for easy CSS animations.

## Credits

xtrp.io was built by Fred Adams. All rights are reserved, and the code and/or other files that are part of xtrp.io are explicitly copyrighted and not available for reuse, redistribution, modification, or resell.
