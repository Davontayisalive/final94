<?php

require_once('task_functions.php');

display_csv_file('tasks.csv');

$tasks = get_tasks('tasks.csv');

display_tasks($tasks);

