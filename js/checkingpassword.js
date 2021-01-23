function CheckPassword(inputpassword)   
{   
var passw=  /^[A-Za-z]\w{7,14}$/;  
if(inputpassword.value.match(passw))   
{   
alert('Correct, try another...')  
return true;  
}  
else  
{   
alert('Wrong...!') 
return false;  
}  
}  

<form action="loginadmin.html">
							<button type="submit" class="btn btn-default">Admin login</button></form><br>
                    <form action="loginwarehouse.html">
							<button type="submit" class="btn btn-default">Warehouse login</button></form>
					</div>