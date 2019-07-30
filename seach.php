<?php
$customer_list = array(
    "0" => array("name" => "Mai Văn Hoàn", "day_of_birth" => "1983/08/26", "address" => "Hà Nội"),
    "1" => array("name" => "Nguyễn Văn Nam", "day_of_birth" => "1963/12/15", "address" => "Bắc Giang"),
    "2" => array("name" => "Nguyễn Thái Hòa", "day_of_birth" => "1999/6/26", "address" => "Nam Định"),
    "3" => array("name" => "Trần Đăng Khoa", "day_of_birth" => "1775/3/12", "address" => "Hà Tây"),
    "4" => array("name" => "Nguyễn Đình Thi", "day_of_birth" => "1995/12/11", "address" => "Hà Nội")
);
$from_date = $_REQUEST['from'];
$to_date = $_REQUEST['to'];

$last_customers = array();

function seach($customer_list, $from_date, $to_date)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($from_date) && empty($to_date)) {
            return $customer_list;
        }
    }
    global $last_customers;
    foreach ($customer_list as $key => $value) {
        if (strtotime($value['day_of_birth']) <= strtotime($to_date) && strtotime($value['day_of_birth']) >= strtotime($from_date)) {
            array_push($last_customers, $value);

        }
    }
    return $last_customers;
}

seach($customer_list, $from_date, $to_date);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    h1 {
        color: red;
        margin-left: 700px;
        margin-top: 50px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
<body>
<h1>Danh sách khách hàng</h1>
<table border="0">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
    </tr>
    <?php
    if (!empty($from_date) && !empty($to_date)) {
        foreach ($last_customers as $key => $value) {
            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $value[name] . "</td>";
            echo "<td>" . $value[day_of_birth] . "</td>";
            echo "<td>" . $value[address] . "</td>";
            echo "</tr>";
        }
    }
    if (empty($from_date) && empty($to_date)) {
        foreach ($customer_list as $key => $value) {
            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $value[name] . "</td>";
            echo "<td>" . $value[day_of_birth] . "</td>";
            echo "<td>" . $value[address] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
</body>
</html>
