---
title: "My Open Source Ciphers JavaScript Library"
date: 2018-11-15 16:39
layout: post
---

Hi.

Recently I built a JavaScript library called Ciphers.js, which is a library that allows developers to encrypt and decrypt text in famous ciphers.

Keep in mind that this library is not a way to safely encrypt data; it doesn't have any modern ciphers such as AES or PGP.

Ciphers.js is just meant for famous and old ciphers, such as ROT13, the Caesar Cipher, Morse Code, and more.

It's pretty easy to use, with the methods and arguments being quite self-explanatory.

You can check it out [here](https://xtrp.github.io/ciphers.js/), or you can see it on GitHub [here](https://github.com/xtrp/ciphers.js). Both the website and GitHub page have instructions and demos on how to use the library.

Along with Ciphers.js, I also built a website which implements all of the ciphers in Ciphers.js called SkyeCrypt.

SkyeCrypt uses just ciphers.js to encode and decode text. You can check out SkyeCrypt [here](https://xtrp.github.io/skyecrypt/), or you can see the code on GitHub [here](https://github.com/xtrp/skyecrypt).

In the future, I might make another JavaScript library with my own implementations of modern cryptographic encodings such as AES and SHA256. Keep in mind that when (and if) I do, I recommend not to use it in an actual site if security is a priority, because there could be bugs in the implementation, and I will not be liable for any damages caused by those possible bugs.

That's all for now.

Thanks for scrolling.

*- Fred Adams*
