***
<h1 align="center" style="color:red;">Admin panel for filling news</h1>

## About the project

- __The ability to add, edit and delete news in Admin panel__
    - _data to fill in the news:_
        - _name;_
        - _tags (words) for linking between articles (each tag is composed
          in just one word). When saving, the system checks whether
          these tags exist in other articles (there can be several in one article
          tags). If there are in other articles, it issues messages which
          it is necessary to take away from the article which we create (which are not unique).
          If the tags are unique, it checks all article texts for occurrence
          such a tag (text) and adds a link to this article. Also
          the text of this article is checked for the content of tags from other articles
          (previously added). If the tag is deleted in the article, then accordingly
          the links in all articles are removed (the link to
          ordinary word or phrase);_
        - _news text;_
    - _when deleting news - be sure to confirm the action_
- __Made showing all posts on the main page and one post__

## How to use

- Clone the repository with git clone
- Copy .env.example file to .env and edit database credentials there
- Run the following command:

```bash
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
```

- That's it: launch the main URL

***

