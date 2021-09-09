<?php
require_once 'Web/Gui/header.php';
?>

<div class="container-fluid">

    <div class="row align-items-center justify-content-center">
        <!-- justify-content-between #Esto sólo los alínea en el eje principal, X para Row; Y para Col#-->
        <!-- align-items los alínea en el eje contrario. Row eje Y; Column eje X-->
        <div class="col-sm-6">
            <img src=<?php echo IMG_PATH."Img_R.png"?> id="img" alt="Imagen">
        </div>

        <div class="col-sm-6">
            <div class="shadow-lg p-3 m-5 bg-white rounded">
                <div id="Formulario">
                    <?php
                    include GUI_PATH."login_form.php";
                    ?>
                </div>

                <br>
                <span id="RegistroSpan"> ¿No tienes cuenta? </span>
                <a href="#" id="RegistroLink" value="Regístrate">Crea una nueva</a>

            </div>


        </div>

    </div>
</div>

<script>
    document.getElementById("RegistroLink").onclick = function() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("Formulario").innerHTML = this.responseText;
            }
        };
        let res = document.getElementById("hidden").value + "";
        if(res == "Registrar"){
            document.getElementById("RegistroSpan").innerHTML = "¿Ya tienes una cuenta?";
            document.getElementById("RegistroLink").innerHTML = "Ingresa";
            document.getElementById("hidden").value = "Ingresar";
            xhttp.open("GET", "Web/Gui/signup_form.php", true);
            xhttp.send();
        }else{
            document.getElementById("RegistroSpan").innerHTML = "¿No tienes cuenta?";
            document.getElementById("RegistroLink").innerHTML = "Regístrate";
            document.getElementById("hidden").value = "Registrar";
            xhttp.open("GET", "Web/Gui/login_form.php", true);
            xhttp.send();
        }
    };
    function checkuser(user){ //Es lo mismo de arriba dice Ubaldo. Sino es cu culpa.
        if(user == ""){
            $('#used').html("");
        }else{
            $.post("Web/Scripts/check_user.php", {user:user}, function(data){//El primer user es el del check_user.php
                $('#used').html(data);
            })
        }
    }
</script>

</body>

</html>