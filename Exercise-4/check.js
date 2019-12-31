
        function checkAllFields(){
       
            var id = document.getElementById("id").value;
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;

            if ((id.length == 0) && (fname.length == 0) && (lname.length == 0))
            {
                alert("You forgot to fill in the following field(s) ID, First Name, Last Name");
                
                document.getElementById("ERRORID").innerHTML = "Please Enter an ID";
                document.getElementById("ERRORFNAME").innerHTML = "Please Enter a First Name";
                document.getElementById("ERRORLNAME").innerHTML = "Please Enter an Last Name";
                document.getElementById("msg").innerHTML = ""; 
                document.getElementById("id").focus();
                
                return false;
            } 
            else if (id.length == 0)
            {
                alert("Please Enter an ID");
                
                document.getElementById("ERRORID").innerHTML = "Please Enter an ID"; 
                document.getElementById("ERRORFNAME").innerHTML = ""; 
                document.getElementById("ERRORLNAME").innerHTML = ""; 
                document.getElementById("msg").innerHTML = "";
                document.getElementById("id").focus();
                
                return false;
            }
            else if (fname.length == 0)
            {
                alert("Please Enter a First Name");
                
                document.getElementById("ERRORID").innerHTML = ""; 
                document.getElementById("ERRORFNAME").innerHTML = "Please Enter a First Name"; 
                document.getElementById("ERRORLNAME").innerHTML = ""; 
                document.getElementById("msg").innerHTML = "";
                document.getElementById("fname").focus();
                
                return false;
            }

            else if (lname.length == 0)
            {
                alert("Please Enter an Last Name");
                
                document.getElementById("ERRORID").innerHTML = ""; 
                document.getElementById("ERRORFNAME").innerHTML = ""; 
                document.getElementById("ERRORLNAME").innerHTML = "Please Enter a Last Name"; 
                document.getElementById("msg").innerHTML = ""; 
                document.getElementById("lname").focus();
                
                return false;
            }
            
            else  if (id.length != 0 && fname.length != 0 && lname.length!=0)
            {
            	document.getElementById("ERRORID").innerHTML = ""; 
                document.getElementById("ERRORFNAME").innerHTML = ""; 
                document.getElementById("ERRORLNAME").innerHTML = ""; 
            	document.getElementById("msg").innerHTML = "Success all the fields are entered !!!";
            	
            	return true;
            }
        }
