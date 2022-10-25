<?php
    $ruta = '../css';
    require_once("../html/header.html");
    require_once("conexion.php");
?>

<main>
    <section>
        <article>
            <section class="menu_tmp">
                <a class="enlace_boton" href="usuario_alta.php">Alta usuario</a>
            </section>
            <table>
                <caption>Listado de usuarios</caption>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conexion = conectar();
                        $consulta = 'SELECT foto, usuario, tipo FROM usuario';
                        $query = mysqli_query($conexion, $consulta);
                        $numFilas = mysqli_num_rows($query);
                        if ($numFilas > 0) {
                            while($fila = mysqli_fetch_array($query)){
                                echo '<tr>';
                                if ($fila[0] != '') {
                                    echo '<td><img src="../img/usuarios/' . $fila[0] . '"></td>';
                                } else {
                                    echo '<td><img src="../img/usuarios/usuario_default.png"></td>';

                                }
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . $fila[2] . '</td>';
                                echo '</tr>';
                            }
                        }
                        desconectar($conexion);
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</main>

<?php
    require_once("../html/footer.html");
?>