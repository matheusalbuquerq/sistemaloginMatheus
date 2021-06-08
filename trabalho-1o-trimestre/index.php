<DOCTYPE! html>
<?php 
    session_start();
?>
<html>
    <head> 
        <title>Login</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="./css/style.css" >
    </head>

    <body>
        <main>
            <div id="form">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
                    <div class="input">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" pattern="^[a-z0-9]+[a-z0-9\.\-\_]*@[a-z0-9]+\.([a-z])+([a-z\.])*$" required>
                    </div class="input">

                    <div class="input">
                        <label for="password">Senha</label>
                        <input type="password" name="senha" id="password" pattern="^([\w\W]{8,16})$" required>
                    </div class="input">

                    <div class="input">
                        <input type="submit" name="submit" value="Entrar" id="submit">
                    </div class="input">

            </div>
            <div id="messages">
                <?php  
                    $erros=array();
                
                    if(isset($_POST['enviar'])){
                        if(!$email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^[a-z0-9]+[a-z0-9\.\-\_]*@[a-z0-9]+\.([a-z])+([a-z\.])*$/"))
                        )){
                            $erros[]="E-mail inválido";
                        }
                        if(!$senha=filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=>"/^([\w\W]{8,16})$/"))
                        )){
                            $erros[]="Senha inválido";
                        }

                    }                
                    
                   $_POST['senha']=md5($_POST['senha']);
                    
                    
                   if($file=fopen("usuarios.txt", 'r')){
                        if($dados=file_get_contents("usuarios.txt")){
                            echo "soos";
                        }
                            
                            /*if($_POST['email']==$linhas[0] && $_POST['senha']==md5($linhas[1])){
                                echo "soos";

                                header("location: index.php");
                            }*/

                            
                        
                        
                        fclose($file);
                    }

                    

                    

                   
                   
                    ?>
            </div>

        </main>

    </body>



</html>