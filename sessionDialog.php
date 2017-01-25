<?php
/**
 * Copyright 2015 IBM Corp. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * sessionDialog.php written by Ray.Lopez@us.ibm.com
 * 
 * This file is used to conduct a dialog session.  It makes use of the file
 * watsonDialog.php which contains the function postToDialog(), which 
 * is the code that communicates with the REST API of a dialog instance 
 * configured in the file dialogInstance.php. An HTML form takes the user
 * input, submits it to the dialog instance, then re-displays the dialog
 * response and the form.
 */
session_start();
$response_text = "Hi, my name is Watson. How may I help you?";
print "<h1>IBM Watson Dialog Demo</h1>";
if($_POST['formSubmit'] == "Submit") 
{
  include './watsonDialog.php';
  $errorMessage = "";
  if(empty($_POST['formInput'])) 
  {
    $errorMessage .= "<li>You forgot to enter something!</li>";
  }	
  if(!empty($errorMessage)) 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
    $_POST['formInput'] = "Hi.";
  } 
  $response = postToDialog($_SESSION['session_conversation_id'], $_SESSION['session_client_id'], $_POST['formInput']);
  $response_text = $response['response']['0'];
} 
print "<p><b>$response_text</b></p>";
?>
<form action="sessionDialog.php" method="post">
    <p>Your utterance:
    <input type="text" name="formInput" size="70" maxlength="150">
    <p><input type="submit" name="formSubmit" value="Submit">
</form>
