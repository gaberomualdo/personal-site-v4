---
date: 2018-12-11 12:12:12
layout: post
title: "I Tried Making a Chrome Extension"
---

Hey. So yesterday I wrote a post talking about some software I wrote to encode and decode text hidden inside images.

Just a day after I wrote that website/tool, I tried making a Chrome Extension, and it actually went pretty well and I'm quite proud of the final product.

So the purpose of the Chrome extension was to be able to right click on any image in page and be able to make a meme using that image.

It's called MemeMachine.

Chrome extensions are surprisingly pretty easy to make; all you need is a ```manifest.json``` file with all of your configuration and basic extension info, as well as a JavaScript file and any other files in your extension.

My extension consisted of two main files: one to be run in the background of each page, and one to be injected into each page.

The background script created an option in the context menu (menu opened on right click) to make a meme if an image what right clicked on. If that option was clicked, a message was sent to the injected script to show a modal (popup box) with the specified image URL and text boxes for the meme text.

The meme creation and downloading part was done using HTML5 Canvas, and I had to do some pretty cool workarounds to fix several annoying bugs.

For example, when downloading the meme, there was a common error in which sites prohibited CORS (Cross-Origin Resource Sharing) requests, so the photo couldn't be used in HTML5 Canvas and couldn't be downloaded. In this case I had to send a message to the background script with the image and meme text, as the background script had the correct permissions and could bypass quite a few different errors regarding security.

Overall, I learned a lot from this project about Chrome extensions in general, as well working with HTML5 Canvas and images.

You can check out MemeMachine [here](https://xtrp.github.io/MemeMachine/), or see it on GitHub [here](https://github.com/xtrp/MemeMachine).

Thanks for scrolling.

*- Fred Adams*
