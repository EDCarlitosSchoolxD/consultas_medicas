<?php

use App\Doctor;
use App\Especialidad;

include('./includes/App.php');

$especialidades = Especialidad::all();
$doctores = Doctor::all();



?>


<?php include('./includes/templates/header.php'); ?>


        <div>
            <p id="mensajeConfirmacion" class= text-center text-white text-3xl font-bold"></p>
        </div>



<?php if (isset($_SESSION['usuarioId'])) : ?>

    <section class="bg-gray-50 mt-40 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/img/simi.png" alt="logo">
                Dr simi
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Haz tu consulta medica
                    </h1>
                    <form action="./agendarCita.php" id="formulario" class="space-y-4 md:space-y-6" method="POST">

                        <div>
                            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombres" required="">
                        </div>

                        <div>
                            <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido paterno</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido paterno" required="">
                        </div>

                       

                        <div>
                            <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido materno</label>
                            <input type="text" name="apellido_materno" id="apellido_materno" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido paterno" required="">
                        </div>


                        <div>
                            <label for="horario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido materno</label>
                            <input type="datetime-local" name="horario" id="horario" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido paterno" required="">
                        </div>

                        <div>
                            <label for="mensaje" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                            <textarea rows="5" name="mensaje" id="mensaje" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">

                            </textarea>
                        </div>

                        <div>
                            <label for="especialidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Especialidad</label>

                            <select name="id_especialidad" id="especialidades" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php foreach ($especialidades as $especialidad) : ?>
                                    <option value="<?= $especialidad->id ?>">
                                        <?= $especialidad->especialidad ?>
                                    </option>

                                <?php endforeach; ?>
                            </select>



                        </div>
                        <div>
                            <label for="doctores" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doctor</label>

                            <select name="id_doctor" id="doctores" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php foreach ($especialidades as $especialidad) : ?>


                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button id="enviarButton" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>


<?php
$especialidadesJson = json_encode($especialidades);
$doctoresJson = json_encode($doctores);
?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const especialidadesDOM = document.getElementById('especialidades');
    const doctoresDOM = document.getElementById('doctores');
    const especialidades = <?= $especialidadesJson ?>;
    const doctores = <?= $doctoresJson ?>;
    const enviarButton = document.getElementById('enviarButton');


   enviarButton.addEventListener('click',enviar);




    especialidadesDOM.addEventListener('change', e => {
        const valor = e.target.value;
        doctoresDOM.innerHTML = "";
        const newDoctores = doctores.filter(doctor => doctor.id_especialidad == valor)

        for (let i = 0; i < newDoctores.length; i++) {

            const option = document.createElement('option');

            option.value = newDoctores[i].id;
            option.innerText = newDoctores[i].nombre + " " + newDoctores[i].apellido_paterno +
                " " + newDoctores[i].apellido_materno;;

            doctoresDOM.appendChild(option);
        }


    })


    async function enviar(e){

        e.preventDefault();


        const formDOM = document.getElementById('formulario');
        const formulario = new FormData(formDOM);

       
        console.log(JSON.stringify(Object.fromEntries(formulario)));
        const fetchData = await axios.post('./agendarCita.php',JSON.stringify(Object.fromEntries(formulario)))
        const response = fetchData.data;
        const mensaje = document.getElementById('mensajeConfirmacion');

        if(response == "Guardado correctamente"){
            mensaje.classList.add("bg-green-400");
            mensaje.innerText = "Enviado Correctamente"

            const fetchData = await axios.post('./correo.php',JSON.stringify(Object.fromEntries(formulario)))
            const response = fetchData.data;
        console.log(response);
            return 0;
        }


        mensaje.classList.add("bg-red-400");
        mensaje.innerText = "Error";

        return 0;

    }
    




</script>

<?php include('./includes/templates/footer.php'); ?>