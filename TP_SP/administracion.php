<?phprequire_once ("./clases/AccesoDatos.php");require_once ("./clases/Usuario.php");require_once ("./clases/Archivo.php");$queMuestro = isset($_POST['queMuestro']) ? $_POST['queMuestro'] : NULL;switch ($queMuestro) {    case "2"://LOGOUT		//IMPLEMENTAR...OK        session_start();        session_destroy();        echo "LOGOUT";        break;    case "3"://MOSTRAR GRILLA		//IMPLEMENTAR...OK        require_once ("./grilla.php");        break;    case "4"://MUESTRA FORM ALTA-MODIFICACION USUARIO		//IMPLEMENTAR...OK        require_once ("./form.php");        break;    case "5"://SUBIR FOTO AL TMP		//IMPLEMENTAR...        require_once ("./clases/Archivo.php");        $res = Archivo::Subir();        if (substr($_POST["fotoAnterior"], 0, 6) == "./tmp/")        {            Archivo::Borrar($_POST["fotoAnterior"]);        }        echo $res;        break;    case "6"://ALTA USUARIO		//IMPLEMENTAR...        $usuario = json_decode($_POST["usuarioAgregado"]);        if (Usuario::Agregar($usuario))        {            if ($_POST["origenFoto"] == "tmp")            {                Archivo::Mover("./tmp/".$usuario->foto, "./fotos/".$usuario->foto);                Archivo::Borrar("./tmp/".$usuario->foto);            }            echo "OK";        }        else        {            Archivo::Borrar("./tmp/".$usuario->foto);            echo "NO_OK";        }        break;    case "7"://ELIMINAR USUARIO		//IMPLEMENTAR...OK        $usuario = Usuario::TraerUnUsuarioPorId($_POST["idUsuario"]);        if (Usuario::Borrar($_POST["idUsuario"]))        {            Archivo::Borrar("./fotos/".$usuario->foto);            echo "OK";        }        else        {            echo "NO_OK";        }        break;            case "8"://MODIFICAR USUARIO		//IMPLEMENTAR...OK        session_start();        $usuarioSesion = Usuario::TraerUsuarioLogueado($_SESSION["Usuario"]);        $usuario = json_decode($_POST["usuarioModificado"]);        if (Usuario::Modificar($usuario))        {            if ($_POST["origenFoto"] == "tmp")            {                Archivo::Mover("./tmp/".$usuario->foto, "./fotos/".$usuario->foto);                Archivo::Borrar("./tmp/".$usuario->foto);            }            if ($usuarioSesion->id == $usuario->id)            {                $_SESSION["Usuario"] = $_POST["usuarioModificado"];            }            echo "OK";        }        else        {            echo "NO_OK";        }        break;	case "9"://ELEGIR THEME		//IMPLEMENTAR...        require_once ("./grillaTheme.php");		break;		case "10"://GUARDA EN COOKIE EL THEME		//IMPLEMENTAR...        session_start();        $usuarioLogueado = json_decode($_SESSION["Usuario"]);        if (setcookie("theme".$usuarioLogueado->id, $_POST["color"]))        {            echo "OK";        }        else        {            echo "NO_OK";        }		break;		    default:        echo ":(";}