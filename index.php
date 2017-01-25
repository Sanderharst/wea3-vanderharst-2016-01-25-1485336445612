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
 * index.php written by Ray.Lopez@us.ibm.com
 * 
 * This file is used to initiate a dialog session.  It makes use of the file
 * watsonDialog.php which contains the function postToDialog(), which 
 * is the code that communicates with the REST API of a dialog instance 
 * configured in the file dialogInstance.php.  Once a dialog session is
 * initiated the script calls file sessionDialog.php.
 */
session_start();
include './watsonDialog.php';
$response = postToDialog("", "", "Hello.");
$_SESSION["session_conversation_id"] = $response["conversation_id"];
$_SESSION["session_client_id"] = $response["client_id"];
header('Location: ./sessionDialog.php');
?>
