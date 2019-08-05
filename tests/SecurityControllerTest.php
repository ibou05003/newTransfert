<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient([],[
            'PHP_AUTH_USER'=>"ibou@ibou.com",
            'PHP_AUTH_PW'=>"passer"
        ]);
        $crawler = $client->request('GET', '/api/users/');
        $rep=$client->getResponse();
        $this->assertSame(200,$client->getResponse()->getStatusCode());
    }
    // public function testAjoutOk()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>"ibou@ibou.com",
    //         'PHP_AUTH_PW'=>"passer"
    //     ]);
    //     $crawler = $client->request('POST', '/api/users/register',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{  "id": 17,
    //         "email": "username@ibou.com",
    //         "roles": ["ROLE_Caissier"],
    //         "password": "passer",
    //         "proprietaire": "",
    //         "compte": "WARI",
    //         "nombreConnexion": 0,
    //         "status": "Actif",
    //     }');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(200,$client->getResponse()->getStatusCode());
    // }
    // public function testAjoutKo()
    // {
    //     $client = static::createClient([],[
    //         'PHP_AUTH_USER'=>"ibou@ibou.com",
    //         'PHP_AUTH_PW'=>"passer"
    //     ]);
    //     $crawler = $client->request('POST', '/api/users/register',[],[],
    //     ['CONTENT_TYPE'=>"application/json"],
    //     '{  "id": 17,
    //         "email": "username@ibou.com",
    //         "roles": ["ROLE_Caissier"],
    //         "password": "passer",
    //         "proprietaire": "WARI",
    //         "compte": "WARI",
    //         "imageName": "null",
    //         "nombreConnexion": 0,
    //         "status": "Actif",
    //     }');
    //     $rep=$client->getResponse();
    //     var_dump($rep);
    //     $this->assertSame(400,$client->getResponse()->getStatusCode());
    // }
}
