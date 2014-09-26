 
=======
!!!  early dev  version !!!


 
NewsletterBundle
================

Simple Newsletter Bundle  for  Symfony2


=======
In some  of my projects  i needed simple  newsletter. I didn't like existing, so i created one .

>>>>>>> 0e195485f829a39a5d7178b34fea81f48694ce26
Goals (working) : 

 - No frontend ( you need  to provide your own)
 - Subscribe to newsletter  by only  passing e-mail via event    
 - Confirmation from Subscribent  (via link in e-mail) 
 - Ability to cancel subscription (via  link  in ever message )  
 - Sending messages  from CLI (to use in cron)



Contribution
================
Feel free to contribute to this bundle


Installation 
================
In parameters.yml define :

> newsletter_from: email "from" in letter header 
> newsletter_url :  http://..   - url of  your application


 Usage
================

