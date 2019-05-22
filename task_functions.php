<?php
/**
 * filename: task_functions.php
 * description: this file contains functions for reading, writing and displaying tasks
 *
 */

function get_tasks($filename)
{
        $tasks = [];
        $row = 0;
        if (($handle = fopen($filename, "r")) !== FALSE) {   // this line opens a file and returns a resource
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  // the handle is the resource that was opened by fopen
                    $tasks[$row] = [
                            'description'=>$data[0],
                            'completed' => $data[1],
                            'date_created' => $data[2],
                            'date_completed' => $data[3]
                    ];
                    $row++;
            }
            fclose($handle);
        }
        return $tasks;
}


function print_task($task)
{
        // There should be 4 fields in each "row" of the array
        print "Description: " . $task['description'] . '<br>';
        print "Completed: " . $task['completed'] . '<br>';
        print "Date created: " . $task['date_created'] . '<br>';
        print "Date completed: " . $task['date_completed'] . '<br>';
        print "---------------<br>";
}

function display_csv_file($filename)
{
        $tasks = get_tasks($filename);
        for($row = 0;$row<count($tasks);$row++)
        {
           print_task($tasks[$row]);
        }
}


?>
