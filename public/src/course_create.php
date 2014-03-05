<?php include('header.php'); ?>
<body style="padding-top: 70px;">
<div class="container">
    <?php include('navbar.php'); ?>
    <div class="row-fluid">
    <div class="no-js fuelux">

    <div id="my-wizard" class="wizard">
        <ul class="steps">
            <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Description<span class="chevron"></span></li>
            <li data-target="#step2"><span class="badge">2</span>Specification<span class="chevron"></span></li>
            <li data-target="#step3"><span class="badge">3</span>Contribute<span class="chevron"></span></li>
        </ul>
        <div class="actions">
            <button class="btn btn-mini btn-prev"> <i class="icon-arrow-left"></i>Prev</button>
            <button class="btn btn-mini btn-next" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
        </div>
    </div>

    <div class="step-content">
        <div class="step-pane active" id="step1">
            <div class="row-fluid">
                <br/>
            <div class="col-xs-6 col-md-2">
                <label for="about">About:</label>
            </div>
            <div class="col-xs-12 col-md-10">
            <div id="sample">
                <script type="text/javascript" src="../js/nicedit.js"></script> <script type="text/javascript">
                    //<![CDATA[
                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                    //]]>
                </script>
                <textarea name="about" id="about" style="width: 100%;" placeholder="Enter Some text" rows="10">

                </textarea><br />
            </div>
        </div>
                <div class="col-xs-6 col-md-2">
                    <label for="scope">Scope:</label>
                </div>
                <div class="col-xs-12 col-md-10">
                    <textarea name="scope" id="scope" rows="10" style="width: 100%"></textarea>
                </div>
        </div>

           </div>

        <div class="step-pane" id="step2">
            <div class="row-fluid">
            <form action="#" class="form-horizontal">
                <div class="control-group"></div>
                <div class="control-group">
                    <label class="control-label" for="logo">Logo</label>
                    <div class="controls">
                        <input type="file" name="logo" id="logo"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="category">Category</label>
                    <div class="controls">
                        <select name="category" id="category">
                            <option value="">Select category</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="course">Course</label>
                    <div class="controls">
                        <input type="text" name="course" placeholder="Course" id="course"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="language">Language</label>
                    <div class="controls">
                        <select name="category" id="language">
                            <option value="">Select Langauge</option>
                        </select>
                    </div>
                </div>
            </form>

        </div>
    </div>
        <div class="step-pane" id="step3">

            <br/>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>About</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="../img/images.jpg" alt="image" style="width: 75px;height: 75px"/></td>
                    <td>Image 1</td>
                    <td>picture1</td>
                </tr>
                <tr>
                    <td><img src="../img/beautyful.jpg" alt="image" style="width: 75px;height: 75px"/></td>
                    <td>Image 2</td>
                    <td>picture 2</td>
                </tr>
                <tr>
                    <td><img src="../img/index.jpg" alt="image" style="width: 75px;height: 75px"/></td>
                    <td>Image 3</td>
                    <td>picture 3</td>
                </tr>

                </tbody>
            </table>


        </div>
    </div>

    </div>
        </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/loader.min.js"></script>
<script>
function vali()
{
    var a=document.form1.a.value;
    var b=document.form1.b.value;
    var c=document.form1.c.value;
    aletr(a);
}
    $(document).ready(function(){


        $('#my-wizard').on('change', function(e, data) {
            console.log('change');


            if(data.step===3 && data.direction==='next') {
                // return e.preventDefault();

            }
        });

        $('#my-wizard').on('changed', function(e, data) {
            var a=$('#')
            console.log('changed');
        });

        $('#my-wizard').on('finished', function(e, data) {
            console.log('finished');
        });

        $('.btn-prev').on('click', function() {
            console.log('prev');
        });

        $('.btn-next').on('click', function() {
            console.log('next');
        });
    });
</script>
<script type="text/javascript">
    $('#tumbnails').on('click',function(){
        $('#logo').click();
    });
</script>

</body>
</html>