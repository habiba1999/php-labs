<?php
$counter = new Counter();
$counter-> increment_and_update();
$count= $counter->get_count();
echo "<h2> count = $count </h2>";
