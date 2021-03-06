 
  
NewsletterBundle
================
Simple Newsletter Bundle  for  Symfony2

[![Code Climate](https://codeclimate.com/github/poznet/NewsletterBundle/badges/gpa.svg)](https://codeclimate.com/github/poznet/NewsletterBundle) [![Test Coverage](https://codeclimate.com/github/poznet/NewsletterBundle/badges/coverage.svg)](https://codeclimate.com/github/poznet/NewsletterBundle/coverage) [![Build Status](https://travis-ci.org/poznet/NewsletterBundle.svg?branch=master)](https://travis-ci.org/poznet/NewsletterBundle)

=======
In some  of my projects  i needed simple  newsletter. I didn't like existing, so i created one .
 
Goals (working) : 


 - Communication with bundle via service (poznet.newsletter)
 - No frontend ( you need  to provide your own)
 - Subscribe to newsletter (with  email validation and checking  if isn't already  added) by only  passing e-mail via service    
 - Confirmation from Subscribent  (via link in e-mail) 
 - Ability to cancel subscription (via  link  in ever message )  
 - Sending messages  from CLI (to use in cron)



Contribution
================
Feel free to contribute to this bundle


Installation 
================
In app/config/parameters.yml define :
```
newsletter_from: email  # "from" in letter header 
newsletter_url :  http://.. #  - full url of  your application/website  
```

You  need to have route to  (newsletter_url parameter) /newletter-confirm/{{id}}/{{code}} as a confirmation action
 
## Usage
 

#### Addnig  new suscriber
In place where you want  to add address  to newsletter  you need to  (example in controler): 

```
public function newsletterAddAction(Request $request)
 {
   $email= $request->request->get('email'); 
   if(!$this->get('poznet.newsletter')->addSubscriber($email))         
   echo $this->get('poznet.newsletter')->getError();
 }
```

in above  code :
-email is passed from form (by request).
-$this->get('poznet.newsletter')->addSubscriber() - return true if subscriber was added correctly , fale if  not, and also  you  can use ->getError()  to get message about reason.

 it's  that  simple :) to add  new subscriber
 
#### Confirmation
 
 Create route and  bind  it  with controller (use your own)
```
 newsletter_confirm:
    pattern: /newsletter-confirm/{id}/{code}
    defaults: { _controller: GiercowniaFrontendBundle:Newsletter:newsletterConfirm}    
```
In controller : 
```
		$session = new Session();
        $session->start();

        if(!$this->get('poznet.newsletter')->confirmSubscriber($id,$code)){
           $session->getFlashBag()->add('notice', $this->get('poznet.newsletter')->getError());
        }else{
            $session->getFlashBag()->add('notice', 'Account has been Confirmed');
        }
        return $this->redirectToRoute('index');
```

index -  is a  exit route

