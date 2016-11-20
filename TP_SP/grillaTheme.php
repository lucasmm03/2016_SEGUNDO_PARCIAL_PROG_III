<?php
//IMPLEMENTAR...OK
require_once ("./verificar_sesion.php");
?>
<div class="animated bounceInRight" style="height:460px;overflow:auto;border-style:solid;background:#000" >
    <table class="table" >
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th> NOMBRE </th>
                <th> MUESTRA </th>
                <th> APLICAR </th>
            </tr> 
        </thead>   
		<tr>
			<td>Default</td>
            <td><canvas width="150" height="30" style="background:#3F51B5;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo1" value="#3F51B5" checked onchange="AplicarTheme('rdo1')" /></td>
		</tr>
        <tr>
            <td>VERDE</td>
            <td><canvas width="150" height="30" style="background:#73B53F;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo2" value="#73B53F" onchange="AplicarTheme('rdo2')" /></td>
        </tr>
        <tr>
            <td>MARRON</td>
            <td><canvas width="150" height="30" style="background:#B55E3F;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo3" value="#B55E3F" onchange="AplicarTheme('rdo3')" /></td>
        </tr>
        <tr>
            <td>GRIS</td>
            <td><canvas width="150" height="30" style="background:#BDBDBD;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo4" value="#BDBDBD" onchange="AplicarTheme('rdo4')" /></td>
        </tr>
        <tr>
            <td>VIOLETA</td>
            <td><canvas width="150" height="30" style="background:#F781F3;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo5" value="#F781F3" onchange="AplicarTheme('rdo5')" /></td>
        </tr>
        <tr>
            <td>ROJO</td>
            <td><canvas width="150" height="30" style="background:#FF0000;"></canvas></td>
            <td><input type="radio" name="rdoColor" id="rdo6" value="#FF0000" onchange="AplicarTheme('rdo6')" /></td>
        </tr>
    </table>
	<br><br>
	<input type="button" id="btnTheme" onclick="GuardarTheme()" value="GUARDAR THEME" style="color:#000;margin-left:350px"/>
</div>	