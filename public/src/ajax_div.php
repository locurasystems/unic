<!DOCTYPE html>
<html>
<head>
    <title>ajax div</title>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <style>
        .container {
            margin-top: 1%;
        }

        /*Wizard*/
        .list-group-item.success,
        .list-group-item.success:hover,
        .list-group-item.success:focus {
            background-color: #7aba7b;
            border-color: #7aba7b;
            color: #ffffff;
        }

        .list-group-item.success > h4 {
            color: #ffffff;
        }

        .list-group-item.error,
        .list-group-item.error:hover,
        .list-group-item.error:focus {
            background-color: #d59392;
            border-color: #d59392;
            color: #ffffff;
        }

        .list-group-item.error > h4 {
            color: #ffffff;
        }

    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        loadDataOnReady();
        loadDataOnClick();
        changeSteps();
        nextStep();
        finishWizard(function() {
            //ON FINISH EVENT
        });
    });


    function finishWizard(onFinish) {
        var wizardContent = $('.wizard-content');
        var wizardButtons = $('.wizard-menu .list-group-item');
        var currForm = $('.wizard-content form');

        //Use document.body for dynamically loaded content listening
        $(document.body).on('click', '.wizard-fin', function(event) {
            var finButton = $(this);
            event.preventDefault();
            var currStep = parseInt($(this).attr('data-current-step'));
            //Get previous elements
            var nextStep = $('.step-' + (currStep + 1));
            var nextMenu = $('.step-' + (currStep + 1) + '-menu');
            var thisMenu = $('.step-' + currStep + '-menu');
            var thisStep = $('.step-' + currStep);

            //Update menu
            wizardButtons.removeClass('active');
            nextMenu.addClass('active');

            //Update button
            finButton.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
            finButton.addClass('disabled');

            //AJAX SUBMIT FORM
            var getMethod = currForm.attr('data-method');
            var getAction = currForm.attr('data-action');

            $.ajax({
                url: getAction,
                type: getMethod,
                data: currForm.serialize(),
                success: function() {
                    //AJAX success
                    wizardContent.prepend('<div class="alert alert-success"><strong>That was successful!</strong> Please wait for the next step.</div>');

                    thisMenu.addClass('success');

                    //Update button
                    finButton.html('Finish');
                    finButton.removeClass('disabled');

                    window.setTimeout(function() {
                        //UI
                        $('.alert').hide();

                        //FINISHED WIZARD
                        //FUNCTION HERE
                        onFinish();

                    },500);
                },
                error: function() {
                    //Ajax failure
                    wizardContent.prepend('<div class="alert alert-danger"><strong>Something went wrong!</strong> Please try again.</div>');
                    thisMenu.addClass('error');
                    window.setTimeout(function() {
                        //Get "data-for" attribute and find element
                        var dataLoad = thisStep.attr('data-load');

                        //UI
                        $('.alert').hide();
                        thisMenu.removeClass('error');
                        thisMenu.addClass('active');

                        //Update button
                        finButton.html('Finish');
                        finButton.removeClass('disabled');

                        //        Check if attribute does exist
                        //        If true then load ajax, else load from div
                        if (typeof dataLoad !== 'undefined' && dataLoad !== false)
                        {
                            //Load content ajax
                            wizardContent.load(dataLoad);
                        }
                        else
                        {
                            wizardContent.html(currStep.html());
                        }
                    },2000);
                }
            });

        });
    }


    function nextStep() {
        var wizardContent = $('.wizard-content');
        var wizardButtons = $('.wizard-menu .list-group-item');
        var currForm = $('.wizard-content form');

        //Use document.body for dynamically loaded content listening
        $(document.body).on('click', '.wizard-next', function(event) {
            var prevButton = $(this);
            event.preventDefault();
            var currStep = parseInt($(this).attr('data-current-step'));
            //Get previous elements
            var nextStep = $('.step-' + (currStep + 1));
            var nextMenu = $('.step-' + (currStep + 1) + '-menu');
            var thisMenu = $('.step-' + currStep + '-menu');
            var thisStep = $('.step-' + currStep);
            //Update menu
            wizardButtons.removeClass('active');
            nextMenu.addClass('active');

            //Update button
            prevButton.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
            prevButton.addClass('disabled');

            //AJAX SUBMIT FORM
            var getMethod = currForm.attr('data-method');
            var getAction = currForm.attr('data-action');

            $.ajax({
                url: getAction,
                type: getMethod,
                data: currForm.serialize(),
                success: function() {
                    //AJAX success
                    wizardContent.prepend('<div class="alert alert-success"><strong>That was successful!</strong> Please wait for the next step.</div>');

                    thisMenu.addClass('success');

                    //Update button
                    prevButton.html('Next step');
                    prevButton.removeClass('disabled');

                    window.setTimeout(function() {
                        //Get "data-for" attribute and find element
                        var dataLoad = thisStep.attr('data-load');

                        //UI
                        $('.alert').hide();

                        //        Check if attribute does exist
                        //        If true then load ajax, else load from div
                        if (typeof dataLoad !== 'undefined' && dataLoad !== false)
                        {
                            //Load content ajax
                            wizardContent.load(dataLoad);
                        }
                        else
                        {
                            wizardContent.html(nextStep.html());
                        }
                    },500);
                },
                error: function() {
                    //Ajax failure
                    wizardContent.prepend('<div class="alert alert-danger"><strong>Something went wrong!</strong> Please try again.</div>');
                    thisMenu.addClass('error');
                    window.setTimeout(function() {
                        //Get "data-for" attribute and find element
                        var dataLoad = thisStep.attr('data-load');

                        //UI
                        $('.alert').hide();
                        thisMenu.removeClass('error');
                        thisMenu.addClass('active');

                        //Update button
                        prevButton.html('Next step');
                        prevButton.removeClass('disabled');

                        //        Check if attribute does exist
                        //        If true then load ajax, else load from div
                        if (typeof dataLoad !== 'undefined' && dataLoad !== false)
                        {
                            //Load content ajax
                            wizardContent.load(dataLoad);
                        }
                        else
                        {
                            wizardContent.html(currStep.html());
                        }
                    },2000);
                }
            });

        });
    }


    function changeSteps() {
        var wizardContent = $('.wizard-content');
        var wizardButtons = $('.wizard-menu .list-group-item');

        //Use document.body for dynamically loaded content listening
        $(document.body).on('click', '.wizard-prev', function(event) {
            event.preventDefault();
            var currStep = parseInt($(this).attr('data-current-step'));

            //Get previous elements
            var prevStep = $('.step-' + (currStep - 1));
            var prevMenu = $('.step-' + (currStep - 1) + '-menu');

            //Update menu
            wizardButtons.removeClass('active');
            prevMenu.addClass('active');
            prevMenu.removeClass('success');

            //Get "data-for" attribute and find element

            var dataLoad = prevStep.attr('data-load');

//        Check if attribute does exist
//        If true then load ajax, else load from div
            if (typeof dataLoad !== 'undefined' && dataLoad !== false)
            {
                //Load content ajax
                wizardContent.load(dataLoad);
            }
            else
            {
                wizardContent.html(prevStep.html());
            }
        });
    }

    function loadDataOnReady()
    {
        var wizardContent = $('.wizard-content');
        //Get "data-for" attribute and find element
        var dataFor = $('.wizard-menu .list-group-item.active').attr('data-for');
        var elementFor = $(dataFor);

        var dataLoad = elementFor.attr('data-load');

//        Check if attribute does exist
//        If true then load ajax, else load from div
        if (typeof dataLoad !== 'undefined' && dataLoad !== false)
        {
            //Load content ajax
            wizardContent.load(dataLoad);
        }
        else
        {
            wizardContent.html(elementFor.html());
        }
    }

    function loadDataOnClick()
    {
        var wizardButtons = $('.wizard-menu .list-group-item');
        var wizardContent = $('.wizard-content');

        wizardButtons.on('click', function(event) {
            event.preventDefault();
            //Change active state
            wizardButtons.removeClass('active');
            $(this).addClass('active');


            //Get "data-for" attribute and find element
            var dataFor = $(this).attr('data-for');
            var elementFor = $(dataFor);

            var dataLoad = elementFor.attr('data-load');

//        Check if attribute does exist
//        If true then load ajax, else load from div
            if (typeof dataLoad !== 'undefined' && dataLoad !== false)
            {
                //Load content ajax
                wizardContent.load(dataLoad);
            }
            else
            {
                wizardContent.html(elementFor.html());
            }
        });
    }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group wizard-menu">
                <a href="#" class="list-group-item active step-1-menu" data-for=".step-1">
                    <h4 class="list-group-item-heading">1. Load from DIV</h4>
                    <p class="list-group-item-text">Load your data from a div.</p>
                </a>
                <a href="#" class="list-group-item step-2-menu" data-for=".step-2">
                    <h4 class="list-group-item-heading">2. Load from DIV</h4>
                    <p class="list-group-item-text">Load your data from a div.</p>
                </a>
                <a href="#" class="list-group-item step-3-menu" data-for=".step-3">
                    <h4 class="list-group-item-heading">3. AJAX Load</h4>
                    <p class="list-group-item-text">AJAX-load your data. (Attribute: data-load)</p>
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <!--                Load content in-->
            <div class="well wizard-content">

            </div>
            <!--                Content to load-->
            <div class="hide">
                <div class="step-1">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- add attribute data-action="" and data-method="" with path to file and form-method to submit form -->
                            <form method="post" action="#" data-action="index.php">
                                <div class="form-group">
                                    <label for="inputEx1">E-Mail</label>
                                    <input id="inputEx1" type="text" class="form-control" placeholder="E-Mail" required>
                                </div>
                                <hr>
                                <div class="pull-right wizard-nav">
                                    <button type="submit" class="btn btn-primary wizard-next" data-current-step="1">Next step</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="step-2">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- add attribute data-action="" and data-method="" with path to file and form-method to submit form -->
                            <form method="post" action="#" data-action="path/to/action.php" data-method="POST">
                                <div class="form-group">
                                    <label for="inputEx1">Username</label>
                                    <input id="inputEx1" type="text" class="form-control" placeholder="E-Mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEx2">Password</label>
                                    <input id="inputEx2" type="password" class="form-control" placeholder="Password" required>
                                </div>
                                <hr>
                                <div class="pull-right wizard-nav">
                                    <!-- data-current-step is for going back and forward in wizard -->
                                    <a class="btn btn-default wizard-prev" data-current-step="2">Previous step</a>
                                    <button type="submit" class="btn btn-success wizard-fin" data-current-step="2">Finish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="step-3" data-load="#"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>