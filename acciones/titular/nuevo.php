<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$resp = new NuevoResponse();
$resp->IsOk = true;

if ($req->Titular->Direccion->Calle == null) {
    $resp->IsOk = false;
    $resp->Mensaje = 'La direccion es obligatoria';
}

if ($req->Titular->Direccion->CalleNro == null) {
    $resp->IsOk = false;
    $resp->Mensaje = 'La direccion es obligatoria';
}

if ($req->Titular->Direccion->Localidad == null) {
    $resp->IsOk = false;
    $resp->Mensaje = 'La direccion es obligatoria';
}

if ($req->Titular->Direccion->Provincia == null) {
    $resp->IsOk = false;
    $resp->Mensaje = 'La direccion es obligatoria';
}

if ($req->Titular->NroDocumento == null) {
    $resp->IsOk = false;
    $resp->Mensaje = $resp->Mensaje . '-El Numero de Documento es obligatorio';
}

if ($req->Titular->ApellidoNombre == null) {
    $resp->IsOk = false;
    $resp->Mensaje = $resp->Mensaje . '-El Apellido y Nombre es obligatorio';
}

if ($resp->IsOk == true) {
    $resp->Mensaje = 'Titular agregado correctamente';
}

echo json_encode($resp);
