# Login 2 See

![License](https://img.shields.io/badge/license-MIT-blue.svg)

### Explanation

This Extension is powered by nhanchaukp, and updated by Kvothe, but after flarum v1.0, the extension can not be used. so I upgrade it, now it can run under flarum v1.0 and v1.1.0

### About This Extension

A Flarum extension. Adds a login to see BBCODE.

Note that it only works for the main post (the start post of a discussion) because I don't think it makes sense to ask people logining to a comment post to see it's content. This BBCode will be replaced by div in comment posts.

### How to

When creating/editing a post, you can simply use the [login] BBCode to make it hidden to other users until they've replied.
```
[login]Here goes the content[/login]
```

### Installation

install manually with composer:
```
composer require nhanchaukp/login-to-see
```
Updating
```
composer update nhanchaukp/login-to-see
php flarum cache:clear
```

### Links: 
- [Packagist](https://packagist.org/packages/nhanchaukp/login-to-see)
- [GitHub](https://github.com/nhanchaukp/flarum-ext-login2see)
