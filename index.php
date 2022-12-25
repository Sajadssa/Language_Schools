<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Schools</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

</head>

<body>
    <!-- header navigation -->
    <!-- header.header>nav.nav_container>ul.nav_link>li.nav_item*5>a -->
    <header>
        <nav class="nav_container">

            <div class=" toggler">
                <div class="bar bar-one"></div>
                <div class="bar bar-two"></div>
                <div class="bar bar-three"></div>
            </div>
            <div class="logo">


                <img src="./assets/images/logo.jpg" alt="logo" />
            </div>

            <ul class="nav_link">
                <li class="nav_item"><a href="#Home">خانه</a></li>
                <div class="subnav">
                    <button class="subnavbtn">دوره ها <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="#English">زبان انگلیسی</a>
                        <a href="#Germany">زبان آلمانی</a>
                        <a href="#France">زبان فرانسه</a>
                    </div>
                </div>
                <li class="nav_item"><a href="About.php">درباره ما </a></li>
                <li class=" nav_item"><a href="Contact.php"> ارتباط با ما</a></li>

                <li class="nav_item user" <a href="#loginForm"> ورود</a></li>
            </ul>


        </nav>
    </header>
    <!--  end of header navigation -->
    <!-- main -->
    <section id="Home">

        <main class="main">
            <!----------------- banner--------------------------------- -->
            <div class="banner">
                <img src="./assets/images/banner.jpg" alt="banner" />
                <!-- <h3 class="main h3"> Haniyeh Academy Languages</h3> -->
            </div>
        </main>
    </section>
    <!--  end of main -->
    <!-- login form-->
    <section id="loginForm">

        <div class="log_form_Container">
            <form action="#">
                <h1 class="log_title">فرم ورود</h1>

                <label for="user">نام کاربری

                </label>
                <input type="text" name="username" id="user" Placeholder="نام کاربری" required>

                <label for="password">رمز عبور

                </label>
                <input type="password" name="password" id="password" Placeholder=" رمز عبور" required>
                <div class="btns">

                    <button type="submit" class="btn input">ورود</button>
                    <button type="button" class="btn newuser">عضویت </button>
                    <i class="fa fa-close-alt"></i>
                </div>

            </form>
        </div>
    </section>
    <!--end of login form  -->
    <!-- english section -->
    <section id="English">
        <h1>english</h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum suscipit cupiditate dolores dicta veniam maiores
        totam! Eligendi totam iste neque repellat sequi. Sapiente est quas voluptates eaque aut, nemo praesentium.
    </section>
    <!--  end of english section -->
    <!-- Germany section -->
    <section id="Germany">
        <h1>Germany</h1>
    </section>
    <!--  end of Germany section -->
    <!-- France section -->
    <section id="France">
        <h1>France</h1>
    </section>
    <!--  end of France section -->



</body>

</html>