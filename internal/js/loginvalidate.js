$(document).ready(function(){
   $('form').submit(function(event){
   if($('#username').val()=="" && $('#password').val()==""){ //Both 
           $('#msg').text("Username and Password are blank"); //Display Message
           document.getElementById('username').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }       
    if($('#username').val()==""){ //Blank username
           $('#msg').text("Username is blank"); //Display Message
           document.getElementById('username').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
       if($('#password').val()==""){ //Blank password
           $('#msg').text("password is blank"); //Display Message
           document.getElementById('password').focus(); //Focus on text field
            event.preventDefault(); 
            return false;// prevent submission
       }
   });
    
});


