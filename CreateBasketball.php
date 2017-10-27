<HTML>
    
    <HEAD>
        
        <TITLE>CreateBasketball</TITLE>
        <META http-equiv=Content-Type content="text/html; charset=utf-8">
            
        <script type="text/javascript">
        
        // This is just a placeholder incase we wanted add additional javascript type validations.
        function validateForm(){
            return true;
        };   
        
        </script>
        
    </HEAD>
    
    <BODY>
        <h1>New Basketball Player</h1>
        <form action = "CreateBasketball.php" method = "POST" onsubmit = "return validateForm()" />
        <p>Player Address: <input type = "text" name = "Address" maxlength = '128' required/></p>
        <p>Player Birthday: <input type = "date" name = "Birthday"></p>
        <p>Player Email: <input type = "text" name = "Email" maxlength = '32' required/></p>
        <input type="Submit">
    </BODY>
    
</HTML>
