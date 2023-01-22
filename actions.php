<?php

use function PHPSTORM_META\type;

function getToken()
{
    # Funcao para buscar o token
    $galaxId = "5473";
    $galaxHash = "83Mw5u8988Qj6fZqS4Z8K7LzOo1j28S706R0BeFe";
    $url = "https://api.sandbox.cloud.galaxpay.com.br/v2/token";
    $header = array('Authorization: Basic ' . base64_encode($galaxId . ':' . $galaxHash));
    $body = '{
    "grant_type": "authorization_code",
    "scope": "customers.read customers.write plans.read plans.write transactions.read transactions.write webhooks.write cards.read cards.write card-brands.read subscriptions.read subscriptions.write charges.read charges.write boletos.read"
}';
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $header
    ]);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function getClientes()
{

    # Funcao de listar cliente
    $urlGetClient = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers?startAt=0&limit=100";
    $chaves = json_decode(getToken(), true);
    $headerGetClient = ["Authorization:" . $chaves['token_type'] . " " . $chaves['access_token']];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $urlGetClient,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $headerGetClient
    ]);
    $resposta = curl_exec($curl);
    curl_close($curl);

    $clientesTotais = json_decode($resposta, true);
    $users = $clientesTotais["Customers"];

    return $users;
}

function createUserAction($name)
{
    // Funcao de post
    $urlPostClient = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers";
    $chaves = json_decode(getToken(), true);
    $headerPostClient = ["Authorization:" . $chaves['token_type'] . " " . $chaves['access_token']];
    $body = [
        "myId" => "pay-63cac82687f301.98640401",
        "name" => $name,
        "document" => "88914963756",
        "emails" => [
            "chimbinha@galaxpay.com.br",
            "teste3724email2130@galaxpay.com.br"
        ],
        "phones" => [
            3140201512,
            31983890110
        ],
        "Address" => [
            "zipCode" => "30411330",
            "street" => "Rua platina",
            "number" => "1330",
            "complement" => "2º andar",
            "neighborhood" => "Prado",
            "city" => "Belo Horizonte",
            "state" => "MG"
        ]
    ];

    $body =  json_encode($body);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $urlPostClient,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PATCH',
        CURLOPT_HTTPHEADER => $headerPostClient
    ]);
    $respostaPost = curl_exec($curl);
    curl_close($curl);

    return $respostaPost;
}

function updateUserAction($galaxPayId, $name)
{
    # Funcao de Alterar pelo GalaxPayIds
    $urlPutClient = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers/$galaxPayId/galaxPayId";
    echo "<pre>";
    print_r($urlPutClient);
    echo "<pre>";

    $chaves = json_decode(getToken(), true);
    $headerPutClient = ["Authorization:" . $chaves['token_type'] . " " . $chaves['access_token']];
    $body = [
        "myId" => "pay-63cc82f2ab53c5.08366324",
        "name" => $name,
        "document" => "84997791822",
        "emails" => [
            "teste8585email7890@galaxpay.com.br",
            "teste2993email8343@galaxpay.com.br"
        ],
        "phones" => [
            3140201512,
            31983890110
        ],
        "Address" => [
            "zipCode" => "30411330",
            "street" => "Rua platina",
            "number" => "1330",
            "complement" => "2º andar",
            "neighborhood" => "Prado",
            "city" => "Belo Horizonte",
            "state" => "MG"
        ]
    ];
    
    $body =  json_encode($body);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $urlPutClient,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => $headerPutClient
    ]);
    $respostaPut = curl_exec($curl);

    
    curl_close($curl);

    echo "<pre>";
    print_r($respostaPut);
    echo "<pre>";

    echo "Usuario Alterado";

    return $respostaPut;
}

function deleteUserAction($galaxPayId)
{
    # Funcao para deletar usuario
    $urlDeleteClient = "https://api.sandbox.cloud.galaxpay.com.br/v2/customers/$galaxPayId/galaxPayId";
    $chaves = json_decode(getToken(), true);
    $headerPutClient = ["Authorization:" . $chaves['token_type'] . " " . $chaves['access_token']];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $urlDeleteClient,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => $headerPutClient
    ]);
    $respostaDelete = curl_exec($curl);
    curl_close($curl);

    echo "<pre>";
    print_r($respostaDelete);
    echo "<pre>";

    echo "Usuario Deletado";

    return $respostaDelete;
}
