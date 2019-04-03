<?php
// TERANEX DEV
/* 
* Solution to list with hierarchy using self-relation
* Found here: http://stackoverflow.com/questions/7730889/hierarchy-commenting-system-php
* */

// getting the comments from mysql, I'm obviously not bothering
//   to check the return value, but in your code you should do it
/* $result = mysqli_query("SELECT id, parent FROM comments WHERE thread_id = 123");

$comments = array();
while ($row = mysqli_fetch_array($result)) {
  $row['childs'] = array();
  $comments[$row['id']] = $row;
} */

// This is the array you get after your mysql query
// Order is non important, I put the parents first here simply to make it clearer.

$comments = array(
    // some top level (parent == 0)
    41 => array('id' => 1, 'parent' => 0),
    42 => array('id' => 2, 'parent' => 41),
    // and some childs
    43 => array('id' => 3, 'parent' => 0),
   45 => array('id' => 5, 'parent' => 0),
    46 => array('id' => 6, 'parent' => 0),
    44 => array('id' => 4, 'parent' => 0),
    47 => array('id' => 7, 'parent' => 0),
    48 => array('id' => 8, 'parent' => 0),
    49 => array('id' => 9, 'parent' => 0),
    50 => array('id' => 10, 'parent' =>0),
);

echo "<pre>";
	print_r($comments);
echo "</pre>";
// now loop your comments list, and everytime you find a child, push it 
//   into its parent
foreach ($comments as $k => &$v) {
  if ($v['parent'] != 0) {
    $comments[$v['parent']]['childs'][] =& $v;
  }
}
unset($v);

// delete the childs comments from the top level
foreach ($comments as $k => $v) {
  if ($v['parent'] != 0) {
    unset($comments[$k]);
  }
}
echo "<pre>";
	print_r($comments);
echo "</pre>";
// now we display the comments list, this is a basic recursive function
function display_comments(array $comments, $level = 0) {
  foreach ($comments as $info) {
    echo str_repeat('-', $level + 1).' comment '.$info['id']."</br>";
    if (!empty($info['childs'])) {
      display_comments($info['childs'], $level + 1);
    }
  }
}

display_comments($comments);