---
title: "Terminal (Git Bash) Crash Course"
date: 2018-09-16 12:12:12
layout: post
---

## The Importance of The Terminal
The terminal or command line has been around since the start of computers; in fact, the first computers with screens were operated with just the command line and a keyboard.

For programmers, the command line allows you to quickly set up project folder structures, and use Git.

For any computer user, the command line gives you superior and ultimate control of your machine, with a wide array of commands that can execute functions that are otherwise hard to achieve in the classic GUI interface.

## Git Bash
Git Bash is a command line that is available for all platforms, and is preinstalled as the default terminal on macOS and Linux.

Git Bash is arguably the most widely used command line, which is why I'll be using it in this tutorial.

If you are a Windows user and don't have Git Bash installed, download it at [gitforwindows.org/](https://gitforwindows.org/).

## Opening up The Terminal
To open the Terminal, simply search for "Terminal" on macOS and Linux, or "Git Bash" on Windows, and open the Terminal or Git Bash application.

Upon opening the terminal, you should see a prompt for you to execute a command that might say the name of your computer, then the dollar sign ($), which indicates that you are executing commands as a regular user (not a super user).

## Some Basic Terminal Commands

### pwd &mdash; print current working directory
The ```pwd``` command simply prints out the current working directory. The current working directory is the directory that you are in the terminal. For example, you could enter your documents folder, which would make your documents folder the current working directory.

The ```pwd``` command has no extra options, and is executed by typing ```pwd```. Try it!

### cd &mdash; enter and exit directories
The ```cd``` command allows you to change your current working directory. For example, ```cd desktop``` will allow you to enter your desktop. To enter the parent directory, just type ```cd ..```. For example, if your current working directory is your desktop, you can type ```cd ..``` to go back into your home directory.

### ls &mdash; print list of files and folders in a directory
The ```ls``` command prints all of the files and folders in a directory. By itself, the ```ls``` command will just print the files and folders in the current working directory. However, if you add a directory on the end, it will print the files and folders in that directory.

For example, if you are in your home directory, ```ls Desktop``` will show all the files and folders in your desktop.

You could also execute ```ls``` by itself, which will print all the files and folders in your home directory (if you are in your home directory).

The ```ls``` command also has a few options, which include:

 - ```-l``` &mdash; adds extra information about files and folders.
 - ```-a``` &mdash; shows hidden files and folders along with regular files and folders.
 - ```-t``` &mdash; sorts files and folders by dates modified.

To use these options, simply add them onto the end of the ```ls``` command, for example ```ls -l```.

You can also use multiple options at once, ex. ```ls -l -t```, and even put them together to create a shorter command: ```ls -lt```.

### touch &mdash; create a file
The ```touch``` command simply creates a new file of the specified name in your current working directory.

For example, ```touch test.txt``` will create the file ```test.txt``` in your current working directory.

### mkdir &mdash; create a directory (folder)
The ```mkdir``` command simply creates a new directory (folder) of the specified name in your current working directory.

For example, ```mkdir myfolder``` will create the directory ```myfolder``` in your current working directory.

### rm &mdash; remove or delete file (permanently)
The ```rm``` command permanently deletes the specified file, ex. ```rm test.txt``` would remove the file ```test.txt```.

To remove directories (folders), use the ```-r``` (recursive) option &mdash; ex. ```rm -r myfolder``` will delete the directory ```myfolder```.

### nano &mdash; edit a file
The ```nano``` command allows you to edit a file in an interactive text editor within the terminal.

For example, ```nano test.txt``` will open up a text editor within the terminal, and allow you to edit the file ```test.txt```.

If the specified file in the ```nano``` command is not found, the specified file will be created, and the text editor will still open. This makes ```nano``` a really easy way to quickly create and edit a file.

Within the nano text editor, there are many different functions, which I won't specify in this tutorial. There are quite a few articles and tutorials online where you can learn how to use the nano text editor &mdash; I recommend [this article by How-To-Geek](https://www.howtogeek.com/howto/42980/the-beginners-guide-to-nano-the-linux-command-line-text-editor/).

### mv &mdash; move and rename a file
The ```mv``` command allows you to move and rename files.

First, specify the file you'd like to move, then, specify the destination, with the new name of the file at the end.

For example, if you'd like to move the file ```test.txt``` into a folder called ```myfolder```, just type ```mv test.txt myfolder/test.txt```.

As you can see, we added the name of the moved file to the end of the destination. This allows us to rename files, for example: ```mv test.txt myfile.txt``` would rename the file ```test.txt``` to the name ```myfile.txt```.

### cp &mdash; copy and rename a file.
The ```cp``` command works exactly the same as the ```mv``` command, but instead of moving the file to the destination, it copies the file and puts it in the destination.

## Recap of Commands
Here's a quick recap of all the commands you've learned in this tutorial:

 - ```pwd``` &mdash; print current working directory
 - ```cd``` &mdash; enter and exit directories
 - ```ls``` &mdash; print list of files and folders in a directory
 - ```touch``` &mdash; create a file
 - ```mkdir``` &mdash; create a directory (folder)
 - ```rm``` &mdash; remove or delete file (permanently)
 - ```nano``` &mdash; edit a file
 - ```mv``` &mdash; move and rename a file
 - ```cp``` &mdash; copy and rename a file.

Thanks for scrolling.

*- Fred Adams*
