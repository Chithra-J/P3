# Dynamic Web Applications - Project P3

Project P3 is to give hands-on practice with working with the essentials of building a Laravel-based site. Building this project will demonstrate an understanding of the following skills: 

1. Creating a new Laravel application. 

2. Installing and using Composer packages. 
	
	2.1 guzzlehttp/guzzle for generating random user: Used [http://api.randomuser.me](http://api.randomuser.me) to get the json object with required parameter passed.
	
	2.2 joshtronic/php-loremipsum for generating random text 

3. Routing basics - Used routes with basic routes parameters passed to the controller. The controller have the methods implemented that was reffered in the routes file. 
	HTTP request is used to get current instance of request and validation is applied before executing post.
	
4. Views: Blade templates used for rendering of web pages. 
	4.1 /resources/views/layouts/master.blade.php - contains the all the layout needed and other pages will extend
	
	4.2 /resources/views/loremipsum/ - contains index page as well as the request and response pages for random text generation
		
		4.2.1 getloremipsumdetails.blade.php
		
		4.2.2 index.blade.php
		
		4.2.3 show.blade.php
	
	4.3 /resources/views/users/ - contains request and response pages for random user generation
		
		4.3.1. getuserdetails.blade.php		
		
		4.3.2 show.blade.php
	
	4.4 In addition used 
		
		4.4.1 Bootstrap for the advanced styling and faster responsiveness 
		
		4.4.2 jQuery is used to handle dynamic content delivery
				
				4.4.2.1 handle random text generation screen to show additional html tag optio.
				
				4.4.2.2 handle accordion toggle event for showing different level of user information in the user screen
	
5. Deploying a Laravel app on a live server. 

# NOTE: I have realized once that the randomuser.me server was not available for a an hour or so.

## Live URL of the project

Live URL of the project can be found [here](http://P3.chanchika.me/).

## Demo

Link to screencast demo can be found [here](TBD).
