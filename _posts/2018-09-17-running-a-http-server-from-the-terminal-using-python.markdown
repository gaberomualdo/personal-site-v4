---
title: "Running an HTTP Server from the Terminal using Python"
date: 2018-09-17 12:12:12
layout: post
---

This is just a quick post on how to run an HTTP Server from the terminal using Python.

 - Open the Terminal or Command Line
 - Make sure you have Python and Python SimpleHTTPServer (should be installed with Python) installed
 - cd into the directory you want to start the HTTP Server from
 - Run the following command:

{% highlight bash %}
$ python -m SimpleHTTPServer 8000
{% endhighlight %}

 - This will start an HTTP Server on port 8000.
 - You can change the port by changing the number at the end of the command.
 - The HTTP Server will broadcast throughout your WiFi router, via your internal IPv4 address.
 - To get your IPv4 address, run the command ```ifconfig``` on macOS and Linux, or ```ipconfig``` on Windows, and find the value after ```inet addr:```. It should be something like ```192.168.1.50``` or ```10.55.4.47```.
 - Now, type your IPv4 address, then the port of your HTTP Server in your web browser, and it should be there! The great thing about this is that anyone on your router has access to this &mdash; do the same on any other device connected to the same WiFi, and it should be there.

That's all for this post.

Thanks for scrolling.

*- Fred Adams*
