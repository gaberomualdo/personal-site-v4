# xtrp.io

## Description

[xtrp.io](https://xtrp.io/) is my personal website, where you can find my [blog](https://xtrp.io/blog/), [projects](https://xtrp.io/code/), and more. It is completely open-sourced, as this repository! xtrp.io is built with MVC architecture with PHP. It is not built with any PHP framework of any kind, and implements its own API (model), controllers, views, and routing system.

## File Structure

xtrp.io is built with MVC architecture, and has separate directories for the routers, models, controllers, and views. A detailed list of directories and main files and their usages is below:

 - ```api.xtrp.io``` &mdash; the **model** of the site. Handles communication with the "database", and returns information as JSON. It is not an official API, and is only used by the site itself.
   - ```content``` &mdash; publishable content such as blog posts, lists of projects, etc. This acts as the database for the site.
   - ```resources``` &mdash; any backend resources used by the API.
 - ```views``` &mdash; the **view** of the site, which includes frontend HTML templates to be accessed by controllers.
   - ```assets``` &mdash; the static frontend assets for the site, such as favicons, scripts, and stylesheets.
 - ```controller``` &mdash; the **controller** of the site. This includes all the controllers for each of the unique pages, such as the homepage, blog page, post pages, etc.
 - ```index.php``` &mdash; this is the entry point of the site. It calls the router, and subsequently, the controllers and views.

There are several other files within the main directory, such as ```favicon.ico``` and ```robots.txt```, but those are pretty self-explanatory.

## Languages, Technologies, and Resources Used

 - [Parsedown](https://github.com/erusev/parsedown) by erusev on GitHub. Used for parsing markdown to HTML.

## Credits

xtrp.io was built by Fred Adams. All rights are reserved, and the code and/or other files that are part of xtrp.io are explicitly copyrighted and not available for reuse, redistribution, modification, or resell.
