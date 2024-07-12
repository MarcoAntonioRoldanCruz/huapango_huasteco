$(function () {
  $(function () {
    $("#nombre_completo_participante").autocomplete({
      source: function (request, response) {
        $.ajax({
          type: "POST",
          url: "buscar_participantes.php",
          data: {
            nombre_completo_participante: request.term,
            accion: "listar_participantes",
          },
          dataType: "json",
          success: function (dataResult) {
            // console.log(dataResult);
            response(
              $.map(dataResult.items, function (item) {
                // console.log(dataResult.items);
                return {
                  id: item.id_registro, // 0 = Clave oficial
                  label: item.nombre_completo_participante,
                  value: item.nombre_completo_participante,
                };
              })
            );
          },
          error: function (xhr) {
            console.log(xhr.responseText);

            // TOAST de error
            const Toast = Swal.mixin({
              toast: true,
              position: "bottom-end",
              showConfirmButton: true,
              timer: 3600,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
              },
            });
            Toast.fire({
              icon: "error",
              title: "Ha ocurrido un error, informa al programador",
            });
            // TERMINA Toast
          },
        });
      },
      select: function (e, ui) {
        console.log(ui.item.id);

        $.ajax({
          type: "POST",
          url: "buscar_participantes",
          data: {
            id_registro: ui.item.id,
            accion: "buscar_participante",
          },
          dataType: "JSON",
          success: function (response) {
            // console.log(response); // OK
            var item = response.item;
            console.log(item);
            $("#id_registro").val(item.id_registro);
            $("#nombre_completo_participante").val(
              item.nombre_completo_participante
            );
            $("#fecha_nac_participante").val(
              item.fecha_nacimiento_participante
            );
            $("#nombre_completo_pareja").val(item.nombre_completo_pareja);
            $("#fecha_nac_pareja").val(item.fecha_nacimiento_pareja);
            $("#telefono_contacto").val(item.telefono_contacto);
            $("#grupo_pareja").val(item.representacion);

            if (item.curp_participante == 1) {
              $("#curp_participante").prop("checked", true);
            }
            if (item.acta_nac_participante == 1) {
              $("#acta_participante").prop("checked", true);
            }
            if (item.ine_participante == 1) {
              $("#ine_participante").prop("checked", true);
            }
            if (item.fotografia_participante == 1) {
              $("#fotografias_participante").prop("checked", true);
            }
            if (item.curp_participante == 1) {
              $("#curp_participante").prop("checked", true);
            }
            if (item.curp_pareja == 1) {
              $("#curp_pareja").prop("checked", true);
            }
            if (item.acta_nac_pareja == 1) {
              $("#acta_pareja").prop("checked", true);
            }
            if (item.ine_pareja == 1) {
              $("#ine_pareja").prop("checked", true);
            }
            if (item.fotografia_pareja == 1) {
              $("#fotografias_pareja").prop("checked", true);
            }
            if (item.curp_pareja == 1) {
              $("#curp_pareja").prop("checked", true);
            }
            $("#nombre_completo_tutor").val(item.nombre_completo_tutor);
            $("#telefono_tutor").val(item.telefono_tutor);
            $("#categoria").val(item.categoria);
            $("#estilo").val(item.estilo);
            $("#numero_pareja").val(item.numero_pareja);
          },
          error: function (xhr) {
            console.log(xhr.responseText);
          },
        });
      },
    });
  });
});

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

  var nombre_completo_tutor = $("#nombre_completo_tutor").val();
  var telefono_tutor = $("#telefono_tutor").val();
  var categoria = $("#categoria").val();
  var estilo = $("#estilo").val();
  var numero_pareja = $("#numero_pareja").val();

  var id_registro = $("#id_registro").val();
  // Enviar los datos a través de AJAX
  $.ajax({
    type: "POST",
    url: "huapango_functions.php",
    data: {
      id_registro: id_registro,
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
      nombre_completo_tutor: nombre_completo_tutor,
      telefono_tutor: telefono_tutor,
      categoria: categoria,
      estilo: estilo,
      numero_pareja: numero_pareja,
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
        $("#registro").trigger("reset");
      } else {
        Swal.fire("Error en base de datos", response, "error");
      }
    },
    error: function (xhr, status, error) {
      console.log(error);
      // Mostrar mensaje de error
      Swal.fire("Error fatal", error, "error");
    },
  });
}

