<?php 
if ($_SESSION['cargo'] == 0) {

}
else {
?>    
    <a href="mis_pedidos.php"><div class="ver_pedidos">
        <div style="vertical-align: middle; margin: 10px 10px 10px 10px;">
            <img style="float: left; height: calc(100% - 20px);" src="../multimedia/pedidos.png"><div style="float: right; width: auto; text-align: center;">Ver pedidos</div>
        </div>
    </div></a>
<?php
}
?>