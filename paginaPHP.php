<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
    <meta name="author" content="Adolfo Rodriguez Sanchez" />
    <meta name="description" content="Pagina de base de datos" />
    <meta name="keywords" content="Base de datos,Pedidos, Productos" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda Comestibles - Base de datos</title>
	<link rel="stylesheet" href="./estilo/estiloPHP.css"/>
</head>
<body>
    <?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    echo "
    <nav>
        <a href='./index.html' accesskey='H'  tabindex='1'>Home</a>
        <a href='./mapa.html' accesskey='M' tabindex='2'>Nuestras tiendas</a>
        <a href='./cargaXML.html' accesskey='C' tabindex='3'>Cargar Productos</a>
        <a href='./direcciones.html' accesskey='D' tabindex='4'>Direcciones</a>
        <a href='./comentarios.html' accesskey='F' tabindex='5'>Foro</a>
        <a href='./paginaPHP.php' accesskey='B' tabindex='6'>Base de datos</a>
        <a href='./aboutUs.html' accesskey='A' tabindex='7'>Sobre nosotros</a>
    </nav>
    <h1>Opciones</h1>
    <p>Aquí podrás realizar tareas relacionadas con la base de datos</p>
    <nav>
        <form action='#' method='post' name='botones'>
            <ul>
                <li><input type = 'submit' class='button' name = 'generateDataBase' value = 'Crear Base de Datos'/></li>
                <li><input type = 'submit' class='button' name = 'buttonInsert' value = 'Insertar datos prueba'/></li>
                <li><input type = 'submit' class='button' name = 'buttonSearch' value = 'Productos por tienda'/></li>
                <li><input type = 'submit' class='button' name = 'buttoninterfazPedido' value = 'Realizar Pedido'/></li>
                <li><input type = 'submit' class='button' name = 'buttonModificar' value = 'Modificar Estado Pedido'/></li>
            </ul>
        </form>
    </nav> 

    
    ";
    class BaseDatos {
        public function _constructor(){

        }

        public function interfaceDataBaseCreation(){
            echo "
                <section>
                <form action='#' method='post' name='botones'>
                    <h2>Creacion de base de datos</h2>
                    <p>Para crear una nueva base de datos presione el botón, si quiere introducir datos de prueba diríjase a la siguiente opción</p>
                    <input type = 'submit' class='button' name = 'buttonDatabaseCreation' value = 'Aceptar'/>
                </form>
                </section>
            ";
        }

        public function interfaceInsertNewData(){
            echo "
            <section>
                <form action='#' method='post' name='botones'>
                    <h2>Datos de prueba</h2>
                    <p>Inserte los datos de prueba en la base de datos</p>
                    <input type = 'submit' class='button' name = 'buttonExampleData' value = 'Insertar Datos'/>
                </form>
            </section>
            ";
        }

        public function interfaceSearch($direcciones){
            if(count($direcciones)<=0){
                echo "
                <section>
                <h2>Tienda</h2>
                    <p>Actualmente no hay tiendas disponibles</p>
                </section>
                ";
            }else
            {
                echo "
                <section>
                    <form action='#' method='post' name='botones'>
                        <h2>Tienda</h2>
                        <p>Seleccione una tienda</p>
                        <select title='tienda' id='tienda' name='tienda'>
                            ";
                                foreach($direcciones as $direccion){
                                    echo "<option value='".$direccion[0]."'>".$direccion[1]."</option>";
                                }
                            echo "
                        </select>
                        <input type = 'submit' class='button' name = 'buttonVerProductos' value = 'Ver productos'/>
                    </form>
                </section>
                ";
            }
        }

        public function interfacePedido($productos,$trasnportistas){
            if(count($productos)<=0 || count($trasnportistas)<=0){
                echo "
                <section>
                <h2>Realizar Pedido</h2>
                    <p>No se puede realizar un pedido debido a falta de transportistas o productos</p>
                </section>
                ";
            }else{
                echo "
            <section>
            <form action='#' method='post' name='botones'>
                <h2>Realizar Pedido</h2>
                <p>Direccion envio:</p>
                <input title='direccion' type='text' id='direccion' name='direccion'/>

                <p>Nombre:</p>
                <input title='name' type='text' id='name' name='name' value='' />

                <p>Transportista:</p>
                <select title='transportista' id='transportista' name='transportista'>
                ";
                    foreach($trasnportistas as $trasnportista){
                        echo "<option value='".$trasnportista['id']."'>".$trasnportista['nombre']."-".$trasnportista['apellido']."</option>";
                    }
                echo "
                </select>
                <p>Producto:</p>
                <select title='producto' id='producto' name='producto'>
                ";
                    foreach($productos as $producto){
                        echo "<option value='".$producto['id']."'>".$producto['nombre']." - ".$producto['precio']. " EUR</option>";
                    }
                echo "
                </select>

                <p>Cantidad:</p>
                <input title='cantidad' type='number' id='cantidad' name='cantidad' value='' min='1' /><br/>

                <input type = 'submit' class='button' name = 'buttonPedido' value = 'Hacer Pedido'/>
            </form>
            </section>
            ";
            }
        } 
        public function interfaceModificarPedido($pedidos){
            if(count($pedidos)<=0){
                echo "
                <section>
                <h2>Modificar Estado Pedido</h2>
                    <p>No existen pedidos que modificar</p>
                </section>
                ";
            }else{
                echo "
                <section>
                <form action='#' method='post' name='botones'>
                    <h2>Modificar Estado Pedido</h2>

                    <p>Pedido:</p>
                    <select title='pedido' id='pedido' name='pedido'>
                    ";
                        foreach($pedidos as $pedido){
                            echo "<option value='".$pedido['id']."'>".$pedido['id']." - ".$pedido['estado']. "</option>";
                        }
                    echo "
                    </select>

                    <p>Estado:</p>
                    <select title='estado' id='estado' name='estado'>
                        <option value='FINALIZADO'>FINALIZADO</option>
                        <option value='ENCAMINO'>ENCAMINO</option>
                    </select>

                    <input type = 'submit' class='button' name = 'buttonEstadoPedido' value = 'Editar estado'/>
                </form>
                </section>
                ";
            }
        }

        public function createDataBase() {
            $name = 'BASEDEPRUEBAS';
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";

            // Conexión al SGBD local con XAMPP con el usuario creado
            $db = new mysqli($servername,$username,$password);

            if($db->connect_error) {
                exit ("<h1>Error</h1> <p>ERROR de conexión:".$db->connect_error."</p>");
            } else {echo "<h1>Conexion Stablished</h1><p>Conexion Stablished " . $db->host_info . "</p>";}

            $cadenaSQL = "CREATE DATABASE IF NOT EXISTS " . $name;
            if($db->query($cadenaSQL) === TRUE){
                echo "
                <p>Base de datos ". $name . " creada con éxito</p>";
            } else { 
                echo "
                    <p>ERROR en la creación de la Base de Datos" . $name . " Error: " . $db->error . "</p>";
                exit();
            }

            $_SESSION['dataBase'] = $name;

            $db->close();

            $this ->tableCreation();
        }

        public function tableCreation() {
            if (isset($_SESSION['dataBase'])){
                
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";
    
                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password);

                //selecciono la base de datos creada para utilizarla
                $database = $_SESSION['dataBase'];
                $db->select_db($database);

                //Crear la tabla Tienda con Id, Direccion, Hora de apertura, Hora de cierre
                $tablaTienda = "CREATE TABLE IF NOT EXISTS Tienda (
                    id VARCHAR(255) NOT NULL,
                    direccion VARCHAR(255) NOT NULL,
                    horaApertura VARCHAR(255) NOT NULL,
                    horaCierre VARCHAR(255) NOT NULL,
                    PRIMARY KEY (id)
                )";

                if($db->query($tablaTienda) === TRUE){
                    echo "<h1>Tabla Creada</h1><p>Tabla 'Tienda' creada con éxito </p>";
                } else {
                    echo "<h1>Error</h1><p>ERROR en la creación de la tabla Tienda. Error : ". $db->error . "</p>";
                    exit();
                }

                $tablaTransportistas = "CREATE TABLE IF NOT EXISTS Transportista (
                    id VARCHAR(255) NOT NULL,
                    nombre VARCHAR(255) NOT NULL,
                    apellido VARCHAR(255) NOT NULL,
                    costeEurosHora int NOT NULL,
                    PRIMARY KEY (id)
                )";

                if($db->query($tablaTransportistas) === TRUE){
                    echo "<h1>Tabla Creada</h1><p>Tabla 'Transportista' creada con éxito </p>";
                } else {
                    echo "<h1>Error</h1><p>ERROR en la creación de la tabla Transportistas. Error : ". $db->error . "</p>";
                    exit();
                }

                $tablaProductos = "CREATE TABLE IF NOT EXISTS Producto (
                    id VARCHAR(255) NOT NULL,
                    nombre VARCHAR(255) NOT NULL,
                    precio int NOT NULL,
                    familiaDeProducto VARCHAR(255) NOT NULL,
                    PRIMARY KEY (id)
                )";

                if($db->query($tablaProductos) === TRUE){
                    echo "<h1>Tabla Creada</h1><p>Tabla 'Producto' creada con éxito </p>";
                } else {
                    echo "<h1>Error</h1><p>ERROR en la creación de la tabla Producto. Error : ". $db->error . "</p>";
                    exit();
                }

                $tablaProdutosTienda = "CREATE TABLE IF NOT EXISTS ProductosTienda (
                    idTienda VARCHAR(255) NOT NULL,
                    idProducto VARCHAR(255) NOT NULL,
                    stock int NOT NULL,
                    PRIMARY KEY (idTienda,idProducto),
                    FOREIGN KEY (idTienda) REFERENCES Tienda(id) ON DELETE CASCADE,
                    FOREIGN KEY (idProducto) REFERENCES Producto(id) ON DELETE CASCADE
                )";
                
                if($db->query($tablaProdutosTienda) === TRUE){
                    echo "<h1>Tabla Creada</h1><p>Tabla 'ProductosTienda' creada con éxito </p>";
                } else {
                    echo "<h1>Error</h1><p>ERROR en la creación de la tabla ProductosTienda. Error : ". $db->error . "</p>";
                    exit();
                }

                $tablaPedidos = "CREATE TABLE IF NOT EXISTS Pedido (
                    id VARCHAR(255) NOT NULL,
                    idTransportista VARCHAR(255) NOT NULL,
                    idProducto VARCHAR(255) NOT NULL,
                    nombre VARCHAR(255) NOT NULL,
                    direccion VARCHAR(255) NOT NULL,
                    cantidad int NOT NULL,
                    estado VARCHAR(255) NOT NULL,
                    PRIMARY KEY (id),
                    FOREIGN KEY (idTransportista) REFERENCES Transportista(id) ON DELETE CASCADE,
                    FOREIGN KEY (idProducto) REFERENCES Producto(id) ON DELETE CASCADE
                )";

                if($db->query($tablaPedidos) === TRUE){
                    echo "<h1>Tabla Creada</h1><p>Tabla 'Pedido' creada con éxito </p>";
                } else {
                    echo "<h1>Error</h1><p>ERROR en la creación de la tabla Pedido. Error : ". $db->error . "</p>";
                    exit();
                }

                //cerrar la conexión
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }
        }

        public function insertExampleData() {

            //Datos Tienda
            $tiendas = [[uniqid(),'Calle del Gral. Elorza, 61, 33002 Oviedo, Asturias','9:00','20:00'],
            [uniqid(),'C. Fruela, 3, 33007 Oviedo, Asturias','10:00','22:00'],
            [uniqid(),'Pl. de los Cuatro Caños, 5, 33011 Corredoria, Asturias','8:00','21:00'], [uniqid(),'Calle Sánchez Calvo, 2, 33402 Avilés, Asturias','10:30','22:30'], 
            [uniqid(),'C. Jovellanos, 21, 33201 Gijón, Asturias','9:45','19:45']];

            //Datos Productos
            $productos = [[uniqid(),'Coca-cola','Refresco',2],[uniqid(),'Fanta','Refresco',2],[uniqid(),'Leche','Lacteos',1],[uniqid(),'Cereales','Hidratos',3],
            [uniqid(),'Doritos','Hidratos',2],[uniqid(),'Helado','Lacteos',1],[uniqid(),'Tomate','Verdura',1],[uniqid(),'Pizza','Hidratos',4],
            [uniqid(),'Zanahoria','Verdura',1],[uniqid(),'Patatas','Hidratos',3],[uniqid(),'Lechuga','Verdura',1]];

            $transportistas = [['Paco','Gonzalez',7],['Elena','Fernandez',6],['Jose','Dominguez',7],['Saul','Diaz',6]];

            $productosEnTienda = [[$tiendas[0][0],$productos[0][0],12],[$tiendas[0][0],$productos[3][0],22],[$tiendas[0][0],$productos[6][0],7],
            [$tiendas[1][0],$productos[10][0],6],[$tiendas[1][0],$productos[4][0],31],[$tiendas[1][0],$productos[8][0],6],
            [$tiendas[2][0],$productos[3][0],16],[$tiendas[2][0],$productos[10][0],8],
            [$tiendas[3][0],$productos[8][0],2],[$tiendas[3][0],$productos[5][0],13]];

            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                    exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida</p>";}

                //prepara la sentencia de inserción
                $consultaTienda = $db->prepare("INSERT INTO Tienda (id, direccion, horaApertura, horaCierre) VALUES (?,?,?,?)");
                
                foreach($tiendas as $tienda){
                    $consultaTienda->bind_param('ssss',
                    $tienda[0],$tienda[1], $tienda[2], $tienda[3]);
                    //ejecuta la sentencia
                    $consultaTienda->execute();
                    //muestra los resultados
                }
                echo "<p>Tiendas Agregadas: " . $consultaTienda->affected_rows . "</p>";
                $consultaTienda->close();

                //prepara la sentencia de inserción
                $consultaProducto = $db->prepare("INSERT INTO Producto (id, nombre, precio, familiaDeProducto) VALUES (?,?,?,?)");
                
                foreach($productos as $producto){
                    $consultaProducto->bind_param('ssis',
                    $producto[0],$producto[1], $producto[3], $producto[2]);
                    //ejecuta la sentencia
                    $consultaProducto->execute();
                    //muestra los resultados
                    
                }
                echo "<p>Productos Agregados: " . $consultaProducto->affected_rows . "</p>";
                $consultaProducto->close();


                //prepara la sentencia de inserción
                $consultaTransportista = $db->prepare("INSERT INTO Transportista (id, nombre, apellido, costeEurosHora) VALUES (?,?,?,?)");
                
                foreach($transportistas as $transportista){
                    $consultaTransportista->bind_param('sssi',
                    uniqid(),$transportista[0], $transportista[1], $transportista[2]);
                    //ejecuta la sentencia
                    $consultaTransportista->execute();
                    //muestra los resultados
                
                }
                echo "<p>Transportistas Agregados: " . $consultaTransportista->affected_rows . "</p>";
                $consultaTransportista->close();
                
                //prepara la sentencia de inserción
                $consultaProductosTienda = $db->prepare("INSERT INTO ProductosTienda (idTienda, idProducto, stock) VALUES (?,?,?)");
                
                foreach($productosEnTienda as $producto){
                    $consultaProductosTienda->bind_param('ssi',
                    $producto[0], $producto[1], $producto[2]);
                    //ejecuta la sentencia
                    $consultaProductosTienda->execute();
                    //muestra los resultados
                    
                }
                echo "<p>Productos agregados a la tienda: " . $consultaProductosTienda->affected_rows . "</p>";
                $consultaProductosTienda->close();

                //cierra la base de datos
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }
        }

        public function getTiendas(){
            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1>";}

                $resultado = $db->query("SELECT id,direccion FROM Tienda");
                $direcciones = [];

                while($row = $resultado->fetch_assoc()) {
                    array_push($direcciones, [$row['id'],$row['direccion']]);
                }
                // cierre de la consulta y la base de datos
                $resultado->close();
                $db->close();
                $this->interfaceSearch($direcciones);
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            } 
        }

        public function verProductos() {
            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}

                // prepara la consulta
                $consultaPre = $db->prepare("SELECT stock,nombre,precio,familiaDeProducto FROM ProductosTienda, Producto WHERE idTienda = ? AND idProducto = id");

                // obtiene los parámetros de la variable predefinida $_POST
                // s indica que se le pasa un string
                $id = $_POST["tienda"];
                $consultaPre->bind_param('s', $id);
                
                //ejecuta la consulta
                $consultaPre->execute();

                //Obtiene los resultados como un objeto de la clase mysqli_result
                $resultado = $consultaPre->get_result();

                //Visualización de los resultados de la búsqueda
                if ($resultado->fetch_assoc()!=NULL) {
                    echo "<p>Los productos de la tienda selecciona son los siguientes</p>";
                    $resultado->data_seek(0); //Se posiciona al inicio del resultado de búsqueda
                    while($fila = $resultado->fetch_assoc()) {
                        echo "
                        <section>
                            <h2>".$fila["nombre"]."</h2>
                            <p>Precio del producto: ".$fila["precio"]." EUR</p>
                            <p>Stock del producto: ".$fila["stock"]."</p>
                            <p>Familia del producto: ".$fila["familiaDeProducto"]."</p>
                        </section>";
                    }
                } else {
                    echo "<p>Búsqueda sin resultados</p>";
                }

                // cierre de la consulta y la base de datos
                $consultaPre->close();
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            } 
        }

        public function buscarProductosYTransportistas() {
            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}

                // prepara la consulta
                $resultado = $db->query("SELECT * FROM Producto");

                $productos = [];

                while($row = $resultado->fetch_assoc()) {
                    array_push($productos, $row);
                }
                // cierre de la consulta y la base de datos
                $resultado->close();

                // prepara la consulta
                $resultado = $db->query("SELECT * FROM Transportista");

                $trasnportistas = [];

                while($row = $resultado->fetch_assoc()) {
                    array_push($trasnportistas, $row);
                }
                // cierre de la consulta y la base de datos
                $resultado->close();

                $this->interfacePedido($productos,$trasnportistas);

                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            } 
            
        }

        public function insertarPedido() {

            $transportista = $_POST["transportista"];
            $producto = $_POST["producto"];
            $cantidad = $_POST["cantidad"];
            $nombre = $_POST["name"];
            $direccion = $_POST["direccion"];
            $id = uniqid();
            $estado = 'REALIZADO';

            if (is_null($cantidad) or empty($cantidad) ) {
                echo "<p>Se debe proporcionar una cantidad para continuar.</p>";
                exit();
            }else if ($cantidad < 1) {
                echo "<p>La candidad debe ser mayor a 0</p>";
                exit();
            }

            if (is_null($nombre) or empty($nombre) ) {
                echo "<p>Se debe proporcionar un nombre para continuar.</p>";
                exit();
            }

            if (is_null($direccion) or empty($direccion) ) {
                echo "<p>Se debe proporcionar una direccion para continuar.</p>";
                exit();
            }

            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                    exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}

                //prepara la sentencia de inserción
                $consultaPre = $db->prepare("INSERT INTO Pedido (id, idTransportista, idProducto, cantidad, estado, nombre,direccion) VALUES (?,?,?,?,?,?,?)");
                
                $consultaPre->bind_param('sssisss',
                $id, $transportista, $producto, $cantidad, $estado,$nombre,$direccion);
                //ejecuta la sentencia
                $consultaPre->execute();
                //muestra los resultados
                echo "<p>Pedido agregado</p>";
                $consultaPre->close();
                //cierra la base de datos
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }
        }

        public function obtenerPedido(){
        if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}

                // prepara la consulta
                $resultado = $db->query("SELECT * FROM Pedido WHERE estado != 'FINALIZADO'");

                $pedidos = [];

                while($row = $resultado->fetch_assoc()) {
                    array_push($pedidos, $row);
                }
                // cierre de la consulta y la base de datos
                $resultado->close();

                $this->interfaceModificarPedido($pedidos);

                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            } 
        }
        
        public function modificarEstadoPedido(){
            $pedido = $_POST["pedido"];
            $estado = $_POST["estado"];


            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";

                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                    exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}


                $consulta = $db->prepare("UPDATE Pedido SET estado = ? WHERE (SELECT estado FROM Pedido WHERE id = ?) != ? AND id = ?");

                //obtiene los parámetros de la variable predefinida $_POST
                // s indica que dni es un string
                $consulta->bind_param('ssss', $estado,$pedido,$estado,$pedido);
                
                //ejecuta la sentencia
                $consulta->execute();
                //muestra los resultados
                echo "<p>Pedido modificado: " . $consulta->affected_rows . "</p>";
                $consulta->close();

                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }         
        }
    }

    if (count($_POST)>0) 
    { 
        $baseDatos = new BaseDatos();
        
        if(isset($_POST['generateDataBase'])) $baseDatos->interfaceDataBaseCreation();
        if(isset($_POST['buttonInsert'])) $baseDatos->interfaceInsertNewData();
        if(isset($_POST['buttonSearch'])) $baseDatos->getTiendas();
        if(isset($_POST['buttoninterfazPedido'])) $baseDatos->buscarProductosYTransportistas();
        if(isset($_POST['buttonModificar'])) $baseDatos->obtenerPedido();

        if(isset($_POST['buttonDatabaseCreation'])) $baseDatos->createDataBase();
        if(isset($_POST['buttonExampleData'])) $baseDatos->insertExampleData();
        if(isset($_POST['buttonVerProductos'])) $baseDatos->verProductos();
        if(isset($_POST['buttonPedido'])) $baseDatos->insertarPedido();
        if(isset($_POST['buttonEstadoPedido'])) $baseDatos->modificarEstadoPedido();

    }
    ?>
</body>
</html>