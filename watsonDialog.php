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
 * watsonDialog.php written by Ray.Lopez@us.ibm.com
 * 
 * This file contains the function postToDialog(), which 
 * is the code that communicates with the REST API of a dialog instance 
 * configured in the file dialogInstance.php. 
 *
 * This files requires a file called dialogInstance.php which  
 * contains variables to define a connection to a dialog instance.
 *
 * Example dialogInstance.php file:
 *
 * $dialog_id='9911ff0d-e3b8-44a5-8fc6-529355e533d8';
 * $username='03c5eb78-66de-4032-8663-5c6fbd2cc829';
 * $password='OCqwrqX4mSiR';
 * $url_base='https://gateway.watsonplatform.net';
 * $url_dialog='dialog/api/v1/dialogs';
 * $url_conversation_method='conversation';
 */
function postToDialog($conversation_id, $client_id, $utterance) {
  include './dialogInstance.php';
  $postfields = "conversation_id=$conversation_id&client_id=$client_id&input=$utterance";
  $ch = curl_init("{$url_base}/{$url_dialog}/{$dialog_id}/{$url_conversation_method}");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
  curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
  $json_response = curl_exec($ch);
  $response = json_decode("$json_response", true);
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  if ( $status != 201 ) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch));
  }
  curl_close($ch);
  return $response;
}
?>