This project was realised by Antonin Prion, Mathieu Carrière and J.Jackson Medilien
The goal was to create a website where vistors can see and search ads and subscribers can publish and manage their ads.
Of course like every website there is options available only for the user who is connected as an admin.

The technology used for this web app is the laravel framework (https://laravel.com/). all documentation is available on their website.
We also used composer to manage dependecies.

Our approch of the project has been for the major part of the process to use a large number of components in order to display the views.

We tried different ways in regards of the routes, we needed to adapt either to the controllers or to each others work (teamwork).

Not all the views use components. Only thhose with a repetitive patern such as forms and ads.

We tried as much as we could to use a model approch when it came to the logic part of the code and to calls to database. 
Although there are still some unfinished business in the controllers, they where mostly used to send information to the views and nothing else (that was the idea).

From a functionality stand point : 

Search the website by category and min price, max price or a range between both => available for all visitors and users.
See all ads from a category => available for all visitors and users.
Create an ad => available for every subscribers.
Delete an ad => each subscriber can delete his own and admin user can delete every ads.
Edit an ad => each subscriber can edit his own.
See ads => each user can see his own and admin users can see all.
Manage category which includes (edit, delete and create) => only available for admin users.
Manage users which includes (edit and delete) => only available for admin users.

A user when creates his account receive a confirmation email.

A user that has forgoten his password can reset it by clicking the link at disposal on the signin form.

Notice that a virtual mail box (mailtrap) has been used to catch emails sent. Please change mail parameters in envi file if needed for test.



