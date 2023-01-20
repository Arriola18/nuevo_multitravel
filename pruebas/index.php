<html>
    <body>
        <form id="y" method="post">
            <select name='number' onchange="Submit()">
                <option>1</option>
                <option>2</option>
                <option>4</option>
            </select>
        </form>
        <div id="g">g
            <?php
            echo $_POST['number'];
            $hh = $_POST['number']; 
            ?>
        </div>
            <?php
            
            if ($hh != (1 or 2 or 4)) {
            ?>
                <script type="text/javascript">
                    document.getElementById("g").style.display = "none";
                </script>
            <?php
            }
            else {
                $a = 0;
                while ($a < 10000000) {
                    $a++;
                    ?>
                        <script type="text/javascript">
                            document.getElementById("g").style.display = "none";
                        </script>
                    <?php
                }
                ?>
                    <script type="text/javascript">
                        document.getElementById("g").style.display = "block";
                    </script>
                <?php
            }
            ?>
            <script type="text/javascript">
                function Submit(){
                    document.getElementById("y").submit();
                    $hh = $hh + 1;
                }
            </script>


        <form name="Tick" id="Tick">
            <p align="center">
                <input type="text" size="19" name="Clock"/>
        </form>
        <script language="javaScript">
            function show() {
                var Digital = new Date();
                var day = Digital.getUTCDate();
                var month_ini = Digital.getUTCMonth();
                var month = parseInt(month_ini);
                var year = Digital.getUTCFullYear();
                document.Tick.Clock.value = day + "/" + (month + 1) + "/" + year;
                setTimeout("show()",1000)
            }
            show();
        </script>
        <?php 
        if ((2022-12-30)<=(2022-20-30)) {
            echo "TRUE";
        }
        else {
            echo "FALSE";
        }
        ?>
    </body>
</html>