<?php
//IMPLEMENTAR...OK
require_once ("./verificar_sesion.php");
$objUser = Usuario::TraerUsuarioLogueado($_SESSION["Usuario"]);
$allUsers = Usuario::TraerTodosLosUsuarios();
?>
<div class="animated bounceInRight" style="height:460px;overflow:auto;border-style:solid" >
    <table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th> NOMBRE </th>
                <th> MAIL </th>
                <th> PERFIL </th>
                <th> FOTO </th>
                <th> ACCION </th>
            </tr> 
        </thead>   	
        <?php
		//IMPLEMENTAR...OK
        foreach ($allUsers as $unUsuario)
        {
            echo "<tr>
                    <td>".$unUsuario["nombre"]."</td>
                    <td>".$unUsuario["email"]."</td>
                    <td>".$unUsuario["perfil"]."</td>
                    <td><img src='./fotos/".$unUsuario["foto"]."' width='80px' height='80px' /></td>";
                    if ($objUser->perfil == "administrador")
                    {
                        echo "<td>
                                <input type='button' class='MiBotonUTN' onclick='CargarFormUsuario(1,". $unUsuario["id"] .")' value='Modificar' />
                                <input type='button' class='MiBotonUTN' onclick='CargarFormUsuario(2,". $unUsuario["id"] .")' value='Eliminar' />
                            </td>";
                    }
                    if ($objUser->perfil == "usuario")
                    {
                        echo "<td>
                                <input type='button' class='MiBotonUTN' onclick='CargarFormUsuario(1,". $unUsuario["id"] .")' value='Modificar' />
                            </td>";
                    }
            echo "</tr>";
        }
		?>

    </table>
</div>	