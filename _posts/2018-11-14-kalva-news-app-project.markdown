---
title: "Kalva: The News Website I Made"
date: 2018-11-14 21:37
layout: post
---

Hey.

Last week I built a pretty intuitive website that I'd thought I write about on this blog.

It's called Kalva.

Kalva is a news aggregator, which means that it essentially compiles news articles from a large set of sources and displays them.

Kalva has three tabs: the top news tab, the news by source tab, and the news by topic tab.

The top news tab is the default and just shows the top latest news from all of Kalva's sources.

The news by source tab allows users to view articles from a specific source. For example, I could read all the latest articles from CNN, or conversely, I could read all the latest articles from Fox News.

The news by topic tab is pretty self-explanatory: it allows users to view articles of a specific topic, for example, I could see the latest sports news, the latest science news, the latest tech news, and so on and so forth.

I'm pretty satisfied with Kalva; I particularly like the light gray and black design with Noto Sans as the main font.

### The APIs

I don't get the news on Kalva. I mean, if I actually did, I would have to collect the latest 20 articles from 100+ sources every few minutes.

Instead, I use an API (Application Programming Interface), which allows me to fetch new articles from all of those sources as they are published.

Specifically, I use [NewsAPI](https://newsapi.org/), which is pretty great for a few reasons:

 - First, it allows CORS (Cross-origin Resource Sharing) requests, which means I can pretty easily get data from NewsAPI with client-side asynchronous (I use XHTTP) requests.
 - Second, it has tools for fetching all the different tabs. For example, if I want to fetch the top news, I just have to request ```newsapi.org/v2/top-headlines```. For the sources, I can just request ```newsapi.org/v2/everything?sources=[source]``` with [source] replaced with the source I want (e.g. ```cnn``` or ```fox-news```).
 - Last, it's really, really fast. I can get 100+ articles from NewsAPI in less than a second. And it's really reliable data. Each article has the same JSON format, with name, description, image, and url variables.

### Improvements

Overall, as I said before, I'm pretty proud of Kalva.

But of course, with everything in life, there are always improvements to be made, especially with Kalva, as I made it in such a short period of time (around a week).

Here are a few improvements and extra features I might add when (and if) I come back to this project in the future:

 - Show news articles in an iframe within the site so users can view the article within Kalva without being redirected to the actual article URL.
 - A tailored feed that shows articles that match a users preference. The feed could also use some pretty interesting Machine Learning techniques to tailor the feed based on the types of articles a user clicks on and reads for the longest.
 - A better name. Frankly, in my opinion, the name Kalva isn't very good. I need to change it.
 - News by Country. This option would be pretty intuitive: there could be a tab with news by country so that users could see the top news in any given country. For example, you could go to news in the U.S.A. and read about the midterm elections, or go to news in the U.K. and read about the Brexit negotiations.

That's all for now.

Thanks for scrolling.

Oh, and before you go, check out Kalva [here](https://xtrp.github.io/kalva/) or see it on GitHub [here](https://github.com/xtrp/kalva).

*- Fred Adams*
