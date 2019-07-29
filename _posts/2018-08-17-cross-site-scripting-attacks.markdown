---
title: "Cross Site Scripting (XSS) Attacks"
date: 2018-08-17 12:12:12
layout: post
---

Cross Site Scripting, or XSS attacks are a very common type of attack hackers can use to inject code on to your website, if you don't have the proper protection.

XSS attacks are extremely common. In fact, according to High-Tech Bridge, a web security company, Cross Site Scripting attacks account for around 80% of all website security flaws.

### What is XSS?

XSS is a technique hackers use to inject code into your website &mdash; similar to SQL Injections.

XSS takes advantage of the JavaScript ```.innerHTML``` and jQuery ```.html()``` properties.

Consider the following situation:

You maintain a video sharing website, where on each video, there is a comments section, where a user can post a comment.

When the website is loaded, each comment is put on the page using the following code:

{% highlight javascript %}
comments.forEach(function(comment) {
  commentSectionElement.innerHTML += comment;
});
{% endhighlight %}

Here, for each comment, the comment is added to the HTML of the comments section.

Note that we are using the JavaScript ```.innerHTML``` property to do this.

This code should be fine for regular users and comments, but hackers can take advantage of the fact that we are using the JavaScript ```.innerHTML``` property, because they can post a comment with code inside of it, and since the ```.innerHTML``` property updates the HTML (code) of an element, the comment will be run as code.

For example, hackers can post the comment "```<script>alert('XSS!')</script>```",  will just alert the message "XSS!" to any user that views the comment.

That's not very malicious, but imagine a much worse case, where the hacker posts a comment on a popular video that steals the users usernames and passwords and sends them to the hackers database.

Now you're in big trouble. Millions of users that viewed that video would have their authentication info stolen.

### How to protect your website from XSS attacks

The easiest way to protect your website from XSS attacks is to use the JavaScript ```.innerText``` or ```.textContent``` properties, or the jQuery option, ```.text()```.

These just change the text of an HTML element &mdash; they don't change the code.

For example, if we used the ```.innerText``` property in our comments section code, when the hacker tried to post the malicious comment, and the comment would just show the code itself, not run it. Instead of showing a blank comment, it would display the code.

### Recap

- Cross Site Scripting (XSS) attacks are where a hacker injects HTML into your site
- XSS attacks take advantage of the ```.innerHTML``` and ```.html()``` properties
- To prevent XSS attacks, use ```.innerText``` or ```.text()```

Thanks for scrolling.

*- Fred Adams*
