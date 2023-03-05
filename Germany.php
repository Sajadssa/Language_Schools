<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Germany</title>


</head>

<body>
    <?php include 'NavBar.php' ?>

    <section class="hero">
        <div class="hero-inner">
            <h1>دوره های زبان آلمانی</h1>
            <!--  germany course-->

            <!-- table -->
            <div class="container-bcontent">

                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام دوره</th>
                            <th>روز وساعت تشکیل کلاس</th>
                            <th>قیمت دوره</th>
                            <th>تعداد جلسه در هفته</th>
                            <th>کل دوره</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("Server.php");
                        $query = "SELECT * FROM courses WHERE Course_NAME LIKE N'%آلمانی%'";
                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <tr class="table-dark">
                            <td><?php echo $row['id_Crs']; ?></td>
                            <td><?php echo $row['Course_Name']; ?></td>
                            <td><?php echo $row['Day_of_Hold']; ?></td>
                            <td><?php echo $row['Cost']; ?></td>
                            <td><?php echo $row['Count_of_Week']; ?></td>
                            <td><?php echo $row['Course_of_Length']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <a href="UserPanel.php" style="text-decoration: none;color:white;"><button class="btn">ثبت نام</button> </a>


        </div>
    </section>



</body>

</html>