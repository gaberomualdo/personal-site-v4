---
date: 2018-12-31 12:12:12
layout: post
title: "20 GitHub Projects I've Worked on This Year"
---

Hi! So as you all know, today is the last day of 2018.

I thought this would be a good time to look back at all of the coding projects I've worked on this year in 2018.

So I've compiled a list of 20 projects I've worked on this year in a rewind type format, starting with February 2018, and ending of course in December 2018.

If you'd like to see all of my public GitHub projects, check out my [GitHub Profile](https://github.com/xtrp), or see the [Project Page](https://xtrp.github.io/code/) on my personal website.

Before I start, here are just a few cool statistics from my GitHub this year:

 - 1359 total contributions in 2018
 - 53 (4 in an organization) total public repositories (projects) created in 2018
 - 62 total private respositories (projects) created in 2018
 - 1 organization created in 2018

Anyway, here are 20 projects I've worked in the past year:

Oh, and keep in mind that this is from the ```xtrp``` GitHub account, which was created on February 27, 2018 (I previously had a different account on GitHub).

## Late February 2018: Hex RGB Creator

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/hrc.png)

[Website](https://xtrp.github.io/Hex-RGB-Creator/) &nbsp; [GitHub](https://github.com/xtrp/Hex-RGB-Creator)

Hex RGB Creator is a simple web app that allows you to play around with Hex and RGB colors.

On the site, there are 3 sliders refering to the red, green, and blue brightnesses of the resulting mixed color.

So for example, if you slide the red slider to the end and the green and blue sliders to 0, the resulting color would be a bright red.

The great thing about this site is that after you've moved the sliders, you can see the resulting mixed color, and the Hex and RGB representations of that color.

It makes it easy to copy those color formats and use them in your own site.

So let's say your making a social media app that has a blue "Follow" button: you could go on Hex RGB Creator and move the sliders until you find a good blue color, and then just copy the Hex format and paste it into your code for the app.

## Early March 2018: Imagedit

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/imagedit.png)

[Website](https://xtrp.github.io/Imagedit/) &nbsp; [GitHub](https://github.com/xtrp/Imagedit)

Imagedit is a simple web app that uses CSS filters to edit an image.

First, just paste the URL to the image you'd like to edit, and then you can see an interactive image filter editor.

You can change the brightness of the image, the contrast, and you can even blur to the image. The best filter in my opinion though is the "Color Wheel Rotate" filter, which lets you change the tint of the image. For example, if you had an image of a persons face, you could make that face look blue or green.

## Early April 2018: Textdump and Skyewire

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/skyewire.png)

[Website](https://xtrp.github.io/skyewire/) &nbsp; [GitHub](https://github.com/xtrp/skyewire)

Textdump and Skyewire are two websites I made that have the same exact functionality, but Skyewire has a more modern and responsive design that works with mobile.

Skyewire and Textdump are websites that allow you to send text to another person via a simple pin.

So for example, if you want to send a long link to a set of 20 people, you could simply put it into Skyewire or Textdump, and Skyewire or Textdump would give a pin to send that refers to the text you entered. You could tell that pin to the 20 people, and they could put it into Skyewire and receive the text you sent.

Skyewire is quite useful: I've used it numerous times for a variety of different things.

## Mid-April 2018: Volcano.js

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/volcano.png)

[Website](https://xtrp.github.io/volcano.js/) &nbsp; [GitHub](https://github.com/xtrp/volcano.js)

Volcano.js is a simple JavaScript library that allows you to embed and execute JavaScript code within HTML.

Within HTML, JavaScript is embedded within a pair of curly brackets that are preceded by an asterisk, like this: ```*{JAVASCRIPT CODE HERE}```

The embedded JavaScript code is executed and replaced inside the HTML. So for example, if you put the code:

{% highlight html %}
<h1>*{"Hello" + " " + "World!"}</h1>
{% endhighlight %}

It would turn into:

{% highlight html %}
<h1>Hello World!</h1>
{% endhighlight %}

For more complex JavaScript code, a return statement is needed; specifically, if the code isn't a simple variable or operation.

For example, let's say you want to make a copyright statement with the current year in it without having to update the code manually every year:

{% highlight html %}
<p>&copy; *{ dateObj = new Date(); return d.getFullYear(); }</p>
{% endhighlight %}

## Mid-June 2018: HTML5 Rocket Templates and Website

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/html5rocket.png)

