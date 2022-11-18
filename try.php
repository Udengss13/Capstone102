<!DOCTYPE html>
<html>
    <head>
        <title>Floating action menu</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="navigation">
            <div class="toggle"> </div>
             <ul>
 
              <li>
                <a href="#"><span class="icon">
                 <i class="fa fa-dashboard" aria-hidden="true"></i></span>
                   <span class="title">Dashboard</span></a>
                  </li>
             
                    <li>
                     <a href="#"><span class="icon">
               <i class="fa fa-id-card" aria-hidden="true"></i></span>
                   <span class="title">Profile</span></a>
            </li>
              <li>
                 <a href="#"><span class="icon">
            <i class="fa fa-comment" aria-hidden="true"></i></span>
                  <span class="title">Messages</span></a>
          </li>
 
             <li>
            <a href="#"><span class="icon">
               <i class="fa fa-cog" aria-hidden="true"></i></span>
                 <span class="title">Settings</span></a>
          </li>
 
            <li>
             <a href="#"><span class="icon">
               <i class="fa fa-user" aria-hidden="true"></i></span>
               <span class="title">User</span></a>
          </li>
 
             <li>
              <a href="#"><span class="icon">
           <i class="fa fa-phone" aria-hidden="true"></i></span>
             <span class="title">Contact</span></a>
          </li>
 
          <li>
            <a href="#"><span class="icon">
         <i class="fa fa-sign-out" aria-hidden="true"></i></span>
           <span class="title">Sign Out</span></a>
        </li>
          </ul>
          </div>
          <script>
              const navigation =
document.querySelector('.navigation');
document.querySelector('.toggle').onclick = function(){
  this.classList.toggle('active');
  navigation.classList.toggle('active');
} 
$( function(){
  $( ".navigation" ).draggable();
} );
          </script>
    </body>
    </html>