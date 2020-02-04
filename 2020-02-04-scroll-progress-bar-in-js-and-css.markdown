"title": "Create a Scroll Reading Progress Bar for Your Blog in JavaScript and CSS",
"last_updated": "2020-02-05",
"filename": "scroll-progress-bar-in-js-and-css",
"preview_text": "I just recently added a fun little feature on my website at xtrp.io: a progress bar when reading blog posts. The bar would show how far users have progressed in reading a post, from 0% at the beginning to when a user finishes reading at 100%. This little feature has become particularly popular among other blogs and Wordpress themes in recent years. For example, the popular tech publication TechCrunch uses a circular scroll progress bar, and many other sites have a similar feature. In fact, if you're reading this on xtrp.io (and you're on desktop), then you may be able to see this feature on the top of your screen!",

"photo_url": "/api/content/static_files/scroll-progress-bar-in-js-and-css/photo.jpg",
"thumbnail_url": "/api/content/static_files/scroll-progress-bar-in-js-and-css/thumbnail.jpg",
"thumbnail_small_url": "/api/content/static_files/scroll-progress-bar-in-js-and-css/thumbnail_small.jpg"
===

I just recently added a fun little feature on my website at [xtrp.io](https://xtrp.io/): a progress bar when reading blog posts. The bar would show how far users have progressed in reading a post, from 0% at the beginning to when a user finishes reading at 100%.

This little feature has become particularly popular among other blogs and Wordpress themes in recent years. For example, the popular tech publication [TechCrunch](https://techcrunch.com/) uses a circular scroll progress bar, and many other sites have a similar feature. In fact, if you're reading this on [xtrp.io](https://xtrp.io/) (and you're on desktop), then you may be able to see this feature on the top of your screen!

Below is a quick tutorial and explanation of a horizontal scroll progress bar with a demo on CodePen.

## Live Demo and Final CodePen

Before we start, here is a link to the [final CodePen](https://codepen.io/xtrp/pen/mdyYRQz), and again, a [live demo](https://xtrp.io/blog/2020/01/29/scroll-progress-bar-blog/) can be seen on my personal website, if you are on desktop.

## Writing the HTML &amp; CSS

To start off, let's create a post container `div`, which will include the HTML contents of the blog post that your viewers will be reading. Within that `div`, we'll also include a progress bar element for the scroll progress bar.

```html
<div class="post_container"></div>
```

At the beginning of the post container element, let's add the progress bar HTML, which will look like this:

```html
<div class="post-container">
	<div class="progress-bar-container">
		<div class="progress-bar-container__progress"></div>
	</div>
</div>
```

Note that in this post, I'll be using the BEM Methadology for CSS classnames. You can read more about the BEM Methadology and what it is here: [How I Moved a Step Closer to Clean CSS and How You Can Too (with the BEM Methodology)](https://xtrp.io/blog/2019/12/04/bem-methodology-tutorial/).

The general idea here is to have the progress bar container fixed at the top of the post container, with a full width. Within that container, the actual progress bar can be resized to the correct width with JavaScript.

![Progress Bar and Container Visual](/api/content/static_files/scroll-progress-bar-in-js-and-css/progressbar_boxmodel_visual.jpg)

Here is the basic CSS for this:

```css
/* default CSS variables */
:root {
	--progress-color: #2ecc71;
	--progress-height: .5rem;
}

/* post container */
.post-container {
	overflow: scroll;
}

/* progress bar container */
.progress-bar-container {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: var(--progress-height);
}

/* progress bar */
.progress-bar-container > .progress {
	height: var(--progress-height);
	background-color: var(--progress-color);
	width: 0%;
	float: left;
}
```

Note that in this case, the CSS assumes that the `.post-container` element is the scrollable area in this case (as defined with the `overflow: scroll` line), but you can change this to be a different element or the `body` element yourself if you'd like. 

I'm also using CSS variables for the progress bar height and color, so that it is easier to change the properties of the progress bar if you'd like. You can read more about CSS variables and what they are here: [CSS Variables Explained in 2 Minutes with an Interactive Demo](https://xtrp.io/blog/2020/01/27/css-variables-explained-with-demo/).

Here's what this looks like when I set the width to 50% for example (with example content in the post container):

![50% Scroll Progress Bar Width Example](/api/content/static_files/scroll-progress-bar-in-js-and-css/progressbar_width_example.jpg)

## Let's Write the JavaScript for this!

For the JavaScript, I'll start by defining variables for each of the relevant HTML elements:

```javascript
// variables for progress bar and post container elements
const progressContainerEl = document.querySelector(".post-container");
const progressBarEl = document.querySelector(".progress-bar-container__progress");
```

### Creating a Function to Update the Progress Bar Width

Let's create a function which checks the current scroll position and calculates the percentage of the post read, and then set the progress bar width accordingly.

To make the scroll percentage calculation, let's divide the current scroll position (from the `scrollTop` property) by the full scroll height of the element (calculated with a function I got from Stack Overflow).

I then set the width style of the progress bar element to that calculated percentage.

Here's the code for that:

```javascript
// function to check scroll position and update scroll progress bar accordingly
const updateScrollProgressBar = () => {
	// get full scroll height
	const scrollHeight = progressContainerEl.scrollHeight - heightInViewport(progressContainerEl);
	console.log(scrollHeight);
	// get current scroll position
	const scrollPosition = progressContainerEl.scrollTop;

	// get scroll percentage and set width of progress bar
	const scrollPercentage = (scrollPosition / scrollHeight) * 100;
	progressBarEl.style.width = scrollPercentage + "%";
}

// function to get visible height in viewport
// some code taken from user Roko C. Buljan on https://stackoverflow.com/questions/24768795/get-the-visible-height-of-a-div-with-jquery
function heightInViewport(el) {
    var elH = el.offsetHeight,
        H   = document.body.offsetHeight,
        r   = el.getBoundingClientRect(), t=r.top, b=r.bottom;
    return Math.max(0, t>0? Math.min(elH, H-t) : Math.min(b, H));
}
```

### Calling the Function While Scrolling

To put all of this together and make everything work, we'll need to call the function everytime a user scrolls and when the page is loaded. For that, it's possible bind the function to the `onscroll` event of the post container, and the `onload` event of the window.

```javascript
// bind window onload and onscroll events to update scroll progress bar width
progressContainerEl.addEventListener("scroll", updateScrollProgressBar)
progressContainerEl.addEventListener("load", updateScrollProgressBar)
```

## We're Done!

And with that, we're finished. Here is the [final CodePen](https://codepen.io/xtrp/pen/mdyYRQz):

<p class="codepen" data-height="386" data-theme-id="default" data-default-tab="result" data-user="xtrp" data-slug-hash="mdyYRQz" style="height: 386px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;" data-pen-title="Scroll Progress Bar Demo">
  <span>See the Pen <a href="https://codepen.io/xtrp/pen/mdyYRQz">
  Scroll Progress Bar Demo</a> by Fred Adams (<a href="https://codepen.io/xtrp">@xtrp</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://static.codepen.io/assets/embed/ei.js"></script>

I hope you liked this post, and found this to be useful.

Thanks for scrolling.

&mdash; Fred Adams, January 5, 2020