[Website](https://html5rocket.github.io/) &nbsp; [GitHub](https://github.com/html5rocket)

Inspired by [HTML5 UP](http://html5up.com), I made a GitHub organization which makes responsive HTML5 website templates called [HTML5 Rocket](html5rocket.github.io).

HTML5 Rocket has, at this time, 3 templates, which can all be previewed and downloaded at the [HTML5 Rocket Website](https://html5rocket.github.io/).

Although HTML5 UP has much more templates than HTML5 Rocket, there is one big difference: HTML5 UP requires attribution for their design, whereas HTML5 Rocket templates are completely free and do not require attribution as they are CC0 Licensed.

So for example, if you are making a professional company website, if you used HTML5 UP, you would have to keep a notice on the footer that says "Design by HTML5 UP" or "Made by HTML5 UP", whereas, if you used HTML5 Rocket, you have all the rights and can do whatever you want with the templates.

## Early July 2018: Cobalt Jekyll Theme

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/cobalt.png)

[Website](https://xtrp.github.io/cobalt-jekyll-theme/) &nbsp; [GitHub](https://github.com/xtrp/cobalt-jekyll-theme)

At the time, I had been using Jekyll (a static-site generator that allows you to easily build blogs and other sites) and Jekyll Themes (prebuilt Jekyll sites that act as templates that you can edit) for a while, for my personal website and blog (this site!) and other projects.

I had always been using themes built by the community, and I felt comfortable with Jekyll as a whole, so I decided to try and make my own Jekyll Theme.

I called it Cobalt. The theme is extremely simple: with the name and description of the blog at the top, and then a timeline of posts with the post title, publish date, approximate read time, and a short preview of the post.

Cobalt is good for a minimalistic yet modern style blog in my opinion.

## Mid and Late July: Capitol Net

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/capitolnet.png)

[Website](https://xtrp.github.io/capitolnet/) &nbsp; [GitHub](https://github.com/xtrp/capitolnet)

Capitol Net is probably the biggest project I had worked on at this time.

Capitol Net is a simple site which focuses on anything and everything about United States politics.

On Capitol Net, you can read the latest and breaking politics news, you can view a list of federal committees from both the Senate and House, and you can view an index of politicians and legislators in Capitol Hill &mdash; Senators, Congressmen and Women, and of course, the President and Vice-President.

## Early August: InstCode

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/instcode.png)

[Website](https://xtrp.github.io/instcode/) &nbsp; [GitHub](https://github.com/xtrp/instcode)

InstCode is a simple site with coding challenges and problems, in JavaScript.

There are 3 difficulties, and at the moment, there are 5 problems for each difficulty, although in the near future I may add more.

InstCode was inspired by [CodeSignal](https://codesignal.com/), and is, in my opinion, a great way to learn and improve on your JavaScript skills.

## Mid-August: Blaze

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/blaze.png)

[Website](https://xtrp.github.io/blaze/) &nbsp; [GitHub](https://github.com/xtrp/blaze)

Blaze is a simple to-do list web app, with a "todo meter" that tracks the progress of how many to-do list items you've completed.

It's pretty cool in my opinion, and I built it in one day.

## Late August: Capitol Quiz

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/capitolquiz.png)

[Website](https://xtrp.github.io/capitolquiz/) &nbsp; [GitHub](https://github.com/xtrp/capitolquiz)

Capitol Quiz is a simple quiz inspired by the [16 Personalities MBTI Test](https://16personalities.com/) which is essentially just a personality test but for your political views.

Capitol Quiz tests 4 political values: Social (Progressive or Traditional), Economic (Regulation or Freedom), Foreign (Interventionist or Isolationist), and Party (Democratic or Republican).

These 4 values form your political personality.

Capitol Quiz is simply a set of 40 or so statements that are judged by the test taker in terms of how much the test taker agrees or disagrees with the statement.

Capitol Quiz has an algorithm that takes the judgements and processes them into the 4 political values, which then create the test takers full political personality.

## Early September: GitHub Pinned Repo Scraper

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/gh-scraper.png)

[GitHub](https://github.com/xtrp/github-pinned-repo-scraper)

GitHub Pinned Repo Scraper is a simple web scraper written in PHP which gets a list of pinned repositories for any given GitHub user.

It's quite simple, and it was mainly a project that I made to learn a bit more about PHP and web scraping in general.

## Mid-September: Emily

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/emily.png)

[Website](https://xtrp.github.io/Emily/) &nbsp; [GitHub](https://github.com/xtrp/Emily)

Emily was my attempt at building an AI algorithm to play 2048.

Frankly, it's not very good, and I might work on a better algorithm in the near future.

## Late October: String Replace

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/stringreplace.png)

[GitHub](https://github.com/xtrp/string_replace)

String Replace is a simple Chrome extension I built that replaces a string with another in every website you visit.

For example, you replace the word "the" with the word "test", and every single site you visit would be changed with all of the "the"'s changed to "test".

## Early November: Kalva

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/kalva.png)

[Website](https://xtrp.github.io/kalva/) &nbsp; [GitHub](https://github.com/xtrp/kalva)

Kalva is a simple news site that uses [NewsAPI](http://newsapi.org/).

Kalva allows you to see the top headlines and breaking news, as well as latest news from over 100 sources.

You can see news from only one source, and you can see news for a certain topic.

You can also search all news.

## Early and Mid November: Ciphers.js

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/ciphers.png)

[Website](https://xtrp.github.io/ciphers.js/) &nbsp; [GitHub](https://github.com/xtrp/ciphers.js)

Ciphers.js is a simple JavaScript library which allows you to encrypt and decrypt numerous famous ciphers, such as the Caesar Cipher, ROT13, Morse Code, and more.

Ciphers.js is pretty cool and is quite easy to use.

## Mid and Late November: SkyeCrypt

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/skyecrypt.png)

[Website](https://xtrp.github.io/skyecrypt/) &nbsp; [GitHub](https://github.com/xtrp/skyecrypt)

SkyeCrypt is essentially an interactive website version of Ciphers.js.

SkyeCrypt gives users a modern and simple interface for encoding and decoding in any cipher supported by Ciphers.js.

## Early December: Arjun-April Steganography

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/steg.png)

[Website](https://xtrp.github.io/Arjun-April-Steganography/) &nbsp; [GitHub](https://github.com/xtrp/Arjun-April-Steganography)

Arjun-April Steganography is a tool that allows you to hide text inside images.

The algorithm hides the text within slight color changes in the pixels in the image, with each pixel corresponding to a different character, and the charactor code hidden within the last digit of each RGB value in the color of each pixel.

Arjun-April Steganography is great for hiding text and watermarking images without a actual obvious watermark.

## Also Early December: MemeMachine

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/mememachine.png)

[Website](https://xtrp.github.io/MemeMachine/) &nbsp; [GitHub](https://github.com/xtrp/MemeMachine)

MemeMachine is a simple Chrome Extension I built that allows you to right click on any image on any site and make a meme out of that image and download it.

It was a pretty cool project that helped me learn more about HTML5 Canvas and image manipulation.

## Mid December: April

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/april.png)

[Website](https://xtrp.github.io/april/) &nbsp; [GitHub](https://github.com/xtrp/april)

April is an minimal yet effective homework organizer tool which allows you to add assignments and subjects, and sort tasks by due date or subject.

Although the design isn't as good as it could be, it works well and is useful for students.

## Late December: Breeze

![Project Preview](https://xtrp.github.io/blogstatic/2018-12-31/breeze.png)

[GitHub](https://github.com/xtrp/breeze)

Breeze is a static-site generator built in Python. It's a lot like Volcano.js, except it's written in Python, and the code is compiled in the server rather than the client.

I recommend checking out [Breeze on GitHub](https://github.com/xtrp/breeze) as it's an interesting project and is very useful in my opinion.

## That's it!

Those are my 20 most notable projects in 2018, in rewind format.

Of course these are not the only major projects I've worked on this year &mdash; in fact, I've made more than 40 projects in 2018.

If you'd like to see the 25 or so other projects I've made, check out [my GitHub](https://github.com/xtrp), or see the [Projects Page](https://xtrp.github.io/projects).

Anyway, thanks for scrolling and have a happy new year!

*- Fred Adams*
