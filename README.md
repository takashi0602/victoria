# Setup & Build

### Module Install

```
$ composer install
$ npm i
```

### Get the Key and AccessToken from Twitter

https://apps.twitter.com/

### Create ".env" & set the Key and AccessTokens

```
$ cp .env.example .env
```

```
...
CONSUMER_KEY=:your_consumer_key
CONSUMER_SECRET=:your_cunsumer_secret
ACCESS_TOKEN=:your_access_token
ACCESS_TOKEN_SECRET=:your_access_token_secret
...
```

### Create "SQLite" & edit ".env"

```
$ touch database/database.sqlite
```

```
...
DB_CONNECTION=sqlite
...
```

### Run migration

```
$ php artisan migrate
```

### Start local server

```
$ php -S localhost:8000 -t public

```