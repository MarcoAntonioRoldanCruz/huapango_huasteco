function confirmar() {
  // Obtener cada valor de los campos del formulario por su ID
  var nombre_completo_participante = $("#nombre_completo_participante").val();
  var fecha_nac_participante = $("#fecha_nac_participante").val();
  var nombre_completo_pareja = $("#nombre_completo_pareja").val();
  var fecha_nac_pareja = $("#fecha_nac_pareja").val();
  var telefono_contacto = $("#telefono_contacto").val();
  var grupo_pareja_id = $("#grupo_pareja_id").is(":checked") ? 1 : 0; // Convertir el checkbox en valor 0 o 1
  var grupo_pareja = $("#grupo_pareja").val();

  // Documentos presentados del participante
  var curp_participante = $("#curp_participante").is(":checked") ? 1 : 0;
  var acta_participante = $("#acta_participante").is(":checked") ? 1 : 0;
  var ine_participante = $("#ine_participante").is(":checked") ? 1 : 0;
  var fotografias_participante = $("#fotografias_participante").is(":checked")
    ? 1
    : 0;

  // Documentos presentados de la pareja
  var curp_pareja = $("#curp_pareja").is(":checked") ? 1 : 0;
  var acta_pareja = $("#acta_pareja").is(":checked") ? 1 : 0;
  var ine_pareja = $("#ine_pareja").is(":checked") ? 1 : 0;
  var fotografias_pareja = $("#fotografias_pareja").is(":checked") ? 1 : 0;

  var nombre_tutor = $("#nombre_tutor").val();
  var telefono_contacto_tutor = $("#telefono_contacto_tutor").val();
  var categoria = $("#categoria").val();
  var estilo = $("#estilo").val();
  var numero_pareja = $("#numero_pareja").val();

  // Enviar los datos a través de AJAX
  $.ajax({
    type: "POST",
    url: "huapango_functions.php",
    data: {
      nombre_completo_participante: nombre_completo_participante,
      fecha_nac_participante: fecha_nac_participante,
      nombre_completo_pareja: nombre_completo_pareja,
      fecha_nac_pareja: fecha_nac_pareja,
      telefono_contacto: telefono_contacto,
      grupo_pareja_id: grupo_pareja_id,
      grupo_pareja: grupo_pareja,
      curp_participante: curp_participante,
      acta_participante: acta_participante,
      ine_participante: ine_participante,
      fotografias_participante: fotografias_participante,
      curp_pareja: curp_pareja,
      acta_pareja: acta_pareja,
      ine_pareja: ine_pareja,
      fotografias_pareja: fotografias_pareja,
      nombre_tutor: nombre_tutor,
      telefono_contacto_tutor: telefono_contacto_tutor,
      categoria: categoria,
      estilo: estilo,
      numero_pareja: numero_pareja
    },
    success: function (response) {
      console.log(response);
      // Mostrar mensaje de éxito o imprimir el resultado
      if (response == "OK") {
        Swal.fire(
          "Concursantes a bailar",
          "Registro realizado exitosamente",
          "success"
        );
        window.open("registro.xlsx", "_blank");
      } else {
        Swal.fire("Error en base de datos", response, "error");
      }
    },
    error: function (xhr, status, error) {
      console.log(error);
      // Mostrar mensaje de error
      Swal.fire("Error fatal", error, "error");
    }
  });
}

function pareja_independiente() {
  var grupo_pareja = $("#grupo_pareja").val();
  var grupo_pareja_id = $("#grupo_pareja_id").prop("checked");
  console.log(grupo_pareja_id);

  if (grupo_pareja_id) {
    if (grupo_pareja == "") {
      $("#grupo_pareja").val("Pareja independiente");
    }
  } else {
    $("#grupo_pareja").val("");
  }
}

function categoria_calcular() {
  var fechaParticipante = $("#fecha_nac_participante").val();
  var fechaPareja = $("#fecha_nac_pareja").val();
  var fechaNacimiento = fechaParticipante || fechaPareja; // Usar la fecha que esté disponible

  if (!fechaNacimiento) {
    return; // No hacer nada si no hay fecha de nacimiento seleccionada
  }

  var hoy = new Date();
  var nacimiento = new Date(fechaNacimiento);
  var edad = hoy.getFullYear() - nacimiento.getFullYear();
  var mes = hoy.getMonth() - nacimiento.getMonth();

  if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
    edad--;
  }

  // Calcular años
  var edadAnios = hoy.getFullYear() - nacimiento.getFullYear();
  var mes = hoy.getMonth() - nacimiento.getMonth();
  if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
    edadAnios--;
  }

  // Calcular meses
  var edadMeses = hoy.getMonth() - nacimiento.getMonth();
  if (edadMeses < 0) {
    edadMeses += 12;
  } else if (hoy.getDate() < nacimiento.getDate()) {
    edadMeses--;
  }

  // Calcular días
  var edadDias = hoy.getDate() - nacimiento.getDate();
  if (edadDias < 0) {
    var ultimoDiaMesAnterior = new Date(
      hoy.getFullYear(),
      hoy.getMonth(),
      0
    ).getDate();
    edadDias += ultimoDiaMesAnterior;
  }

  var categoria = "";

  if (edad < 7 || (edad === 7 && mes < 0)) {
    categoria = "Pequeños Huapangueritos";
  } else if (edad < 13 || (edad === 13 && mes < 0)) {
    categoria = "Infantil";
  } else if (edad < 17 || (edad === 17 && mes < 0)) {
    categoria = "Juvenil";
  } else {
    categoria = "Adulto";
  }

  // alert('Edad: ' + edadAnios + ' años, ' + edadMeses + ' meses, ' + edadDias + ' días.\nCategoría: ' + categoria);
  const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: true,
    timer: 3600,
    timerProgressBar: false,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
  });
  Toast.fire({
    icon: "info",
    title:
      "DE LA PERSONA MAYOR.- " +
      "Edad: " +
      edadAnios +
      " años, " +
      edadMeses +
      " meses, " +
      edadDias +
      " días.\nCategoría: " +
      categoria
  });

  $("#categoria").val(categoria);
}
