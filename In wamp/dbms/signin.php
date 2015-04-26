<?php  
//signin.php  
include 'connect.php';  
include 'head.php'; 
  
//first, check if the user is already signed in. If that is the case, there is no need to display this page  
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)  
{  
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';  
}  
else  
{  echo '<h3>Sign in</h3>';  
    if($_SERVER['REQUEST_METHOD'] != 'POST')  
    {  
        /*the form hasn't been posted yet, display it 
          note that the action="" will cause the form to post to the same page it is on */  
        echo '<form method="post" action="" style="width:420px";>  
            
			Username: <input type="text" name="user_name" /><br>  
            Password: <input type="password" name="user_pass">  
            <input type="submit" value="Sign in" />  
         </form>'; 
    } 
    else 
    { 
        /* so, the form has been posted, we'll process the data in three steps:  
            1.  Check the data  
            2.  Let the user refill the wrong fields (if necessary)  
            3.  Varify if the data is correct and return the correct response  
        */  
        $errors = array(); /* declare the array for later use */  
          
        if($_POST['user_name']==NULL)  
        {  
            $errors[] = '<form method="post" action="">  
            Username: <input type="text" name="user_name" />  
            Password: <input type="password" name="user_pass">  
            <input type="submit" value="Sign in" /></form><br>  
			The username field must not be empty.';  
        }  
          
       else if($_POST['user_pass']==NULL)  
        {  
            $errors[] = '<form method="post" action="">  
            Username: <input type="text" name="user_name" />  
            Password: <input type="password" name="user_pass">  
            <input type="submit" value="Sign in" /></form><br>
			The password field must not be empty.'; 
        }  
          
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/  
        {  
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */ 
            { 
                echo $value; /* this generates a nice error list */ 
            } 
        } 
        else 
        { 
            //the form has been posted without errors, so save it 
            //notice the use of mysql_real_escape_string, keep everything safe! 
            //also notice the sha1 function which hashes the password 
            $sql = "SELECT  
                        Id,
						login
                    FROM 
                        user 
                    WHERE 
                        login = '" . mysqli_real_escape_string($con,$_POST['user_name']) . "' 
                    AND 
                        pass = '" . md5($_POST['user_pass']) . "'";  
                          
            $result = mysqli_query($con,$sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while signing in. Please try again later.'; 
                //echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
            else 
            { 
                //the query was successfully executed, there are 2 possibilities 
                //1. the query returned data, the user can be signed in 
                //2. the query returned an empty result set, the credentials were wrong 
                if (mysqli_num_rows($result) == 0) 
                { 
                    echo 'You have supplied a wrong user/password combination. Please try again.'; 
                } 
                else 
                { 
                    //set the $_SESSION['signed_in'] variable to TRUE 
                    $_SESSION['signed_in'] = true; 
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages 
                    while($row = mysqli_fetch_assoc($result)) 
                    { 
                        $_SESSION['user_id']    = $row['Id']; 
                        $_SESSION['user_name']  = $row['login']; 
                    } 
                     
                    header('location:indexer.php'); 
                } 
            } 
        } 
    } 
} 
 
include 'foot.php';  
?>         