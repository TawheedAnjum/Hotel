<?php

function start_date($room_id)
{
    $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

    $sql = "SELECT * FROM date WHERE room_id='$room_id'";
    $result = $conn->query($sql);

    $push = array();

    while ($row = $result->fetch_assoc()) {
        $start = $row['checkin'];
        $end = $row['checkout'];

        $start_day_num = date('d', strtotime($start));
        $end_day_num = date('d', strtotime($end));

        $m = date('m', strtotime($start));
        $e = date('m', strtotime($end));

        $month = date('m');
        $day = date('d');

        // last day
        $month = date('m');
        $dateToTest = "2020-" . $month . "-01";
        $lastday = date('t', strtotime($dateToTest));
        $find_date = "2020-" . $month . "-" . $lastday;

        if ($m == $month) {
            if ($start_day_num >= $day && $end_day_num > $day && $m == $e) {
                for ($i = $start_day_num; $i <= $end_day_num; $i++) {
                    array_push($push, $i);
                }
            } elseif ($start_day_num <= $day && $end_day_num >= $day && $m == $e) {
                for ($i = $day; $i <= $end_day_num; $i++) {
                    array_push($push, $i);
                }
            } elseif ($m != $e) {
                for ($i = $start_day_num; $i <= $lastday; $i++) {
                    array_push($push, $i);
                }
            }
        }
    }
    return $push;
}

?>


<script>
    var d = new Date();
    var m = 5;

    function curr_date(room_id) {
        d.setDate(1);
        var day = d.getDay();

        var endDate = new Date(
            d.getFullYear(),
            d.getMonth() + 1,
            0
        ).getDate();

        var prevDate = new Date(
            d.getFullYear(),
            d.getMonth(),
            0
        ).getDate();

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById("month").innerHTML = months[d.getMonth()];
        document.getElementById("time").innerHTML = d.toDateString();

        var cells = "";

        var start_date = <?php echo json_encode(start_date('room_id')) ?>;
        s = 0;

        // prev month
        for (x = day; x > 0; x--) {
            cells += "<div class='past'>" + (prevDate - x + 1) + "</div>";
        }

        // corrent month
        for (i = 1; i <= endDate; i++) {

            if (i == start_date[s]) {
                cells += "<div style='color:red;'>" + i + "</div>";
                s++;
            } else {
                cells += "<div>" + i + "</div>";
            }
        }

        document.getElementsByClassName("day")[0].innerHTML = cells;

    }

    function moveDate(p) {
        if (p == 'next') {
            next_date();
        }
        if (p == 'back') {
            curr_date();
        }
    }
</script>



<?php

function end_date()
{
    $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

    $sql = "SELECT * FROM date WHERE room_id=1";
    $result = $conn->query($sql);

    $push = array();

    while ($row = $result->fetch_assoc()) {
        $start = $row['checkin'];
        $end = $row['checkout'];

        $start_day_num = date('d', strtotime($start));
        $end_day_num = date('d', strtotime($end));

        $m = date('m', strtotime($start));
        $e = date('m', strtotime($end));
        $month = date('m');

        // $monthNum = $m;
        // $dateObj = DateTime::createFromFormat('!m', $monthNum);
        // $monthName = $dateObj->format('F');

        if ($m == $month + 1) {
            if ($m == $e) {
                for ($i = $start_day_num; $i <= $end_day_num; $i++) {
                    array_push($push, $i);
                }
            } else {
                for ($i = 1; $i <= $end_day_num; $i++) {
                    array_push($push, $i);
                }
            }
        }
    }
    return $push;
}


?>


<script>
    function next_date() {
        var year = d.getFullYear();
        var month = d.getMonth() + 2;
        var day = new Date(year + "-" + month + "-01").getDay();

        var endDate = new Date(
            d.getFullYear(),
            d.getMonth() + 2,
            0
        ).getDate();

        var prevDate = new Date(
            year,
            d.getMonth() + 1,
            0
        ).getDate();

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById("month").innerHTML = months[d.getMonth() + 1];
        document.getElementById("time").innerHTML = d.toDateString();

        var cells = "";

        var start_date = <?php echo json_encode(end_date()) ?>;
        s = 0;

        // prev month
        for (x = day; x > 0; x--) {
            cells += "<div class='past'>" + (prevDate - x + 1) + "</div>";
        }

        // corrent month
        for (i = 1; i <= endDate; i++) {

            if (i == start_date[s]) {
                cells += "<div style='color:red;'>" + i + "</div>";
                s++;
            } else {
                cells += "<div>" + i + "</div>";
            }
        }

        document.getElementsByClassName("day")[0].innerHTML = cells;

    }
</script>