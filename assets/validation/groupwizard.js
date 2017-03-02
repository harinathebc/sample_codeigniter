 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#importcustomer').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
