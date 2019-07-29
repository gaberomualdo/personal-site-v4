---
date: 2019-03-18 12:12:12
layout: post
title: "I Tried Making a Program to Turn Photos Into Drawings"
---

A couple weeks ago I wrote a pretty simple program using HTML5 Canvas and JavaScript to turn photos into drawings.

The algorithm is quite simple, and the resulting drawings are meant to imitate impressionism, specifically that of the late 19th century, for example, Manet or Monet.

I was originally going to write a program that made drawings that were "Picasso's", where each section of color would be converted into the nearest accurate shape, for example a quadrilateral that fit the section, or a triangle.

Unfortunately, I realized that the algorithm for that would take a long time, and would significantly increase the already long load times that the algorithm took to run.

So I settled with a simple algorithm which works with a simple simulation of the "magic wand tool".

Essentially, I have a function that can take a pixel, and run the magic wand tool on it. If you don't know what the magic wand tool is, it's simply a tool that allows you to select sections of the same color from a certain pixel.

My algorithm simply selects all the sections of a photo using the magic wand tool and essentially standardizes the color there. So if it had a section of mainly red, it would make all the pixels in that section the same exact color of red.

This algorithm works surprisingly well and manages to resemble impressionism on resulting drawings.

Check out the code here: [github.com/xtrp/gh](https://github.com/xtrp/gh), or try it yourself here: [xtrp.github.io/gh/](https://xtrp.github.io/gh/).

Thanks for scrolling.

*&mdash; Fred Adams*