---
date: 2018-12-10 12:12:12
layout: post
title: "I Made an Open Source Steganography Tool"
---

Hi! I haven't written here in a while, mainly because I haven't been working on any public projects in GitHub in a few weeks &mdash; I've been working on some private ones which have taken up most of my time.

Luckily, I am back working on public projects and writing on this blog as normal.

Just a few days ago, I finished an open source project called Arjun-April Steganography, which is an online tool that uses a simple steganography technique to encode and decode text in images.

If you don't know what steganography is, it's essentially cryptography but for images. Cryptography is hiding and encoding text inside other text, whereas steganography is hiding and encoding text inside images.

So for example, a practical use of steganography could be where a movie producer encodes a persons name into an entire movie before sending it to the person, so that if a copy of the movie is leaked, the movie producer could just decode the movie clip to see who leaked the movie.

Of course the more fun use of steganography is sending encoded and secret messages via plain images.

Arjun-April Steganography is simply a steganography algorithm &mdash; a way to encode text inside an image without being noticed.

The algorithm is quite simple: for each pixel, it encodes a number within the last digit of each RGB value in base 6.

So if you wanted to encode the number 15 in the color rgb(125, 86, 45), you would first convert 15 to base 6 (23), then put 23 into the last digit of each RGB value like this: rgb(12**0**, 8**2**, 4**3**).

Decoding is again quite simple &mdash; all you have to do is get the last digit of each RGB value and then put them together for each pixel and convert from base 6 to base 10.

But still, here we are just encoding numbers into pixels, but how do we encode text into pixels?

Well text is simply a set of characters, so I opted with using ASCII encoding, which assigns a number to each unique character. Luckily, ASCII encoding only goes up to 95 characters, so I was able to fit every character inside a three digit base 6 number (because base 6 in 3 RGB values).

So I simply wrote all of this in code using HTML5 Canvas and a few file upload scripts that I was able to make via some Stack Overflow research, and it was done!

Check out the code [here](https://github.com/xtrp/Arjun-April-Steganography), or use it [here](https://xtrp.github.io/Arjun-April-Steganography/).

Oh, and as for the name, it's named after a few friends of mine who inspired me to build this pretty amazing piece of software.

Thanks for scrolling.

*- Fred Adams*
