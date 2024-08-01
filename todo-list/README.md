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

Create the `.env` file.

```bash
cp .env.example .env
```

Start the application using Docker Compose in the root directory.

```bash
docker compose up
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
