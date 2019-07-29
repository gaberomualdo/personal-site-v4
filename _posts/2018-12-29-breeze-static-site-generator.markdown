---
date: 2018-12-29 12:12:12
layout: post
title: "Breeze: My Very Own Static-Site Generator"
---

Around a year ago, I started experimenting with Jekyll, a static-site generator which uses Ruby and runs seemlessly on and with GitHub Pages.

You might be wondering what a static-site generator is: it's quite simply a script or program that takes a set of site files and compiles them into a site.

For example, in Jekyll, you could say to include a file within another one; for example, the HTML file for the navbar (e.g. ```nav.html```) within your homepage (e.g. ```index.html```), where Jekyll would simply generate the resulting compiled ```index.html``` file with the contents of ```nav.html``` included.

Of course, one could argue that static-site generators are useless, as the same results can be achieved with a database, for example PHP and SQL, or Node.js and MongoDB.

However, there quite a few advantages to using static-site generators, namely that static-site generators are databaseless, making load times much faster, and the possibility of databases being hacked impossible as there is no database that can be hacked in the first place.

Anyway, I tried building my own simple static-site generator myself, in Python.

My idea was to build a tool that could run a lot like PHP; in PHP, you can simply insert a starting and closing tag within any ```.PHP``` file and execute PHP within the file.

I built something quite similar, but instead of executing PHP code within a file, it executes Python code.

And instead of using ```<?``` and ```?>``` as the starting and closing tags, my tool (called Breeze) uses ```<=``` and ```=>```, which, personally, I think looks much cooler.

In addition, my tool provides a way to have a "prerequisite" Python program for the site: a file that is run along with any executed Python code within a file, which is called ```config.py```.

Within ```config.py```, any code can be run; although I personally recommend just using the file to add any variables or functions that will be used in embedded code inside files in the site.

Anyway, I just wanted to share that with you all.

Check out breeze on GitHub [here](https://github.com/xtrp/breeze/)

Thanks for scrolling.

*- Fred Adams*