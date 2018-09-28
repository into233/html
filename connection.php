<?php
$link = mysqli_connect('localhost', 'root', '123456', 'hrm') or die(mysqli_connect_error());

if (!$link) {
    printf("can't connect to mysql server.errorcode:%s", mysqli_connect_error());
    exit;
} else {
    echo '数据库连接上了!' . "<br/>";
}

if ($result = mysqli_query($link, 'select * from salary'));
{
    echo "
    <table>
    <tr>
    <td>sno<td/>
    <td>name<td/>
    <td>max_score<td/>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['EmployeeID'] . "<td/>" .
            "<td>" . $row['Income'] . "<td/>" .
            "<td>" . $row['Outcome'] . "<td/><tr/>";
    }
    echo '<table/>';
    mysqli_free_result($result);

}
mysqli_close($link);
