# [Start the Blog]

The Blog is a website created by Nicolas Emeriau. This website contains a responsive portfolio grid with hover effects, full page portfolio item modals, a working PHP contact form and a blog.

## Getting Started

To begin using this blog, follow this to get started:
* Clone the repo: 
```sh
`git clone git@github.com:NICOLASEMERIAU/blog.git`
```
* Install docker environment, make sure to have updated version of docker and docker-compose.
* Go to the folder "blog" and open a terminal
```sh
docker compose build --no-cache
```
```sh
docker compose up -d
```

* Configure your mail parameters in the file project/mail/contact_me.php

* Check your database http://127.0.0.1:8080/index.php?route=/
* Write this : Id = root and Password empty
* Import blog.sql
* Let's go to http://localhost:8741/

## Bugs and Issues

Have a bug or an issue with this blog? [Open a new issue](https://github.com/NICOLASEMERIAU/blog/issues/new) here on GitHub.

## Creator

The Blog was created by and is maintained by Nicolas Emeriau.

* https://github.com/NICOLASEMERIAU

The Blog is based on the [Bootstrap](http://getbootstrap.com/) framework created by [Mark Otto](https://twitter.com/mdo) and [Jacob Thorton](https://twitter.com/fat).

## Copyright

Copyright 2024 Toolsvet
