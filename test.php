<?php
$poker    = $_GET['poker'] ?? '';
echo ' <form action="/mini_test_poker/test.php">
  Enter poker: <input type="text" name="poker" value="'.$poker.'"><br>
  <input type="submit" value="Submit">
</form> ';


$len    = strlen($poker);
$arrStr = str_split($poker);
$check  = [];
for ($i = 1; $i <= $len; $i = $i + 2) {
    if (count($check) == 0) {
        $check[$arrStr[$i]] = 1;
    } else {
        if (array_key_exists($arrStr[$i], $check)) {
            $check[$arrStr[$i]]++;
        } else {
            $check[$arrStr[$i]] = 1;
        }
    }
}
$check = array_values($check);
switch (count($check)) {
    case 2:
        if ($check[0] == 4 || $check[1] == 4) {
            $result = '4C';
        } else {
            $result = 'FH';
        }
        break;
    case 3:
        if ($check[0] == 3 || $check[1] == 3 || $check[2] == 3) {
            $result = '3C';
        } else {
            $result = '2P';
        }
        break;
    case 4:
        $result = '1P';

        break;
    default:
        $result = 'banana';
        break;
}
echo 'has: ' . $result;

