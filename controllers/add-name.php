<?php
$parameters = $_REQUEST;
App::get('database')->insert('user',$parameters);


