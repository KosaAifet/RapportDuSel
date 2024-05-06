<?php
function age($ddn)
{
    $today = date("y-m-d");
    $diff = date_diff(date_create($ddn), date_create($today));
    return $diff->format('%y');
}
?>