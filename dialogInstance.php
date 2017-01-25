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
 * dialogInstance.php written by Ray.Lopez@us.ibm.com
 * 
 * This file is used to store variables needed by watsonDialog.php to
 * connect with a specific dialog instance.
 *
 * Set the following values with the values for your dialog instance:
 *  $dialog_id
 *  $username
 *  $password
 *
 * For example:
 *  $dialog_id='9911ff0d-e3b8-44a5-8fc6-529355e533d8'
 *  $username='03c5eb78-66de-4032-8663-5c6fbd2cc829'
 *  $password='OCqwrqX4mSiR'
 */

$dialog_id='9911ff0d-e3b8-44a5-8fc6-529355e533d8';
$username='03c5eb78-66de-4032-8663-5c6fbd2cc829';
$password='OCqwrqX4mSiR';

// Vars below should not be changed unless you know what you're doing :-)

$url_base='https://gateway.watsonplatform.net';
$url_dialog='dialog/api/v1/dialogs';
$url_conversation_method='conversation';

?>