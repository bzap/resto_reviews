Linas Aleknevicius
aleknevl, 400026706

http://3.23.201.7/
https://github.com/bzap/resto_reviews


Submitting a new location and reviewing a location will not show up until the user is logged in. 

A sample use case scenario using the given data: 
>Press log-in on the nav, and log in as jimmy with a password of 123123
>Either search for a total list with the geolocation button or enter a search term 
>For this scenario, search 'sushi', and two sushi places will show up
>Open the info page of Bento Sushi, and there should be three different reviews from other users as well as a review box 
>Or press submit, and submit a new location to show up in the results 


resto.sql is an export of a sample db used for MySQL

All of the previous html files were renamed to php files. 

Other new files for this part of the project: 
login.php -> A simple login page for the website 
login_data.php -> A component to verify the login details, and store the user session 
logout.php -> A component to log the user out and destroy the session 
review.php -> A component to submit the review score and description made by the user for the restaurant selected
save_data.php -> A component to save the registration data of a user when signing up 
save_submission.php -> A component to save the submission data when submitting a new location 
individual.php -> A component to get the individual data of a restaurant once selected 
index_data.php -> A component to get the restaurants submitted for the main page  
search.php -> This is not new, but there is a new php component at the top to fetch search results based on term/geolocation

Assumptions: 
For logging in, the first part of the email used to register, is the username. 
	eg. if the registration email was jimmy@gmail.com, the username is jimmy

For submitting an object, any file name in place of the images are used
Due to time constraints I didn't manage to show the results on the map when searching, instead they only get loaded into the table. I also didn't manage to load images from an S3 Bucket, so instead there are still placeholder images for each location. 


Sushi image credits: Sushi Box Toronto, https://www.sushiboxonbay.com/
