---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---

# Info

Welcome to the generated API reference.

# Available routes
## This is the short description

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://localhost/api/withPagination/posts" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/withPagination/posts",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

    > Example response:

    ```json
    {
    "pagination": {
        "total": 202,
        "per_page": 5,
        "current_page": 1,
        "last_page": 41,
        "from": 1,
        "to": 5
    },
    "data": {
        "total": 202,
        "per_page": 5,
        "current_page": 1,
        "last_page": 41,
        "next_page_url": "http:\/\/localhostapi\/withPagination\/posts?page=2",
        "prev_page_url": null,
        "from": 1,
        "to": 5,
        "data": [
            {
                "id": 202,
                "title": "# Dili\r",
                "article": "# Dili\r\n\r\n>Simple Accountless **Markup Blog**\r\n\r\nDillinger is a cloud-enabled, mobile-ready, offline-storage, AngularJS powered HTML5 Markdown editor.\r\n\r\n  - Type some Markdown on the left\r\n  - See HTML in the right\r\n  - Magic\r\n\r\nMarkdown is a lightweight markup language based on the formatting conventions that people naturally use in email.  As [John Gruber] writes on the [Markdown site][df1]\r\n\r\n> The overriding design goal for Markdown's\r\n\r\n> formatting syntax is to make it as readable\r\n\r\n> as possible. The idea is that a\r\n\r\n> Markdown-formatted document should be\r\n\r\n> publishable as-is, as plain text, without\r\n\r\n> looking like it's been marked up with tags\r\n\r\n> or formatting instructions.\r\n\r\nThis text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.\r\n\r\n### Version\r\n3.2.7\r\n\r\n### Tech\r\n\r\nDillinger uses a number of open source projects to work properly:\r\n\r\n* [AngularJS] - HTML enhanced for web apps!\r\n* [Ace Editor] - awesome web-based text editor\r\n* [Marked] - a super fast port of Markdown to JavaScript\r\n* [Twitter Bootstrap] - great UI boilerplate for modern web apps\r\n* [node.js] - evented I\/O for the backend\r\n* [Express] - fast node.js network app framework [@tjholowaychuk]\r\n* [Gulp] - the streaming build system\r\n* [keymaster.js] - awesome keyboard handler lib by [@thomasfuchs]\r\n* [jQuery] - duh\r\n\r\nAnd of course Dillinger itself is open source with a [public repository][dill]\r\n on GitHub.\r\n\r\n### Installation\r\n\r\nYou need Gulp installed globally:\r\n\r\n```sh\r\n$ npm i -g gulp\r\n```\r\n\r\n```sh\r\n$ git clone [git-repo-url] dillinger\r\n$ cd dillinger\r\n$ npm i -d\r\n$ gulp build --prod\r\n$ NODE_ENV=production node app\r\n```\r\n\r\n### Plugins\r\n\r\nDillinger is currently extended with the following plugins\r\n\r\n* Dropbox\r\n* Github\r\n* Google Drive\r\n* OneDrive\r\n\r\nReadmes, how to use them in your own application can be found here:\r\n\r\n* [plugins\/dropbox\/README.md] [PlDb]\r\n* [plugins\/github\/README.md] [PlGh]\r\n* [plugins\/googledrive\/README.md] [PlGd]\r\n* [plugins\/onedrive\/README.md] [PlOd]\r\n\r\n### Development\r\n\r\nWant to contribute? Great!\r\n\r\nDillinger uses Gulp + Webpack for fast developing.\r\nMake a change in your file and instantanously see your updates!\r\n\r\nOpen your favorite Terminal and run these commands.\r\n\r\nFirst Tab:\r\n```sh\r\n$ node app\r\n```\r\n\r\nSecond Tab:\r\n```sh\r\n$ gulp watch\r\n```\r\n\r\n(optional) Third:\r\n```sh\r\n$ karma start\r\n```\r\n\r\n### Docker\r\nDillinger is very easy to install and deploy in a Docker container.\r\n\r\nBy default, the Docker will expose port 80, so change this within the Dockerfile if necessary. When ready, simply use the Dockerfile to build the image. \r\n\r\n```sh\r\ncd dillinger\r\ndocker build -t <youruser>\/dillinger:latest .\r\n```\r\nThis will create the dillinger image and pull in the necessary dependencies. Once done, run the Docker and map the port to whatever you wish on your host. In this example, we simply map port 80 of the host to port 80 of the Docker (or whatever port was exposed in the Dockerfile):\r\n\r\n```sh\r\ndocker run -d -p 80:80 --restart=\"always\" <youruser>\/dillinger:latest\r\n```\r\n\r\nVerify the deployment by navigating to your server address in your preferred browser.\r\n\r\n### N|Solid and NGINX\r\n\r\nMore details coming soon.\r\n\r\n#### docker-compose.yml\r\n\r\nChange the path for the nginx conf mounting path to your full path, not mine!\r\n\r\n### Todos\r\n\r\n - Write Tests\r\n - Rethink Github Save\r\n - Add Code Comments\r\n - Add Night Mode\r\n\r\nLicense\r\n----\r\n\r\nMIT\r\n\r\n\r\n**Free Software, Hell Yeah!**\r\n\r\n[\/\/]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http:\/\/stackoverflow.com\/questions\/4823468\/store-comments-in-markdown-syntax)\r\n\r\n# Libraries nedded \r\n\r\n* Laravel Web Installer by [Rachid Laasri]\r\n* [https:\/\/github.com\/RachidLaasri\/LaravelInstaller]\r\n\r\nImage by [http:\/\/image.intervention.io\/]\r\n[https:\/\/github.com\/Intervention\/image]\r\n\r\n\r\n[Rachid Laasri]: https:\/\/github.com\/RachidLaasri\/LaravelInstaller\r\n[Intervention Image]: http:\/\/image.intervention.io\/\r\n[https:\/\/github.com\/RachidLaasri\/LaravelInstaller]: https:\/\/github.com\/RachidLaasri\/LaravelInstaller\r\n[https:\/\/github.com\/Intervention\/image]: https:\/\/github.com\/Intervention\/image\r\n\r\n\r\n   [dill]: <https:\/\/github.com\/joemccann\/dillinger>\r\n   [git-repo-url]: <https:\/\/github.com\/joemccann\/dillinger.git>\r\n   [john gruber]: <http:\/\/daringfireball.net>\r\n   [@thomasfuchs]: <http:\/\/twitter.com\/thomasfuchs>\r\n   [df1]: <http:\/\/daringfireball.net\/projects\/markdown\/>\r\n   [marked]: <https:\/\/github.com\/chjj\/marked>\r\n   [Ace Editor]: <http:\/\/ace.ajax.org>\r\n   [node.js]: <http:\/\/nodejs.org>\r\n   [Twitter Bootstrap]: <http:\/\/twitter.github.com\/bootstrap\/>\r\n   [keymaster.js]: <https:\/\/github.com\/madrobby\/keymaster>\r\n   [jQuery]: <http:\/\/jquery.com>\r\n   [@tjholowaychuk]: <http:\/\/twitter.com\/tjholowaychuk>\r\n   [express]: <http:\/\/expressjs.com>\r\n   [AngularJS]: <http:\/\/angularjs.org>\r\n   [Gulp]: <http:\/\/gulpjs.com>\r\n\r\n   [PlDb]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/dropbox\/README.md>\r\n   [PlGh]:  <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/github\/README.md>\r\n   [PlGd]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/googledrive\/README.md>\r\n   [PlOd]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/onedrive\/README.md>",
                "author": "Apostolos Siokas",
                "certified": 0,
                "tags": [
                    {
                        "id": 189,
                        "slug": "log",
                        "name": "Log",
                        "suggest": 0,
                        "count": 1
                    },
                    {
                        "id": 190,
                        "slug": "dilinger",
                        "name": "Dilinger",
                        "suggest": 0,
                        "count": 1
                    }
                ],
                "views": 8,
                "created_at": "2016-05-19 16:51:58",
                "updated_at": "2016-05-21 14:54:35",
                "deleted_at": null,
                "tagged": [
                    {
                        "id": 459,
                        "taggable_id": 202,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Log",
                        "tag_slug": "log",
                        "tag": {
                            "id": 189,
                            "slug": "log",
                            "name": "Log",
                            "suggest": 0,
                            "count": 1
                        }
                    },
                    {
                        "id": 460,
                        "taggable_id": 202,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Dilinger",
                        "tag_slug": "dilinger",
                        "tag": {
                            "id": 190,
                            "slug": "dilinger",
                            "name": "Dilinger",
                            "suggest": 0,
                            "count": 1
                        }
                    }
                ]
            },
            {
                "id": 201,
                "title": "#Siokas\r",
                "article": "#Siokas\r\n\r\nopao\r\nas\r\nSikas\r\n\r\n**sdasd**\r\n\r\n> Pame re megale\r\n> Titana twn aigeon \r\n> thirio animero\r\n> pame re teras\r\n\r\n```\r\nopedfadf\r\nd\r\nfsd\r\nf\r\nsd\r\nf\r\ndsf\r\n```",
                "author": "Anonymous",
                "certified": 1,
                "tags": [
                    {
                        "id": 169,
                        "slug": "etsi-mles",
                        "name": "Etsi_Mles",
                        "suggest": 0,
                        "count": 1
                    },
                    {
                        "id": 170,
                        "slug": "leme",
                        "name": "Leme",
                        "suggest": 0,
                        "count": 1
                    },
                    {
                        "id": 171,
                        "slug": "ds",
                        "name": "Ds",
                        "suggest": 0,
                        "count": 1
                    }
                ],
                "views": 1,
                "created_at": "2016-05-19 16:50:56",
                "updated_at": "2016-05-19 16:51:10",
                "deleted_at": null,
                "tagged": [
                    {
                        "id": 421,
                        "taggable_id": 201,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Etsi_Mles",
                        "tag_slug": "etsi-mles",
                        "tag": {
                            "id": 169,
                            "slug": "etsi-mles",
                            "name": "Etsi_Mles",
                            "suggest": 0,
                            "count": 1
                        }
                    },
                    {
                        "id": 422,
                        "taggable_id": 201,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Leme",
                        "tag_slug": "leme",
                        "tag": {
                            "id": 170,
                            "slug": "leme",
                            "name": "Leme",
                            "suggest": 0,
                            "count": 1
                        }
                    },
                    {
                        "id": 423,
                        "taggable_id": 201,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Ds",
                        "tag_slug": "ds",
                        "tag": {
                            "id": 171,
                            "slug": "ds",
                            "name": "Ds",
                            "suggest": 0,
                            "count": 1
                        }
                    }
                ]
            },
            {
                "id": 124,
                "title": "Facere perspiciatis impedit repudiandae tempore a dolorem voluptatem.",
                "article": "Provident illo quae sit ut. Vitae officia quam ea voluptas. Autem et et autem tempore dicta aliquam velit. Atque nulla tenetur voluptatum veniam in dolore.",
                "author": "Dr. Lewis Grant",
                "certified": 0,
                "tags": [
                    {
                        "id": 164,
                        "slug": "at",
                        "name": "At",
                        "suggest": 0,
                        "count": 1
                    },
                    {
                        "id": 12,
                        "slug": "aut",
                        "name": "Aut",
                        "suggest": 0,
                        "count": 12
                    }
                ],
                "views": 2,
                "created_at": "2016-05-19 16:27:29",
                "updated_at": "2016-05-19 16:36:20",
                "deleted_at": null,
                "tagged": [
                    {
                        "id": 415,
                        "taggable_id": 124,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "At",
                        "tag_slug": "at",
                        "tag": {
                            "id": 164,
                            "slug": "at",
                            "name": "At",
                            "suggest": 0,
                            "count": 1
                        }
                    },
                    {
                        "id": 416,
                        "taggable_id": 124,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Aut",
                        "tag_slug": "aut",
                        "tag": {
                            "id": 12,
                            "slug": "aut",
                            "name": "Aut",
                            "suggest": 0,
                            "count": 12
                        }
                    }
                ]
            },
            {
                "id": 125,
                "title": "Voluptate sunt provident maiores odio excepturi id vel voluptatibus.",
                "article": "Voluptas similique et voluptatem dolorem qui. Rerum sequi soluta ut laborum est. Velit qui rerum praesentium occaecati. Est aut inventore quia rerum nisi non numquam. Consectetur id et non soluta qui.",
                "author": "Eleanora D'Amore",
                "certified": 0,
                "tags": [
                    {
                        "id": 93,
                        "slug": "iure",
                        "name": "Iure",
                        "suggest": 0,
                        "count": 2
                    },
                    {
                        "id": 44,
                        "slug": "illo",
                        "name": "Illo",
                        "suggest": 0,
                        "count": 2
                    }
                ],
                "views": 0,
                "created_at": "2016-05-19 16:27:29",
                "updated_at": "2016-05-19 16:27:29",
                "deleted_at": null,
                "tagged": [
                    {
                        "id": 254,
                        "taggable_id": 125,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Iure",
                        "tag_slug": "iure",
                        "tag": {
                            "id": 93,
                            "slug": "iure",
                            "name": "Iure",
                            "suggest": 0,
                            "count": 2
                        }
                    },
                    {
                        "id": 255,
                        "taggable_id": 125,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Illo",
                        "tag_slug": "illo",
                        "tag": {
                            "id": 44,
                            "slug": "illo",
                            "name": "Illo",
                            "suggest": 0,
                            "count": 2
                        }
                    }
                ]
            },
            {
                "id": 126,
                "title": "Aliquam nisi porro aut ut corrupti quos cupiditate.",
                "article": "Ea aliquid veritatis eos eum. Quis sit est odit et alias in. Ex velit cum beatae optio. Tempora eius repellendus dolorum.",
                "author": "Americo Ratke DDS",
                "certified": 0,
                "tags": [
                    {
                        "id": 73,
                        "slug": "earum",
                        "name": "Earum",
                        "suggest": 0,
                        "count": 2
                    },
                    {
                        "id": 17,
                        "slug": "rerum",
                        "name": "Rerum",
                        "suggest": 0,
                        "count": 7
                    }
                ],
                "views": 1,
                "created_at": "2016-05-19 16:27:29",
                "updated_at": "2016-05-21 14:54:19",
                "deleted_at": null,
                "tagged": [
                    {
                        "id": 467,
                        "taggable_id": 126,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Earum",
                        "tag_slug": "earum",
                        "tag": {
                            "id": 73,
                            "slug": "earum",
                            "name": "Earum",
                            "suggest": 0,
                            "count": 2
                        }
                    },
                    {
                        "id": 468,
                        "taggable_id": 126,
                        "taggable_type": "App\\Models\\Post",
                        "tag_name": "Rerum",
                        "tag_slug": "rerum",
                        "tag": {
                            "id": 17,
                            "slug": "rerum",
                            "name": "Rerum",
                            "suggest": 0,
                            "count": 7
                        }
                    }
                ]
            }
        ]
    }
}
    ```

### HTTP Request
`GET api/withPagination/posts`

`HEAD api/withPagination/posts`


## This is the short description

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://localhost/api/withPagination/user/{name}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/withPagination/user/{name}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

    > Example response:

    ```json
    {
    "pagination": {
        "total": 0,
        "per_page": 5,
        "current_page": 1,
        "last_page": 0,
        "from": null,
        "to": null
    },
    "data": {
        "total": 0,
        "per_page": 5,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
    ```

### HTTP Request
`GET api/withPagination/user/{name}`

`HEAD api/withPagination/user/{name}`


## This is the short description

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://localhost/api/withPagination/tag/{name}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/withPagination/tag/{name}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

    > Example response:

    ```json
    {
    "pagination": {
        "total": 0,
        "per_page": 5,
        "current_page": 1,
        "last_page": 0,
        "from": null,
        "to": null
    },
    "data": {
        "total": 0,
        "per_page": 5,
        "current_page": 1,
        "last_page": 0,
        "next_page_url": null,
        "prev_page_url": null,
        "from": null,
        "to": null,
        "data": []
    }
}
    ```

### HTTP Request
`GET api/withPagination/tag/{name}`

`HEAD api/withPagination/tag/{name}`


## api/post/{id}

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://localhost/api/post/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/post/{id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

    > Example response:

    ```json
    []
    ```

### HTTP Request
`GET api/post/{id}`

`HEAD api/post/{id}`


## api/popular

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://localhost/api/popular" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/popular",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

    > Example response:

    ```json
    [
    {
        "id": 100,
        "title": "Molestiae iusto qui doloremque et fuga cupiditate.",
        "article": "Consectetur provident qui in provident eum corporis. Et magnam et quaerat sapiente voluptatibus. Culpa eum omnis eos voluptatem quia ipsam.",
        "author": "Cathryn Gislason",
        "certified": 0,
        "tags": [
            {
                "id": 4,
                "slug": "dolorem",
                "name": "Dolorem",
                "suggest": 0,
                "count": 6
            },
            {
                "id": 31,
                "slug": "qui",
                "name": "Qui",
                "suggest": 0,
                "count": 5
            }
        ],
        "views": 11,
        "created_at": "2014-12-06 20:12:34",
        "updated_at": "2016-05-21 12:43:56",
        "deleted_at": null,
        "tagged": [
            {
                "id": 465,
                "taggable_id": 100,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Dolorem",
                "tag_slug": "dolorem",
                "tag": {
                    "id": 4,
                    "slug": "dolorem",
                    "name": "Dolorem",
                    "suggest": 0,
                    "count": 6
                }
            },
            {
                "id": 466,
                "taggable_id": 100,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Qui",
                "tag_slug": "qui",
                "tag": {
                    "id": 31,
                    "slug": "qui",
                    "name": "Qui",
                    "suggest": 0,
                    "count": 5
                }
            }
        ]
    },
    {
        "id": 202,
        "title": "# Dili\r",
        "article": "# Dili\r\n\r\n>Simple Accountless **Markup Blog**\r\n\r\nDillinger is a cloud-enabled, mobile-ready, offline-storage, AngularJS powered HTML5 Markdown editor.\r\n\r\n  - Type some Markdown on the left\r\n  - See HTML in the right\r\n  - Magic\r\n\r\nMarkdown is a lightweight markup language based on the formatting conventions that people naturally use in email.  As [John Gruber] writes on the [Markdown site][df1]\r\n\r\n> The overriding design goal for Markdown's\r\n\r\n> formatting syntax is to make it as readable\r\n\r\n> as possible. The idea is that a\r\n\r\n> Markdown-formatted document should be\r\n\r\n> publishable as-is, as plain text, without\r\n\r\n> looking like it's been marked up with tags\r\n\r\n> or formatting instructions.\r\n\r\nThis text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.\r\n\r\n### Version\r\n3.2.7\r\n\r\n### Tech\r\n\r\nDillinger uses a number of open source projects to work properly:\r\n\r\n* [AngularJS] - HTML enhanced for web apps!\r\n* [Ace Editor] - awesome web-based text editor\r\n* [Marked] - a super fast port of Markdown to JavaScript\r\n* [Twitter Bootstrap] - great UI boilerplate for modern web apps\r\n* [node.js] - evented I\/O for the backend\r\n* [Express] - fast node.js network app framework [@tjholowaychuk]\r\n* [Gulp] - the streaming build system\r\n* [keymaster.js] - awesome keyboard handler lib by [@thomasfuchs]\r\n* [jQuery] - duh\r\n\r\nAnd of course Dillinger itself is open source with a [public repository][dill]\r\n on GitHub.\r\n\r\n### Installation\r\n\r\nYou need Gulp installed globally:\r\n\r\n```sh\r\n$ npm i -g gulp\r\n```\r\n\r\n```sh\r\n$ git clone [git-repo-url] dillinger\r\n$ cd dillinger\r\n$ npm i -d\r\n$ gulp build --prod\r\n$ NODE_ENV=production node app\r\n```\r\n\r\n### Plugins\r\n\r\nDillinger is currently extended with the following plugins\r\n\r\n* Dropbox\r\n* Github\r\n* Google Drive\r\n* OneDrive\r\n\r\nReadmes, how to use them in your own application can be found here:\r\n\r\n* [plugins\/dropbox\/README.md] [PlDb]\r\n* [plugins\/github\/README.md] [PlGh]\r\n* [plugins\/googledrive\/README.md] [PlGd]\r\n* [plugins\/onedrive\/README.md] [PlOd]\r\n\r\n### Development\r\n\r\nWant to contribute? Great!\r\n\r\nDillinger uses Gulp + Webpack for fast developing.\r\nMake a change in your file and instantanously see your updates!\r\n\r\nOpen your favorite Terminal and run these commands.\r\n\r\nFirst Tab:\r\n```sh\r\n$ node app\r\n```\r\n\r\nSecond Tab:\r\n```sh\r\n$ gulp watch\r\n```\r\n\r\n(optional) Third:\r\n```sh\r\n$ karma start\r\n```\r\n\r\n### Docker\r\nDillinger is very easy to install and deploy in a Docker container.\r\n\r\nBy default, the Docker will expose port 80, so change this within the Dockerfile if necessary. When ready, simply use the Dockerfile to build the image. \r\n\r\n```sh\r\ncd dillinger\r\ndocker build -t <youruser>\/dillinger:latest .\r\n```\r\nThis will create the dillinger image and pull in the necessary dependencies. Once done, run the Docker and map the port to whatever you wish on your host. In this example, we simply map port 80 of the host to port 80 of the Docker (or whatever port was exposed in the Dockerfile):\r\n\r\n```sh\r\ndocker run -d -p 80:80 --restart=\"always\" <youruser>\/dillinger:latest\r\n```\r\n\r\nVerify the deployment by navigating to your server address in your preferred browser.\r\n\r\n### N|Solid and NGINX\r\n\r\nMore details coming soon.\r\n\r\n#### docker-compose.yml\r\n\r\nChange the path for the nginx conf mounting path to your full path, not mine!\r\n\r\n### Todos\r\n\r\n - Write Tests\r\n - Rethink Github Save\r\n - Add Code Comments\r\n - Add Night Mode\r\n\r\nLicense\r\n----\r\n\r\nMIT\r\n\r\n\r\n**Free Software, Hell Yeah!**\r\n\r\n[\/\/]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http:\/\/stackoverflow.com\/questions\/4823468\/store-comments-in-markdown-syntax)\r\n\r\n# Libraries nedded \r\n\r\n* Laravel Web Installer by [Rachid Laasri]\r\n* [https:\/\/github.com\/RachidLaasri\/LaravelInstaller]\r\n\r\nImage by [http:\/\/image.intervention.io\/]\r\n[https:\/\/github.com\/Intervention\/image]\r\n\r\n\r\n[Rachid Laasri]: https:\/\/github.com\/RachidLaasri\/LaravelInstaller\r\n[Intervention Image]: http:\/\/image.intervention.io\/\r\n[https:\/\/github.com\/RachidLaasri\/LaravelInstaller]: https:\/\/github.com\/RachidLaasri\/LaravelInstaller\r\n[https:\/\/github.com\/Intervention\/image]: https:\/\/github.com\/Intervention\/image\r\n\r\n\r\n   [dill]: <https:\/\/github.com\/joemccann\/dillinger>\r\n   [git-repo-url]: <https:\/\/github.com\/joemccann\/dillinger.git>\r\n   [john gruber]: <http:\/\/daringfireball.net>\r\n   [@thomasfuchs]: <http:\/\/twitter.com\/thomasfuchs>\r\n   [df1]: <http:\/\/daringfireball.net\/projects\/markdown\/>\r\n   [marked]: <https:\/\/github.com\/chjj\/marked>\r\n   [Ace Editor]: <http:\/\/ace.ajax.org>\r\n   [node.js]: <http:\/\/nodejs.org>\r\n   [Twitter Bootstrap]: <http:\/\/twitter.github.com\/bootstrap\/>\r\n   [keymaster.js]: <https:\/\/github.com\/madrobby\/keymaster>\r\n   [jQuery]: <http:\/\/jquery.com>\r\n   [@tjholowaychuk]: <http:\/\/twitter.com\/tjholowaychuk>\r\n   [express]: <http:\/\/expressjs.com>\r\n   [AngularJS]: <http:\/\/angularjs.org>\r\n   [Gulp]: <http:\/\/gulpjs.com>\r\n\r\n   [PlDb]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/dropbox\/README.md>\r\n   [PlGh]:  <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/github\/README.md>\r\n   [PlGd]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/googledrive\/README.md>\r\n   [PlOd]: <https:\/\/github.com\/joemccann\/dillinger\/tree\/master\/plugins\/onedrive\/README.md>",
        "author": "Apostolos Siokas",
        "certified": 0,
        "tags": [
            {
                "id": 189,
                "slug": "log",
                "name": "Log",
                "suggest": 0,
                "count": 1
            },
            {
                "id": 190,
                "slug": "dilinger",
                "name": "Dilinger",
                "suggest": 0,
                "count": 1
            }
        ],
        "views": 8,
        "created_at": "2016-05-19 16:51:58",
        "updated_at": "2016-05-21 14:54:35",
        "deleted_at": null,
        "tagged": [
            {
                "id": 459,
                "taggable_id": 202,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Log",
                "tag_slug": "log",
                "tag": {
                    "id": 189,
                    "slug": "log",
                    "name": "Log",
                    "suggest": 0,
                    "count": 1
                }
            },
            {
                "id": 460,
                "taggable_id": 202,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Dilinger",
                "tag_slug": "dilinger",
                "tag": {
                    "id": 190,
                    "slug": "dilinger",
                    "name": "Dilinger",
                    "suggest": 0,
                    "count": 1
                }
            }
        ]
    },
    {
        "id": 128,
        "title": "# GIME\r",
        "article": "# GIME\r\nIllo cupiditate harum expedita autem in qui. Perspiciatis voluptas aut aliquid voluptatibus. Qui veritatis et id saepe mollitia. Dignissimos eum laborum natus veritatis.\r\n\r\ndjaslkhkdfj\r\n\r\nAuthor: Siokas",
        "author": "Siokas",
        "certified": 0,
        "tags": [
            {
                "id": 159,
                "slug": "natus",
                "name": "Natus",
                "suggest": 0,
                "count": 1
            },
            {
                "id": 66,
                "slug": "velit",
                "name": "Velit",
                "suggest": 0,
                "count": 5
            },
            {
                "id": 165,
                "slug": "datome",
                "name": "Datome",
                "suggest": 0,
                "count": 1
            }
        ],
        "views": 5,
        "created_at": "2016-05-19 16:27:29",
        "updated_at": "2016-05-19 16:43:34",
        "deleted_at": null,
        "tagged": [
            {
                "id": 408,
                "taggable_id": 128,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Natus",
                "tag_slug": "natus",
                "tag": {
                    "id": 159,
                    "slug": "natus",
                    "name": "Natus",
                    "suggest": 0,
                    "count": 1
                }
            },
            {
                "id": 409,
                "taggable_id": 128,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Velit",
                "tag_slug": "velit",
                "tag": {
                    "id": 66,
                    "slug": "velit",
                    "name": "Velit",
                    "suggest": 0,
                    "count": 5
                }
            },
            {
                "id": 417,
                "taggable_id": 128,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Datome",
                "tag_slug": "datome",
                "tag": {
                    "id": 165,
                    "slug": "datome",
                    "name": "Datome",
                    "suggest": 0,
                    "count": 1
                }
            }
        ]
    },
    {
        "id": 70,
        "title": "Consequuntur nostrum est laudantium non ex esse.",
        "article": "Laboriosam officia unde atque qui officia. Necessitatibus est magnam blanditiis explicabo adipisci.",
        "author": "Rosina Schinner",
        "certified": 0,
        "tags": [
            {
                "id": 50,
                "slug": "quo",
                "name": "Quo",
                "suggest": 0,
                "count": 6
            },
            {
                "id": 108,
                "slug": "eos",
                "name": "Eos",
                "suggest": 0,
                "count": 3
            }
        ],
        "views": 2,
        "created_at": "2016-05-19 15:47:07",
        "updated_at": "2016-05-19 15:50:24",
        "deleted_at": null,
        "tagged": [
            {
                "id": 207,
                "taggable_id": 70,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Quo",
                "tag_slug": "quo",
                "tag": {
                    "id": 50,
                    "slug": "quo",
                    "name": "Quo",
                    "suggest": 0,
                    "count": 6
                }
            },
            {
                "id": 208,
                "taggable_id": 70,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Eos",
                "tag_slug": "eos",
                "tag": {
                    "id": 108,
                    "slug": "eos",
                    "name": "Eos",
                    "suggest": 0,
                    "count": 3
                }
            }
        ]
    },
    {
        "id": 72,
        "title": "Impedit alias dicta officiis et rem est.",
        "article": "Ullam aut facere ut voluptates illo. Rerum nihil amet libero vel. Sapiente ea veritatis quam aspernatur.",
        "author": "Mr. Jarred Batz Jr.",
        "certified": 0,
        "tags": [
            {
                "id": 52,
                "slug": "doloribus",
                "name": "Doloribus",
                "suggest": 0,
                "count": 2
            },
            {
                "id": 33,
                "slug": "eius",
                "name": "Eius",
                "suggest": 0,
                "count": 4
            }
        ],
        "views": 2,
        "created_at": "2016-05-19 15:47:07",
        "updated_at": "2016-05-19 15:49:38",
        "deleted_at": null,
        "tagged": [
            {
                "id": 205,
                "taggable_id": 72,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Doloribus",
                "tag_slug": "doloribus",
                "tag": {
                    "id": 52,
                    "slug": "doloribus",
                    "name": "Doloribus",
                    "suggest": 0,
                    "count": 2
                }
            },
            {
                "id": 206,
                "taggable_id": 72,
                "taggable_type": "App\\Models\\Post",
                "tag_name": "Eius",
                "tag_slug": "eius",
                "tag": {
                    "id": 33,
                    "slug": "eius",
                    "name": "Eius",
                    "suggest": 0,
                    "count": 4
                }
            }
        ]
    }
]
    ```

### HTTP Request
`GET api/popular`

`HEAD api/popular`


