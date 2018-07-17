<?php
function printRow($stmt){
    $id=0;
        foreach($stmt as $row){
            $id++;
            echo <<<ROW
                    <tr>
                      <th scope="row">{$id}.</th>
                      <td>{$row["task_date"]}</td>
                      <td>{$row["task_content"]}</td>
                      <td><a href="{$row["link"]}">{$row["link"]}</a></td>
                      <td>Progress: {$row["task_total"]} / {$row["task_todo"]}</td>
                      <td><a href="editform.php?task_id={$row["task_id"]}">Edit</a><br>
                        <a href="delete.php?id={$row["task_id"]}">Delete</a></td>
                    </tr>
ROW;
        }
    }
 ?>
