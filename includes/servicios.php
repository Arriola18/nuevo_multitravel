<?php
{     
            echo "<div class='service_box'>";
            echo "<center><table id='contenido'>";
            echo "<thead>";
            echo "<td class='int_lines' align='center' colspan='3'>"; echo $fila['nombre_servicio']; echo "</td class='int_lines'>"; echo "</thead>";
            echo "<tr>";
            echo "<td class='int_lines' align='center'>"; echo $fila['nombre_empresa']; echo "</td class='int_lines'>";
            echo "<td class='int_lines' align='center' class='mitad' colspan='2'>"; echo $fila['categoria_serv']; echo "</td class='int_lines'>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='int_lines' align='center'>"; echo $fila['precio']; echo "</td class='int_lines'>";
            echo "<td class='int_lines' align='center'>"; echo $fila['descuento_aplicable']; echo "</td class='int_lines'>";
            echo "<td class='int_lines' align='center'>"; echo $fila['fecha_limite']; echo "</td class='int_lines'>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='int_lines'>"; echo $fila['descripcion_servicio']; echo "</td class='int_lines'>";
            echo "<td class='int_lines' align='center' class='mitad' colspan='2'>"; echo $fila['imagen_serv']; echo "</td class='int_lines'>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='int_lines' align='center' colspan='3'>"; echo "Id servicio: ".$fila['id_servicio']; echo "</td class='int_lines'>";
            echo "</tr>";
}
?>