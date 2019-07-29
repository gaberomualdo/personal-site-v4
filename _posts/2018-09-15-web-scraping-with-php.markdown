---
title: "Web Scraping with PHP"
date: 2018-09-15 12:12:12
layout: post
---

## What is Web Scraping?
Web scraping is where you scrape or get code from a website and parse it to put it in your own code.

Web scraping is commonly used in APIs, and websites that need to use data from external sources.

## Using PHP
If you haven't used PHP before, download PHP and Apache before reading the rest of this post.

## Web Scraping in PHP
In this tutorial, I'll teach you how to do some simple web scraping using PHP.

We'll use PHP to get any Github users pinned repositories without using any external APIs.

### Setting up Our Project Folder
{% highlight bash %}
$ mkdir pinnedreposcraper
$ cd pinnedreposcraper
$ touch index.php
{% endhighlight %}

### Getting Simple_HTML_DOM.php
In this tutorial, we'll be using a PHP library called Simple HTML DOM to send HTTP requests to websites and parse their code.

First, download the Simple_HTML_DOM.php here: [sourceforge.net/projects/simplehtmldom/](http://sourceforge.net/projects/simplehtmldom/).

Move the ```Simple_HTML_DOM.php``` file into the project folder.

### Using Simple HTML DOM in our PHP File
First, we'll require the ```Simple_HTML_DOM.php``` file in our ```index.php``` file.

{% highlight php %}
<?php

require("simple_html_dom.php");

?>
{% endhighlight %}

### Getting the Page of the Specified Github User

Then, we'll make a variable for the Github username we want to get the pinned repositories of, and get the code for their Github page using Simple HTML DOM's ```file_get_html``` function.

{% highlight php %}
<?php

require("simple_html_dom.php");

$gh_username = "xtrp";
$gh_page = file_get_html('https://github.com/' . $gh_username);

?>
{% endhighlight %}

### Getting the Pinned Repositories and Parsing Them

Next, we'll make an array for the users pinned repositories, and loop through the HTML list for the pinned repositories on their Github page.

{% highlight php %}
<?php

require("simple_html_dom.php");

$gh_username = "xtrp";
$gh_page = file_get_html('https://github.com/' . $gh_username);

$pinned_repos = [];
foreach ($gh_page->find('ol.js-pinned-repos-reorder-list li') as $repo) {
	$reponame = $repo->find('span a', 0)->plaintext;
	$repodescription = $repo->find("p.pinned-repo-desc", 0)->plaintext;
	$repolink = "https://github.com" . $repo->find('span a', 0)->getAttribute("href");
	$pinned_repos[] = [
		"name" => $reponame,
		"description" => $repodescription,
		"link" => $repolink
	];
}

?>
{% endhighlight %}

Here, we are using a PHP ```foreach``` statement to loop through the HTML list of pinned repositories, which we got by using the Simple HTML DOM ```find``` function, which allows us to get the HTML of any element using its CSS selector.

Next, we got the name, link, and description of each pinned repository, and added them to the array of pinned repositories.

Now that we have all of the pinned repositories in an organized list, we can use the data for whatever purposes we'd like.

### Example Use
Here, I've simply used the PHP ```echo``` command to show each pinned repository in a readable format:

{% highlight php %}
<?php

foreach ($pinned_repos as $repo) {
	echo "<a href='" . $repo["link"] . "'>" . $repo["name"] . "</a>";
	echo "<p>" . $repo["description"] . "</p><br>";
}

?>
{% endhighlight %}

### The Full Code
For those who want it, here is the full code of the ```index.php``` file (with the example use):
{% highlight php %}
<?php

require("simple_html_dom.php");

$gh_username = "xtrp";
$gh_page = file_get_html('https://github.com/' . $gh_username);

$pinned_repos = [];
foreach ($gh_page->find('ol.js-pinned-repos-reorder-list li') as $repo) {
	$reponame = $repo->find('span a', 0)->plaintext;
	$repodescription = $repo->find("p.pinned-repo-desc", 0)->plaintext;
	$repolink = "https://github.com" . $repo->find('span a', 0)->getAttribute("href");
	$pinned_repos[] = [
		"name" => $reponame,
		"description" => $repodescription,
		"link" => $repolink
	];
}

foreach ($pinned_repos as $repo) {
	echo "<a href='" . $repo["link"] . "'>" . $repo["name"] . "</a>";
	echo "<p>" . $repo["description"] . "</p><br>";
}

?>
{% endhighlight %}

Thanks for scrolling.

*- Fred Adams*
