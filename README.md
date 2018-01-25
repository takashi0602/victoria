# Setup & Build

### 1. Module Install

```
$ composer install
$ npm i
```

### 2. Get the Key and AccessToken from Twitter

https://apps.twitter.com/

### 3. Create ".env" & set the Key and AccessTokens

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

### 4. Create "SQLite" & edit ".env"

```
$ touch database/database.sqlite
```

```
...
DB_CONNECTION=sqlite
...
```

### 5. Run migration

```
$ php artisan migrate
```

### 6. Start up local server

```
$ php -S localhost:8000 -t public

```