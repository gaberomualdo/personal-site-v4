---
date: 2018-12-12 12:12:12
layout: post
title: "The Struggles of Making Your Own Web Browser"
---

Hi. So a couple weeks ago (late November) I tried building my own web browser for a semi-ish-friend (I know, just a **semi-ish**-friend) of mine using a tool built by [Atom](https://atom.io/) called [Electron](https://electronjs.org/), which allows devs to build cross-platform desktop apps using web technologies: specifically frontend technologies (HTML, CSS, JavaScript), and NodeJS for the backend, which allows you to run backend-like functions on the users machine.

Electron is built with Chromium, which is the website processing engine that powers [Google Chrome](https://chrome.google.com/), and NodeJS to interact with the file system and the machine.

When I started working on the web browser, I honestly thought that I could just work on building the UI and some cool features, but little did I know that I had some really annoying stuff ahead of me.

So for the web browser, I used the HTML ```webview``` tag to show each webpage and tab. Webviews are pretty easy to use with JavaScript, and are quite effective for the purposes of this project.

But unlike what I thought, webviews only display the website. Nothing more. I mean **nothing** more. They don't allow for links to be opened in new tabs, and they don't account for the numerous problems that I've encountered with website compatibility, for example the fact that I had to enable a bunch of web-security and node-sandbox features to get Google Drive working, and the fact that watching Netflix is near impossible without injecting a bunch of CDM scripts (yeah guys, switch to Hulu).

And even after fixing most website compatibility issues (which I haven't fully done yet in fact), there are some more things that need to be added, for example: printing a website, saving a website, saving history, saving cookies, context menus (options that show up when you right click), favicons (icon/logo that shows up on the top-left of the tab), and so much more.

In addition, Electron doesn't even have standard shortcuts like Cmd+C or Cmd+V built-in (at least with a custom menu-bar); you have to make them yourself, which is really annoying and very time consuming.

And after you've done all that, then you can start working on the UI and features for your browser.

In all, I spent literally upwards of 4 to 5 hours working on this browser, and it's not even close to finished. I still haven't fixed Netflix. Or something like 15 other really popular websites.

So in the end, I have a new level of respect and love for the Google Chrome team. Also the Safari team. And maybe even the Internet Explorer team (although I think they've been disbanded or moved because IE has been discontinued).

Anyway, I'll hopefully be releasing this web browser within the next few days, and hopefully it'll have most popular sites working, as well as a few cool features that set it apart from Chrome and other popular browsers.

Stay tuned.

Thanks for scrolling.

*- Fred Adams*
