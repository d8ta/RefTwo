<?php $compFile = 'assets/js/compatibility.min.js'; ?>
<?php $jsFile = 'assets/js/main.min.js'; ?>


<!--[if lt IE 9]>
    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.4.min.js">\x3C/script>')</script>
<![endif]-->
<!--[if gte IE 9]><!-->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js">\x3C/script>')</script>
<!--<![endif]-->


<script type="text/javascript" src="{!!$compFile!!}?{!!filemtime(ABSPATH.$compFile)!!}"></script>
<script type="text/javascript" src="{!!$jsFile!!}?{!!filemtime(ABSPATH.$jsFile)!!}"></script>