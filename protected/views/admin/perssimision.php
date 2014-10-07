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
