<?php

use Illuminate\Support\Facades\Broadcast;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Aquí puedes registrar todos los canales de difusión que tu
| aplicación admite. Usa el método `Broadcast::channel`
| para comprobar si el usuario puede escuchar ese canal.
|
*/

Broadcast::channel('reportes', function ($user) {
    return $user !== null; //  $user->isUser()
});
