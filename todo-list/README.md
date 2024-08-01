# RNexus-test

A To-Do list web application using latest version of Laravel.

The app should manage only single list Items:
* to be added
* altered
* checked-off
* deleted

The app should allow to manage the to-do list with a web interface (using whatever theme you like) and an API.

No authentication required for both ends.

### Setup

Install the dependencies via composer

```bash
docker run --rm -v "$(pwd)":/app -u 1000:1000 -e COMPOSER_HOME=/tmp --workdir /app bitnami/laravel composer install
```

Create the `.env` file.

```bash
cp .env.example .env
```

Start the application using Docker Compose in the root directory.

```bash
docker compose up -d
```

Create database and run migration files (Confirm the container name first by running 'docker ps')

```bash
docker exec todo-list-laravel-rn-1 php artisan migrate
```

You should now be able to access the application at `http://localhost`.

You can stop the application with `Ctrl+C` and then run `docker compose down` to remove the containers.


### API

The following are API endpoints that can be accessed via it's relative url:

GET 
* /list - Returns a list of all todo items

POST
* /create - Creates a new todo item.  Requires 'description' as a text parameter 

PUT
* /edit - Updates an existing todo item. Requires param: 'id'.  Optional params: 'description', 'complete'
* /complete/{id} - Updates an existing todo item's 'complete' field.  Sets it to TRUE 

DELETE
* /delete/{id} - Deletes an existing todo item.


*Note*
When testing api requests, make sure to add the following header to your requests:

* Accept: application/json

This ensures laravel will return the correctly formatted data (in this case, json)
