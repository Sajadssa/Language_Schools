<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>France</title>

    <style>
        table {

            width: 50%;
            z-index: 1;
            border-collapse: collapse;
            color: black;
            margin: 4rem auto;
            padding: 1rem;

            border: 1px solid white;
            backdrop-filter: blur(3px) saturate(70%);
            -webkit-backdrop-filter: blur(5px) saturate(1%);
            background-color: rgba(17, 25, 40, 0.3);

            font-size: 12px;

        }

        td:hover {
            background-color: rgba(1, 2, 111, 0.5);
        }

        table,
        th,
        td,
        tr,
        thead {
            border: 1px solid white;
            font-size: 14px;
            color: white;


        }

        th {
            background-color: rgba(0, 0, 0, 0.6)
        }

        td {
            padding: 0 .5rem;
        }
    </style>

    </style>
</head>

<body>
    <?php include 'NavBar.php' ?>
    <h1>english</h1>
    <section class="hero">
        <div class="hero-inner">
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
                        $query = "SELECT * FROM courses WHERE Course_NAME LIKE N'%فرانسه%'";
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

        </div>
    </section>



</body>

</html>