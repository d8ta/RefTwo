<?php $jsFile = 'assets/js/main.min.js'; ?>

<script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js">\x3C/script>')</script>

<script type="text/javascript" src="{!!$jsFile!!}?{!!filemtime(ABSPATH.$jsFile)!!}"></script>