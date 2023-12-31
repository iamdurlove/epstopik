<?php
session_start();

if (empty($_POST['time']) && empty($_POST['limit']) && empty($_POST['category_id']) && !is_numeric($_POST['limit']) && !is_numeric($_POST['subcategory_id']) && !is_numeric($_POST['category_id'])) {
    header("location:self-challenge.php");
}
if (!isset($_POST['subcategory_name']) && !isset($_POST['time']) && !isset($_POST['limit']) && !isset($_POST['subcategory_id']) && !isset($_POST['category_id'])) {
    header("location:self-challenge.php");
} else {
    $limit = $_POST['limit'];
    $time = $_POST['time'];
    if (!empty($_POST['subcategory_name'])) {
        $subcategory_name = $_POST['subcategory_name'];
    } else {
        $subcategory_name = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Playing Self Challenge</title>
    <?php include('include-css.php'); ?>
</head>

<body class="bg-content-color">
    <!-- Preloader -->
    <div id="preloader">
        <div id="loader-img">
        </div>
    </div>
    <!--  -->


    <!-- <?php include('header.php'); ?> -->

    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3721550276209372"
        crossorigin="anonymous"></script>
 -->
    <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3721550276209372" data-ad-slot="3661470847"
        data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script> -->


    <style>
    .options-menu {
        height: auto;
    }
    </style>



    <div class="wapper">
        <div style="width: 100vw!important; ">
            <div style="width:100%!important;" class="row justify-content-center">
                <div style="width:100% !important; padding: 0 1%;" class="justify-content-center">

                    <!-- <div class="row mt-4 justify-content-center">
                        <nav class="quiz">
                            <ol class="breadcrumb text-bold background-white">
                                <li class="breadcrumb-item" id="catname">Category</li>
                                <?php if (!empty($_POST['subcategory_name'])) { ?>
                                <li class="breadcrumb-item" id="subname">Subcategory</li>
                                <?php } ?>
                            </ol>
                        </nav>
                    </div> -->

                    <div style=" height:7vh; display: flex; justify-content:space-evenly; align-items:center;"
                        class="shadow-box-quiz">
                        <div class="">
                            Que: <span id="attempted_question"></span>/<span id="total_question"></span>
                        </div>
                        <div style="display: flex; align-items:center; " class="">
                            <div style="display: flex; align-items:center; ">
                                <div style="margin-right: 4px;">
                                    Time Remaining:
                                </div>
                                <div id="app"></div>
                            </div>
                        </div>
                        <div class="add-cursor" id="submitData">
                            <span class="border border-light">Submit</span>
                        </div>
                    </div>


                    <div style="display: flex!important;" class="own-container">


                        <div style="width: 60%!important;" class="split right">
                            <div class="question-box">

                                <div id="my-fonts-questions">
                                </div>
                                <div style="margin: auto;" id="questionsimg">
                                </div>
                            </div>
                        </div>


                        <div style="width: 40%!important; " class="options-container" style="width: 100%;">

                            <div style="height:60vh!important;" class="split left">
                                <div style="height:60vh!important;" class="question-box2" style=" margin-top: 15px;">

                                    <div class="button-container-whole"
                                        style="display: flex; align-items:center; width:100%; ">
                                        <div class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="a">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <div class="td_q quizing-op"><span>a</span></div>
                                                            <!-- <div class="td_q questions-options-td">
                                                            </div> -->
                                                            <div class="td_q">
                                                                <div class="progress" id="p1"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-01" value="a" />
                                            </label>
                                        </div>
                                        <div style="width: 100%;" class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="a">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <!-- <div class="td_q quizing-op"><span>a</span></div> -->
                                                            <div class="td_q questions-options-td">
                                                                <span id="option_a" class="my-fonts"></span>
                                                            </div>
                                                            <div class="td_q">
                                                                <div class="progress" id="p1"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-01" value="a" />
                                            </label>
                                        </div>

                                    </div>




                                    <div class="button-container-whole"
                                        style="display: flex; align-items:center; width:100%; ">
                                        <div class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="b">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <div class="td_q quizing-op"><span>b</span></div>
                                                            <!-- <div class="td_q questions-options-td">
                                                            </div> -->
                                                            <div class="td_q">
                                                                <div class="progress" id="p2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-02" value="b" />
                                            </label>
                                        </div>
                                        <div style="width: 100%;" class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="b">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <!-- <div class="td_q quizing-op"><span>a</span></div> -->
                                                            <div class="td_q questions-options-td">
                                                                <span id="option_b" class="my-fonts"></span>
                                                            </div>
                                                            <div class="td_q">
                                                                <div class="progress" id="p2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-02" value="b" />
                                            </label>
                                        </div>

                                    </div>



                                    <div class="button-container-whole"
                                        style="display: flex; align-items:center; width:100%; ">
                                        <div class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="c">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <div class="td_q quizing-op"><span>c</span></div>
                                                            <!-- <div class="td_q questions-options-td">
                                                            </div> -->
                                                            <div class="td_q">
                                                                <div class="progress" id="p3"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-03" value="c" />
                                            </label>
                                        </div>
                                        <div style="width: 100%;" class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="c">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <!-- <div class="td_q quizing-op"><span>a</span></div> -->
                                                            <div class="td_q questions-options-td">
                                                                <span id="option_c" class="my-fonts"></span>
                                                            </div>
                                                            <div class="td_q">
                                                                <div class="progress" id="p3"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-03" value="c" />
                                            </label>
                                        </div>

                                    </div>


                                    <div class="button-container-whole"
                                        style="display: flex; align-items:center; width:100%; ">
                                        <div class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="d">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <div class="td_q quizing-op"><span>d</span></div>
                                                            <!-- <div class="td_q questions-options-td">
                                                            </div> -->
                                                            <div class="td_q">
                                                                <div class="progress" id="p4"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-04" value="d" />
                                            </label>
                                        </div>
                                        <div style="width: 100%;" class=" options-menu">
                                            <label class="shadow-box-options quizing-options" id="d">
                                                <div class="table_q">
                                                    <div class="tbody_q">
                                                        <div class="tr_q">
                                                            <!-- <div class="td_q quizing-op"><span>a</span></div> -->
                                                            <div class="td_q questions-options-td">
                                                                <span id="option_d" class="my-fonts"></span>
                                                            </div>
                                                            <div class="td_q">
                                                                <div class="progress" id="p4"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="hiddenRadioButton" name="sample-radio"
                                                    id="radio-04" value="d" />
                                            </label>
                                        </div>

                                    </div>




                                </div>
                            </div>












                        </div>

                    </div>

                    <style>
                    .buttons-container {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 2%;

                        & button {
                            text-align: center;
                            color: white;
                            font-size: 1em;
                            background-color: #1D6CBA;
                            border-radius: 10px;
                            height: 40px;
                            /* padding: 5%; */


                        }
                    }
                    </style>


                    <div class="buttons-container">
                        <div id="ar-left" class="prev-button">
                        </div>
                        <div id="ar-right" class="next-button">

                        </div>
                    </div>

                    <!-- <div style="display:flex; justify-content: space-between;"
                        class="row justify-content-space-evenly text-center pb-2">
                        <div class="col-3 col-md-2 shadow-box-theme add-cursor" id="ar-left">

                            Prev
                        </div>
                        <div class="col-3 col-md-2 shadow-box-theme add-cursor" id="ar-right">

                            Next
                        </div>
                    </div> -->
                </div>

            </div>
        </div>

        <!-- <?php include('footer.php'); ?> -->

        <script type="text/javascript">
        window.limit = "<?= htmlspecialchars($_POST['limit']) ?>";
        window.category_id = "<?= htmlspecialchars($_POST['category_id']) ?>";
        window.sub_id = "<?= htmlspecialchars($_POST['subcategory_id']) ?>";
        window.time = "<?= htmlspecialchars($_POST['time']) ?>";
        window.sub_name = "<?= htmlspecialchars($subcategory_name) ?>";
        window.challage_time = "<?= htmlspecialchars($_POST['time']) ?>";
        </script>

        <script src="assets/js/pages/self-challenge-quiz.js"></script>

</body>

</html>