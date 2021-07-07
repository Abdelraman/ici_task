ICIGAI backend task

## Installation

- Clone the repo.
- cp .env.example .env
- Set your database credentials
- composer install
- php artisan key:generate

## Documentation

- The welcome screen allows registered users or guests to write posts.
- Users or guests can reply on their own posts or other's posts.
- Multi level replies up to 5 levels as required.
- Guest user's name will be anonymous.
- Guest users can attach image from their own computer.
- Registered users can attach images from their gallery.
- Registered users click on attach image button with the camera icon, it opens a modal with drop zone with the ability to upload image.
- Registered user can choose images from their gallery and click confirm.
- Once image confirmed it is attached automatically to the post or reply.
- Registered can delete the uploaded images
- Each post will have the username, attached image, and the date of the post or reply.
- Most of the work done using javascript, kindly check the custom folder inside public/js/custom.
- Kindly check the database schema and relations from the models folder and migration folder.
