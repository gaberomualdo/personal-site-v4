---
title: "Running an HTTP Server from Your Phone"
date: 2018-09-20 12:12:12
layout: post
---

A few days ago, I published a post showing how to run an HTTP Server from the terminal using a simple Python command.

For me, I use HTTP Servers because the website is broadcasted throughout the entire WiFi you are on, which makes it great to show a website to just people on your WiFi network.

Because of this, I needed to run the HTTP Server at all times.

I could run it on my computer and leave my computer on at all times, but that would be hard, so I decided to run it from my phone.

In this post, I'll be explaining how I ran the HTTP Server from my phone.

Note that this post is for **Android phones only**, and will not work on iOS as it is not a Linux based operating system.

## 1. Download Termux
Go to the Google Play store and download the app called Termux. Termux will allow us to run the terminal on our phone.

## 2. Download Python
Execute the following command in Termux:

{% highlight bash %}
$ pkg install python
{% endhighlight %}

This will install Python, and allow you to use Python to setup an HTTP Server.

## 3. Getting Your Project
Before you start the HTTP Server, you need to get the code of the website you want to run the HTTP Server.

For example, I wanted to run an HTTP Server with a chat website. First, I coded the chat website and put it on my Github.

Then I ran the command ```pkg install git``` to install Git.

After that, I ran the command ```git clone https://github.com/username/project``` to clone the project I wanted, and put it on my phone.

## 4. Start the HTTP Server
Now that you've installed Python and downloaded your code, you can run the HTTP Server:

{% highlight bash %}
$ python -m http.server 8000
{% endhighlight %}

If you'd like more information about what this does, check out [this post I wrote about HTTP Servers in Python]({{ site.baseurl }}/2018/09/17/running-a-http-server-from-the-terminal-using-python/).

## You're Done!

Thanks for scrolling.

*- Fred Adams*
