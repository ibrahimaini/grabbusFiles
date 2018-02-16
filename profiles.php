<?php 
include_once('server.php');

  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title> Home </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/selectize.js"></script>
        <script src="js/index.js"></script>

        <style type="text/css">
            .from-station .scientific {
                font-weight: normal;
                opacity: 0.3;
                margin: 0 0 0 2px;
            }
            
            .from-station .scientific::before {
                content: '(';
            }
            
            .from-station .scientific::after {
                content: ')';
            }
            
            .select-drop {
                border: 1px solid #d3dce6;
                font-size: 14px;
                font-family: 'Titillium Web';
                border-radius: 3px !important;
                width: 100%;
            }
        </style>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php include 'nav1.php'; ?>

                    <div class="col-lg-12" style="padding: 0px;">
                        <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center header item animated bounceInDown pb-5">
                                        <p></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="container">
                    <form action="profiles.php" id="" method="POST">
                        <?php include('errors.php'); ?>
                            <div class="row search-row">
                                <div class="col-lg-12 pl-2 pb-3">
                                    <div class="form-check row">
                                        <label class="form-check-label pr-2">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked> One way
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option1"> Return
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12" id="okk">
                                    <div class="demo">
                                        <span class="select-header">FROM (start point) <span class="star">*</span></span>
                                        <div class="control-group">
                                            <select id="from-station" class="from-station" placeholder="Select a Departure Point" name="from-station"></select>
                                        </div>
                                        <script>
                                            $('#from-station').selectize({
                                                options: [{
                                                    class: 'mammal',
                                                    value: "dog",
                                                    name: "Dog"
                                                }, {
                                                    class: 'mammal',
                                                    value: "cat",
                                                    name: "Cat"
                                                }, {
                                                    class: 'mammal',
                                                    value: "horse",
                                                    name: "Horse"
                                                }, {
                                                    class: 'mammal',
                                                    value: "kangaroo",
                                                    name: "Kangaroo"
                                                }, {
                                                    class: 'bird',
                                                    value: 'duck',
                                                    name: 'Duck'
                                                }, {
                                                    class: 'bird',
                                                    value: 'chicken',
                                                    name: 'Chicken'
                                                }, {
                                                    class: 'bird',
                                                    value: 'ostrich',
                                                    name: 'Ostrich'
                                                }, {
                                                    class: 'bird',
                                                    value: 'seagull',
                                                    name: 'Seagull'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'snake',
                                                    name: 'Snake'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'lizard',
                                                    name: 'Lizard'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'alligator',
                                                    name: 'Alligator'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'turtle',
                                                    name: 'Turtle'
                                                }],
                                                optgroups: [{
                                                    value: 'mammal',
                                                    label: 'Mammal',
                                                    label_scientific: 'Mammalia'
                                                }, {
                                                    value: 'bird',
                                                    label: 'Bird',
                                                    label_scientific: 'Aves'
                                                }, {
                                                    value: 'reptile',
                                                    label: 'Reptile',
                                                    label_scientific: 'Reptilia'
                                                }],
                                                optgroupField: 'class',
                                                labelField: 'name',
                                                searchField: ['name'],
                                                render: {
                                                    optgroup_header: function(data, escape) {
                                                        return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                                    <div class="demo">
                                        <span class="select-header">To (destination) <span class="star">*</span></span>
                                        <div class="control-group">
                                            <select id="to-station" class="to-station" placeholder="Select a Destination" name="to-station"></select>
                                        </div>
                                        <script>
                                            $('#to-station').selectize({
                                                options: [{
                                                    class: 'mammal',
                                                    value: "dog",
                                                    name: "Dog"
                                                }, {
                                                    class: 'mammal',
                                                    value: "cat",
                                                    name: "Cat"
                                                }, {
                                                    class: 'mammal',
                                                    value: "horse",
                                                    name: "Horse"
                                                }, {
                                                    class: 'mammal',
                                                    value: "kangaroo",
                                                    name: "Kangaroo"
                                                }, {
                                                    class: 'bird',
                                                    value: 'duck',
                                                    name: 'Duck'
                                                }, {
                                                    class: 'bird',
                                                    value: 'chicken',
                                                    name: 'Chicken'
                                                }, {
                                                    class: 'bird',
                                                    value: 'ostrich',
                                                    name: 'Ostrich'
                                                }, {
                                                    class: 'bird',
                                                    value: 'seagull',
                                                    name: 'Seagull'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'snake',
                                                    name: 'Snake'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'lizard',
                                                    name: 'Lizard'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'alligator',
                                                    name: 'Alligator'
                                                }, {
                                                    class: 'reptile',
                                                    value: 'turtle',
                                                    name: 'Turtle'
                                                }],
                                                optgroups: [{
                                                    value: 'mammal',
                                                    label: 'Mammal',
                                                    label_scientific: 'Mammalia'
                                                }, {
                                                    value: 'bird',
                                                    label: 'Bird',
                                                    label_scientific: 'Aves'
                                                }, {
                                                    value: 'reptile',
                                                    label: 'Reptile',
                                                    label_scientific: 'Reptilia'
                                                }],
                                                optgroupField: 'class',
                                                labelField: 'name',
                                                searchField: ['name'],
                                                render: {
                                                    optgroup_header: function(data, escape) {
                                                        return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="demo">
                                        <span class="select-header">Line <span class="star">*</span></span>
                                        <select id="select-beast" class="demo-default" placeholder="Select the line">
                                            <option value="">Select a person...</option>
                                            <option value="4">Thomas Edison</option>
                                            <option value="1">Nikola</option>
                                            <option value="3">Nikola Tesla</option>
                                            <option value="5">Arnold Schwarzenegger</option>
                                        </select>
                                    </div>
                                    <script>
                                        $('#select-beast').selectize({
                                            create: true,
                                            sortField: {
                                                field: 'text',
                                                direction: 'asc'
                                            },
                                            dropdownParent: 'body'
                                        });
                                    </script>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <span class="select-header">Departure Date <span class="star">*</span></span>
                                        <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control date-form" size="13" type="text" value="" readonly placeholder="Select Date" name="travel-date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="" />
                                        <br/>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12 return-date" id="return-date">
                                    <div class="form-group">
                                        <span class="select-header">Return Date <span class="star">*</span></span>
                                        <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control date-form" size="13" type="text" value="" readonly placeholder="Select Date" name="return-date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="" />
                                        <br/>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    Seats Total:
                                    <input type="number" name="seats-total" min="1">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    Check Boxes
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    test
                                </div>

                                <div class="col-lg-4"></div>

                                <!-- <div class="col-lg-4 pt-2 pb-3 text-center">
                <a href="result.php"><button class="btn btn-search"><i class="fa fa-search pr-3"></i>Search Buses</button></a>
            </div> -->
                                <div class="col-lg-4 pt-2 pb-3 text-center">
                                    <a href="#">
                                        <button class="btn" name="book" id="" type="submit">Book</button>
                                    </a>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                    </form>
                </div>
            </div>

            <div class="row pt-5" id="mine">
                <div class="col-lg-12 text-center p-5">

                </div>
            </div>

        </div>

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/tether.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>

        <script type="text/javascript">
            $('.form_datetime').datetimepicker({
                //language:  'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
            $('.form_date').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
            $('.form_time').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
            });
        </script>

    </body>

    </html>