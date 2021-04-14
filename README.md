# Laravel-Project
Group assignment in Laravel - YRGO / WU20 

### Code Review by [Martin](https://github.com/Alegherix) & [Felix](https://github.com/felixgren)
- You could refer to a route when hyperlinking instead of hardcoding path such as in profile
- You could group middleware in routes instead of specifying for each route
- You could log in automagically when successfully registereing an account
- Should probably add that a review belongs to a user in your model
- Could probably use some Factories to make testing easier
- Writing query manually in TVController could be omitted, instead use Laravels Eloquent Models
- Could probably replace ProfileController with view to stay consistent with the rest of your web routing
- Should probably add a model for Movies and create an eloquent relation with User, same as for TVController
- In your migrations you should add cascade on delete to not leave database in fragile state where you have orphans
- You can edit and delete other reviews by changing your form id in web devtools
- You could hide the submit form using blade directives depending on if user has permission to post
- You could create seeders that use factories to make development and filling in dummy data easier
- You could refactor errors view into your layouts/app view.
- In your store method in ReviewController only the movie_id is being validated, changing the id from devtools in your tv index, allows for inserting strings into database
- Nice use of external API to create an interesting application
- Could probably use store method in MovieController and TvController instead of reviewController for greater extensibility and SOC
- You could refactor all views in components into one by passing a value from the controller, and using it as prop inside of blade 
- Can't find the avatar from resources -- Avatar uploads successfully, but fails to fetch and view
- In some parts of html, like input elem of login, your tailwind could be refactored and placed into a single class in your app.css, and applied to reuse styling without duplicating code.
- Really nice looking dashboard!
