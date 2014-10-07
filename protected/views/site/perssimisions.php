<head>
	<meta charset="utf-8">
        
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>
<!--<div class="comingcontainer">
    <div class="checkbacksoon">
         <p class="error">
		Макет "Адміністрування" знаходиться в розробці</p>
		<p>
			<span class="go3d">A</span>
			<span class="go3d">D</span>
			<span class="go3d">M</span>
			<span class="go3d">I</span>
                        <span class="go3d">N</span>
			<span class="go3d">I</span>
			<span class="go3d">S</span>
			<span class="go3d">T</span>
                        <span class="go3d">R</span>
			<span class="go3d">A</span>
                        <span class="go3d">T</span>
			<span class="go3d">I</span>
                        <span class="go3d">O</span>
			<span class="go3d">N</span>
			
		</p>
        
       
	</div>
</div> -->

<div class="administration">
    <aside>
        <button>Права</button>
        <button>Ролі</button>
        <button>Користувачі</button>
    </aside>
    <div id="content-perssimisions">
        <div id="add-presimision">
            <button>Add</button>
        </div>
        <div id="perssimisions">
            <?php for($i=0;$i<7;$i++) { ?>
            <form class="perssimisions-form">
                <input type="text" value="alias">
                <input type="text" value="module">
                <input type="text" value="action">
                <div class="invisible">&nbsp;</div>
                <input class="button-del" type="submit" value="Del">
            </form>
            <?php } ?>
        </div>
         <div class="pagination-link">  
            <ul>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">6</a></li>
                <li><a href="">7</a></li>
            </ul>
         </div>
    </div>
</div>

</body>
</html>