function pareja_independiente() {
  var grupo_pareja = $("#grupo_pareja").val();
  var grupo_pareja_id = $("#grupo_pareja_id").prop("checked");
  // console.log(grupo_pareja_id);

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

  // Convertir las fechas de nacimiento a objetos Date
  var nacimientoParticipante = fechaParticipante
    ? new Date(fechaParticipante)
    : null;
  var nacimientoPareja = fechaPareja ? new Date(fechaPareja) : null;

  // Usar la fecha que esté disponible
  var fechaNacimiento = nacimientoParticipante || nacimientoPareja;

  if (!fechaNacimiento) {
    return; // No hacer nada si no hay fecha de nacimiento seleccionada
  }

  var hoy = new Date();
  var nacimiento = new Date(fechaNacimiento);

  // Calcular edad de la persona mayor
  var mayorNacimiento;
  if (nacimientoParticipante && nacimientoPareja) {
    mayorNacimiento =
      nacimientoParticipante > nacimientoPareja
        ? nacimientoPareja
        : nacimientoParticipante;
  } else {
    mayorNacimiento = nacimientoParticipante || nacimientoPareja;
  }

  var edadAnios = hoy.getFullYear() - mayorNacimiento.getFullYear();
  var mes = hoy.getMonth() - mayorNacimiento.getMonth();
  if (mes < 0 || (mes === 0 && hoy.getDate() < mayorNacimiento.getDate())) {
    edadAnios--;
  }

  var edadMeses = hoy.getMonth() - mayorNacimiento.getMonth();
  if (edadMeses < 0) {
    edadMeses += 12;
  } else if (hoy.getDate() < mayorNacimiento.getDate()) {
    edadMeses--;
  }

  var edadDias = hoy.getDate() - mayorNacimiento.getDate();
  if (edadDias < 0) {
    var ultimoDiaMesAnterior = new Date(
      hoy.getFullYear(),
      hoy.getMonth(),
      0
    ).getDate();
    edadDias += ultimoDiaMesAnterior;
  }

  // Determinar categoría
  var categoria = "";
  if (edadAnios < 7 || (edadAnios === 7 && edadMeses < 0)) {
    categoria = "Pequeños Huapangueritos";
  } else if (edadAnios < 13 || (edadAnios === 13 && edadMeses < 0)) {
    categoria = "Infantil";
  } else if (edadAnios < 17 || (edadAnios === 17 && edadMeses < 0)) {
    categoria = "Juvenil";
  } else {
    categoria = "Adulto";
  }

  // Comparar edades y determinar el título del mensaje
  var title = "";
  if (nacimientoParticipante && nacimientoPareja) {
    if (nacimientoParticipante.getTime() > nacimientoPareja.getTime()) {
      title = "PAREJA ES MAYOR";
    } else if (nacimientoPareja.getTime() > nacimientoParticipante.getTime()) {
      title = "CONCURSANTE ES MAYOR";
    } else {
      title = "AMBOS TIENEN LA MISMA EDAD";
    }
  } else if (nacimientoParticipante) {
    title = "SOLO HAY CONCURSANTE";
  } else {
    title = "SOLO HAY PAREJA";
  }

  // Mostrar alerta con SweetAlert2
  const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: true,
    timer: 3600,
    timerProgressBar: false,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });
  Toast.fire({
    icon: "info",
    title:
      title +
      ". Edad: " +
      edadAnios +
      " años, " +
      edadMeses +
      " meses, " +
      edadDias +
      " días.\nCategoría: " +
      categoria,
  });

  $("#categoria").val(categoria);
}
