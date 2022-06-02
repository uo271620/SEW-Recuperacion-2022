<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Ejercicio6</title>
	<link rel="stylesheet" href="Ejercicio6.css"/>
</head>
<body>
    <?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    echo "
    <nav>

        <form action='#' method='post' name='botones'>
            <ul>
                <li><input type = 'submit' class='button' name = 'generateDataBase' value = 'Crear Base de Datos'/></li>
                <li><input type = 'submit' class='button' name = 'createTable' value = 'Crear tabla'/></li>
                <li><input type = 'submit' class='button' name = 'insert' value = 'Insertar producto en tabla'/></li>
                <li><input type = 'submit' class='button' name = 'search' value = 'Buscar datos en tabla'/></li>
                <li><input type = 'submit' class='button' name = 'modify' value = 'Modificar datos en tabla'/></li>
                <li><input type = 'submit' class='button' name = 'delete' value = 'Eliminar datos en tabla'/></li>
                <li><input type = 'submit' class='button' name = 'report' value = 'Generar Informe'/></li>
                <li><input type = 'submit' class='button' name = 'import' value = 'Cargar Datos desde CSV'/></li>
                <li><input type = 'submit' class='button' name = 'export' value = 'Exportar Datos'/></li>
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
                    <h1>Creacion de base de datos</h1>
                    <p>Para crear una nueva base de datos introduce su nombre a continuacion</p>
                    <label for='dataBaseName'> Database name: <input title='dataBaseName' type='text' id='dataBaseName' name='dataBaseName' value='' /></label>
                    <input type = 'submit' class='button' name = 'sendDataBaseName' value = 'Aceptar'/>
                </form>
                </section>
            ";
        }

        public function interfaceTableCreation(){
            echo "
            <section>
                <h1>Creacion de tablas de la base de datos</h1>
                <p>Para crear las tablas necesarias utilice el siguiente boton</p>
                <form action='#' method='post' name='botones'>
                    <input type = 'submit' class='button' name = 'buttonTableCreation' value = 'Crear Tablas'/>
                </form>
            </section>
            ";
        }

        public function interfaceInsertNewData(){
            echo "
            <section>
                <h1>Datos de prueba</h1>
                <p>Inserte los datos de prueba en la base de datos</p>
                <form action='#' method='post' name='botones'>
                    <input type = 'submit' class='button' name = 'buttonExampleData' value = 'Insertar Datos'/>
                </form>
            </section>
            ";
        }

        public function interfaceSearch(){
            echo "
            <section>
            <h1>Busqueda de datos</h1>
                <p> Realice una busqueda de datos por dni</p>
                <form action='#' method='post' name='botones'>
                    <label for='dniToSearch'>Introduce el Dni de la persona a buscar: 
                    <input title='dniToSearch' type='text' id='dniToSearch' name='dniToSearch' value='' /> </label>
                    <input type = 'submit' class='button' name = 'buttonSearch' value = 'Buscar'/>
                </form>
                </section>
            ";
        }

        public function interfaceModifyDNISearch(){
            echo "
            <section>
            <h1>Modificar Datos</h1>
                <form action='#' method='post' name='botones'>
                    <label for='dniToSearch'>Introduce el Dni de la persona a modificar: 
                    <input title='dniToSearch' type='text' id='dniToSearch' name='dniToSearch' value='' /> </label>
                    <input type = 'submit' class='button' name = 'buttonSearchToModidify' value = 'Buscar'/>
                </form>
                </section>
            ";
        }

        public function interfaceModify($dni){
            echo "
            <section>
            <form action='#' method='post' name='botones'>
                <h1>Modificar Datos</h1>
                <p>Dni de la persona a modificar:</p>
                <input title='dni' type='text' id='dni' name='dni' value='$dni' readOnly/>

                <p>Nombre:</p>
                <input title='name' type='text' id='name' name='name' value='' />

                <p>Apellidos:</p>
                <input title='surname' type='text' id='surname' name='surname' value='' />

                <p>Email:</p>
                <input title='email' type='text' id='email' name='email' value='' />

                <p>Telefono:</p>
                <input title='telephone' type='number' id='telephone' name='telephone' value='' />

                <p>Edad:</p>
                <input title='age' type='number' id='age' name='age' value='' />

                <p>Sexo:</p>
                <select title='sex' id='sex' name='sex'>
                    <option value='Hombre'>Hombre</option>
                    <option value='Mujer'>Mujer</option>
                </select>

                <p>Nivel de informatica:</p>
                <input title='computerExpertise' type='number' id='computerExpertise' name='computerExpertise' value='' />

                <p>Tiempo en segundos:</p>
                <input title='timeInSecs' type='number' id='timeInSecs' name='timeInSecs' value='' />

                <p>Realizacicion Correcta:</p>
                <select title='doneCorrectly' id='doneCorrectly' name='doneCorrectly'>
                <option value='Correcto'>Correcto</option>
                <option value='Incorrecto'>Incorrecto</option>
                </select>

                <p>Comentarios:</p>
                <input title='comment' type='text' id='comment' name='comment' value='' />

                <p>Propuestas:</p>
                <input title='proposal' type='text' id='proposal' name='proposal' value='' />

                <p>Valoración:</p>
                <input title='assessment' type='number' id='assessment' name='assessment' value='' />

                <input type = 'submit' class='button' name = 'buttonModify' value = 'Insertar Datos'/>
            </form>
            </section>
            ";
        }
        
        public function interfaceDelete(){
            echo "
            <section>
                <h1>Eliminacion de filas por dni</h1>
                <form action='#' method='post' name='botones'>
                    <p><label for='dniToSearch' >Introduzca el DNI de los datos a eliminar: 
                    <input title='dniToSearch' type='text' id='dniToSearch' name='dniToSearch' value='' /></label></p>
                    <input type = 'submit' class='button' name = 'buttonDelete' value = 'Eliminar Datos'/>
                </form>
            </section>
            ";
        }

        public function interfaceGenerateReport(){
            echo "
            <section>
                <h1>Obtener un informe</h1>
                <p>Dandole click al siguiente boton se ontendra un informe sobre los datos presentes en la base de datos</p>
                <form action='#' method='post' name='botones'>
                    <input type = 'submit' class='button' name = 'buttonGenerateReport' value = 'Recibir informe'/>
                </form>
            </section>
            ";
        }

        public function interfaceImport(){
            echo "
            <section>
                <h1>Importar datos</h1>
                <p>Se requiere un csv bien formado para poder importar los datos en la base de datos</p>
                <form enctype='multipart/form-data' action='#' method='post' name='botones'>
                    <p><label for='file'>Introduzca el nombre del fichero sin la extensión:
                    <input title='file' type='file' id='file' name='file' value='' /></label></p>
                    <input type = 'submit' class='button' name = 'buttonImport' value = 'Importar Datos'/>
                </form>
            </section>
            ";
        }

        public function interfaceExport(){
            echo "
            <section>
                <h1>Exportar Datos</h1>
                <p>Se construira un fichero csv el cual se podra descargar tras presionar el siguiente boton</p>
                <form action='#' method='post' name='botones'>
                    <input type = 'submit' class='button' name = 'buttonExport' value = 'Exportar Datos'/>
                </form>
            </section>
            ";
        }

        public function createDataBase($name) {

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

        public function searchDataByDNI() {
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
                $consultaPre = $db->prepare("SELECT * FROM PruebasUsabilidad WHERE dni = ?");

                // obtiene los parámetros de la variable predefinida $_POST
                // s indica que se le pasa un string
                $dni = $_POST["dniToSearch"];
                $consultaPre->bind_param('s', $dni);
                
                //ejecuta la consulta
                $consultaPre->execute();

                //Obtiene los resultados como un objeto de la clase mysqli_result
                $resultado = $consultaPre->get_result();

                //Visualización de los resultados de la búsqueda
                if ($resultado->fetch_assoc()!=NULL) {
                    echo "<p>Las filas de la tabla 'PruebasUsabilidad' que coinciden con la búsqueda son:</p>";
                    $resultado->data_seek(0); //Se posiciona al inicio del resultado de búsqueda
                    while($fila = $resultado->fetch_assoc()) {
                        echo "DNI = " . $fila["dni"] . " - Nombre = " . $fila["name"] . " - Apellidos = ".$fila["surname"]." - Email = ". $fila["email"] ." - Teléfono = ". $fila["telephone"] ." - Edad = ". $fila["age"] ." - Sexo = ". $fila["sex"] ." - Pericia informatica = ". $fila["computerExpertise"] ." - Tiempo en segundos = ". $fila["timeInSecs"] ."sc - Realizacion correcta= ". $fila["doneCorrectly"] ." - Comentarios = ". $fila["comment"] ." - Propuestas = ". $fila["proposal"] ." - Valoracion = ". $fila["assessment"] ."</p>";
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

        public function searchDNIToModify() {
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
                $consultaPre = $db->prepare("SELECT * FROM PruebasUsabilidad WHERE dni = ?");

                // obtiene los parámetros de la variable predefinida $_POST
                // s indica que se le pasa un string
                $dni = $_POST["dniToSearch"];
                $consultaPre->bind_param('s', $dni);
                echo "Se va a realizar una modificacion sobre $dni";
                //ejecuta la consulta
                $consultaPre->execute();

                //Obtiene los resultados como un objeto de la clase mysqli_result
                $resultado = $consultaPre->get_result();

                //Visualización de los resultados de la búsqueda
                if ($resultado->fetch_assoc()!=NULL) {
                    $this->interfaceModify($dni);
                } else {
                    echo "<p>No se encontro el DNI introducido</p>";
                }

                // cierre de la consulta y la base de datos
                $consultaPre->close();
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            } 
            
        }
    

        public function modifyData() {
            $dni = $_POST["dni"];
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $telephone = $_POST["telephone"];
            $age = $_POST["age"];
            $sex = $_POST["sex"];
            $computerExpertise = $_POST["computerExpertise"];
            $timeInSecs = $_POST["timeInSecs"];
            $doneCorrectly = $_POST["doneCorrectly"];
            $comment = $_POST["comment"];
            $proposal = $_POST["proposal"];
            $assessment = $_POST["assessment"];

            if (is_null($dni) or empty($dni) or sizeof($dni) == 9) {
                echo "<p>El campo DNI debe ser de 9 caracteres.</p>";
                exit();
            }

            if (is_null($name) or empty($name) ) {
                echo "<p>Se debe proporcionar un nombre para continuar.</p>";
                exit();
            }

            if (is_null($surname) or empty($surname) ) {
                echo "<p>Se debe proporcionar un apellido para continuar.</p>";
                exit();
            }

            if (is_null($email) or empty($email) ) {
                echo "<p>Se debe proporcionar un email para continuar.</p>";
                exit();
            }

            if (is_null($telephone) or empty($telephone) ) {
                echo "<p>Se debe proporcionar un telefono para continuar.</p>";
                exit();
            }

            if (is_null($age) or empty($age) ) {
                echo "<p>Se debe proporcionar una edad para continuar.</p>";
                exit();
            }else if ($age < 1) {
                echo "<p>La edad debe ser mayor a 0</p>";
                exit();
            }

            if (is_null($sex) or empty($sex) ) {
                echo "<p>Se debe proporcionar un sexo para continuar.</p>";
                exit();
            }

            if (is_null($computerExpertise) or empty($computerExpertise) ) {
                echo "<p>Se debe proporcionar un valor de pericia informatica para continuar.</p>";
                exit();
            }else if($computerExpertise < 0 or $computerExpertise > 10) {
                echo "<p>La pericia informatica debe estar entre 0 y 10.</p>";
                exit();
            }

            if (is_null($timeInSecs) or empty($timeInSecs) ) {
                echo "<p>El tiempo debe ser valido, es decir, no puede ser vacio ni nulo.</p>";
                exit();
            }

            if (is_null($comment) or empty($comment) ) {
                echo "<p>Se debe proporcionar un valor de comentario para continuar.</p>";
                exit();
            }

            if (is_null($proposal) or empty($proposal) ) {
                echo "<p>Se debe proporcionar un valor de propuestas para continuar.</p>";
                exit();
            }

            if (is_null($assessment) or empty($assessment) ) {
                echo "<p>Se debe proporcionar un valor de valoracion para continuar.</p>";
                exit();
            }else if ($assessment < 0 or $assessment > 10) {
                echo "<p>La valoración debe estar entre 0 y 10.</p>";
                exit();
            }

            if (is_numeric($assessment) == FALSE) {
                echo "<p>La valoracion debe ser un numero entre 0 y 10.</p>";
                exit();
            }

            if (is_numeric($age) == FALSE) {
                echo "<p>La edad debe ser un numero positivo.</p>";
                exit();
            }

            if (is_numeric($telephone) == FALSE) {
                echo "<p>El telefono debe ser un numero.</p>";
                exit();
            }

            if (is_numeric($timeInSecs) == FALSE) {
                echo "<p>El tiempo debe ser un numero que represente los segundos.</p>";
                exit();
            }

            if (is_numeric($computerExpertise) == FALSE) {
                echo "<p>El nivel de pericia informatica debe ser un numero entre 0 y 10.</p>";
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
                $consultaPre = $db->prepare("UPDATE PruebasUsabilidad SET name = ?, surname = ? , email = ?, telephone = ?, age = ?, sex = ?, computerExpertise = ?, timeInSec = ?, doneCorrectly = ?, comment = ?, proposal = ?, assessment = ? WHERE dni = ?");
                
                $consultaPre->bind_param('sssiisiisssis',
                $name, $surname, $email, $telephone, $age, $sex, $computerExpertise, $timeInSecs, $doneCorrectly, $comment, $proposal, $assessment , $dni);
                //ejecuta la sentencia
                $consultaPre->execute();
                //muestra los resultados
                echo "<p>Fila modificada: " . $consultaPre->affected_rows . "</p>";
                $consultaPre->close();
                //cierra la base de datos
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }
        }

        public function deleteData() {
            if (isset($_SESSION['dataBase'])){
                $servername = "localhost";
                $username = "DBUSER2021";
                $password = "DBPSWD2021";
                $dni = $_POST["dniToSearch"];
                $database = $_SESSION['dataBase'];

                // Conexión al SGBD local con XAMPP con el usuario creado
                $db = new mysqli($servername,$username,$password,$database);

                // comprueba la conexion
                if($db->connect_error) {
                    exit ("<h1>Error</h1><p>ERROR de conexión:".$db->connect_error."</p>");
                } else {echo "<h1>Conexión establecida</h1><p>Conexión establecida" . $db->host_info . "</p>";}

                $consultaPre = $db->prepare("SELECT * FROM PruebasUsabilidad WHERE dni = ?");

                //obtiene los parámetros de la variable predefinida $_POST
                // s indica que dni es un string
                $consultaPre->bind_param('s', $dni);
                //ejecuta la consulta
                $consultaPre->execute();

                //guarda los resultados como un objeto de la clase mysqli_result
                $resultado = $consultaPre->get_result();

                if ($resultado->fetch_assoc()!=NULL) {
                    //Realiza el borrado
                    //prepara la sentencia SQL de borrado
                    $consultaPre = $db->prepare("DELETE FROM PruebasUsabilidad WHERE dni = ?");
                    //obtiene los parámetros de la variable almacenada
                    $consultaPre->bind_param('s', $dni);
                    //ejecuta la consulta
                    $consultaPre->execute();
                    // cierra la consulta
                    $consultaPre->close();
                    echo "<p>Borrados los datos del dni".$dni ."</p>";
                }
                else {
                    echo "<p>Búsqueda sin resultados. No se ha borrado nada</p>";
                }
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }         

        }

        public function generateReport() {
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
                } else {echo "<h2>Conexión establecida</h2>";}

                $edadMedia = 0;
                $hombres = 0;
                $mujeres = 0;
                $periciaMedia = 0;
                $tiempoMedio = 0;
                $tareaCorrecta = 0;
                $valoracionMedia = 0;

                //EdadMedia
                $resultado = $db->query('SELECT ROUND(AVG(age),0) as edad FROM PruebasUsabilidad');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        $edadMedia = $row["edad"];
                    }
                }
                echo "<p>Edad media: " . $edadMedia . "</p>";

                //Porcentaje de hombres y mujeres
                $resultado = $db->query('SELECT sex, COUNT(*) as numeroPersona FROM PruebasUsabilidad GROUP BY sex');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        if($row["sex"]=="Hombre"){
                            $hombres = $row["numeroPersona"];
                        }else if($row["sex"]=="Mujer"){
                            $mujeres = $row["numeroPersona"];
                        }
                    }
                }
                $hombres = round($hombres/($hombres + $mujeres) *100,2);
                $mujeres = 100 - $hombres;

                echo "
                    <p> Hombres:  " . $hombres . "% </p>
                    <p> Mujeres:  " . $mujeres . "% </p>
                ";
                //Pericia informatica de los usuarios
                $resultado = $db->query('SELECT ROUND(AVG(computerExpertise),0) as periciaMedia FROM PruebasUsabilidad');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        $periciaMedia = $row["periciaMedia"];
                    }
                }
                echo "<p>Pericia informatica media: " . $periciaMedia . "</p>";

                //Tiempo medio
                $resultado = $db->query('SELECT ROUND(AVG(timeInSec),0) as tiempo FROM PruebasUsabilidad');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        $tiempoMedio = $row["tiempo"];
                    }
                }
                echo "<p>Tiempo medio: " . $tiempoMedio . "</p>";
                //Tarea correctamente
                $resultado = $db->query('SELECT doneCorrectly, COUNT(*) as numeroPersona FROM PruebasUsabilidad GROUP BY doneCorrectly');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    $totalPersonas = 0;
                    while($row = $resultado->fetch_assoc()) {
                        if($row["doneCorrectly"]=="Correcto"){
                            $tareaCorrecta = $row["numeroPersona"];
                        }
                        $totalPersonas = $totalPersonas + $row["numeroPersona"]; 
                    }
                    $tareaCorrecta = $tareaCorrecta / $totalPersonas *100;
                    echo "<p>Porcentaje de tareas correctas: " . round($tareaCorrecta,2) . "</p>";
                } 
                //Valoracion medio
                $resultado = $db->query('SELECT ROUND(AVG(assessment),0) as valoracion FROM PruebasUsabilidad');

                // compruebo los datos recibidos
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        $valoracionMedia = $row["valoracion"];
                    }
                }
                echo "<p>Valoracion media: " . $valoracionMedia . "</p>";
                
                $db->close();
            }
        }


        public function exportData() {
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

                $resultado = $db->query('SELECT * FROM PruebasUsabilidad');

                $file = fopen("pruebasUsabilidad.csv","w");

                while($row = $resultado->fetch_assoc()) {
                    fputcsv($file,$row,";");
                }
                echo "<p>El fichero fue exportado con exito, para obtenerlo use el enlace de descarga.</p>";
                echo "<a href='pruebasUsabilidad.csv'>Descargar fichero pruebasUsabilidad.csv</a>";

                $resultado->close();
                $db->close();
            }
            else {
                echo "<p>Base de datos no creada, debe crear la base de datos antes de hacer cualquier acción</p>";
            }
        }

        public function importData() {
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

                $consultaPre = $db->prepare("INSERT INTO PruebasUsabilidad (dni,name, surname, email, telephone, age, sex, computerExpertise, timeInSec, doneCorrectly, comment, proposal, assessment) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $archivo = fopen($_FILES["file"]["tmp_name"],"r");
                $tipo = $_FILES["file"]["type"];
                if ($archivo == null) {
                    echo "<p>Archivo no encontrado</p>";
                    exit();
                }else if($_FILES["file"]["type"]!="application/vnd.ms-excel"){
                    echo "<p>Introduzca un archivo CSV</p>";
                    exit();
                }
                try{
                while (($data = fgetcsv($archivo,1000,";")) == true) {
                    $consultaPre->bind_param('ssssiisiisssi',
                    $data[0],$data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12]);
                    if($data[0]!=null && $data[1]!=null && $data[2]!=null && $data[3]!=null && $data[4]!=null && $data[5]!=null && $data[6]!=null && $data[7]!=null && $data[8]!=null && $data[9]!=null && $data[10]!=null && $data[11]!=null && $data[12]!=null){
                        $consultaPre->execute(); 
                    }
                    //ejecuta la sentencia
                                
                }
            
                echo "<p> Filas agregadas con éxito</p>";
                $consultaPre->close();
                }catch(Exception $e){
                    echo "<p>No se pudieron agregar las filas debido a un problema con el documento, revise su estructura e intentelo de nuevo</p>";
                }
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
        if(isset($_POST['createTable'])) $baseDatos->interfaceTableCreation();
        if(isset($_POST['insert'])) $baseDatos->interfaceInsertNewData();
        if(isset($_POST['search'])) $baseDatos->interfaceSearch();
        if(isset($_POST['modify'])) $baseDatos->interfaceModifyDNISearch();
        if(isset($_POST['delete'])) $baseDatos->interfaceDelete();
        if(isset($_POST['report'])) $baseDatos->interfaceGenerateReport();
        if(isset($_POST['import'])) $baseDatos->interfaceImport();
        if(isset($_POST['export'])) $baseDatos->interfaceExport();

        if(isset($_POST['sendDataBaseName'])) $baseDatos->createDataBase($_POST['dataBaseName']);
        if(isset($_POST['buttonTableCreation'])) $baseDatos->tableCreation();
        if(isset($_POST['buttonExampleData'])) $baseDatos->insertExampleData();
        if(isset($_POST['buttonSearch'])) $baseDatos->searchDataByDNI();
        if(isset($_POST['buttonModify'])) $baseDatos->modifyData();
        if(isset($_POST['buttonDelete'])) $baseDatos->deleteData();
        if(isset($_POST['buttonGenerateReport'])) $baseDatos->generateReport();
        if(isset($_POST['buttonExport'])) $baseDatos->exportData();
        if(isset($_POST['buttonImport'])) $baseDatos->importData();
        if(isset($_POST['buttonSearchToModidify'])) $baseDatos->searchDNIToModify();

    }
    ?>
</body>
</html>