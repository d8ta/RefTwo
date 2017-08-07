<?php $jsFile = 'assets/js/main.min.js'; ?>
<?php $compFile = 'assets/js/compatibility.min.js'; ?>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js">\x3C/script>')</script>

<script type="text/javascript" src="{!!$compFile!!}?{!!filemtime(ABSPATH.$compFile)!!}"></script>
<script type="text/javascript" src="{!!$jsFile!!}?{!!filemtime(ABSPATH.$jsFile)!!}"></script>