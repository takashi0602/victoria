# Setup & Build

### 1. Module Install

```
$ composer install
$ npm i
```

### 2. Create ".env"

```
$ cp .env.example .env
```

### 3. Create "SQLite" & edit ".env"

```
$ touch database/database.sqlite
```

```
...
DB_CONNECTION=sqlite
...
```

### 4. Run migration

```
$ php artisan migrate
```

### 5. Get the Key and AccessToken from Twitter

https://apps.twitter.com/

### 6. Set the Key and AccessTokens

```
...
CONSUMER_KEY=:your_consumer_key
CONSUMER_SECRET=:your_cunsumer_secret
ACCESS_TOKEN=:your_access_token
ACCESS_TOKEN_SECRET=:your_access_token_secret
...
```

### 7. Set the search keyword for Twitter

```
...
SEARCH_KEYWORD=:your_search_keyword
...
```

### 8. Start up local server

```
$ php -S localhost:8000 -t public
```

# Links
[victoria-tweet-stream](https://github.com/tyokinuhata/victoria-tweet-stream)
Create Victoria front side.
