<?php

namespace Database\Seeders;

use App\Models\Imagen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagen1 = new Imagen();
        $imagen1->name = "Cristiano Ronaldo";
        $imagen1->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/Cristiano-Ronaldo.jpg";
        $imagen1->catalogo_id = 7;
        $imagen1->save();

        $imagen2 = new Imagen();
        $imagen2->name = "Luis Suarez";
        $imagen2->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/luis-suarez.jpg";
        $imagen2->catalogo_id = 7;
        $imagen2->save();

        $imagen3 = new Imagen();
        $imagen3->name = "Marcelo Martins";
        $imagen3->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/marcelo-martins.jpg";
        $imagen3->catalogo_id = 7;
        $imagen3->save();

        $imagen4 = new Imagen();
        $imagen4->name = "Lionel Messi PSG";
        $imagen4->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/messi-psg.jpg";
        $imagen4->catalogo_id = 7;
        $imagen4->save();

        $imagen5 = new Imagen();
        $imagen5->name = "Lionel Messi Barca";
        $imagen5->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/messi.jpg";
        $imagen5->catalogo_id = 7;
        $imagen5->save();

        $imagen6 = new Imagen();
        $imagen6->name = "Robert Lewandowski";
        $imagen6->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/robert-lewandowski.jpg";
        $imagen6->catalogo_id = 7;
        $imagen6->save();

        $imagen7 = new Imagen();
        $imagen7->name = "Ronaldinho Brasil";
        $imagen7->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/ronaldinho-brasil.jpg";
        $imagen7->catalogo_id = 7;
        $imagen7->save();

        //Documentales
        $imagen8 = new Imagen();
        $imagen8->name = "Angela Peres";
        $imagen8->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/Angela-Peres.jpg";
        $imagen8->catalogo_id = 5;
        $imagen8->save();

        $imagen9 = new Imagen();
        $imagen9->name = "Cambio Climatico";
        $imagen9->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/cambio-climatico.jpg";
        $imagen9->catalogo_id = 5;
        $imagen9->save();

        $imagen10 = new Imagen();
        $imagen10->name = "Crisis en Poblacion";
        $imagen10->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/crisis-poblacion.jpg";
        $imagen10->catalogo_id = 5;
        $imagen10->save();

        $imagen11 = new Imagen();
        $imagen11->name = "Cultura Indigena";
        $imagen11->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/cultura-indigena.jpg";
        $imagen11->catalogo_id = 5;
        $imagen11->save();

        $imagen12 = new Imagen();
        $imagen12->name = "Hermanos Inseparables";
        $imagen12->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/hermanos-inseparables.jpg";
        $imagen12->catalogo_id = 5;
        $imagen12->save();

        $imagen13 = new Imagen();
        $imagen13->name = "The Jinx";
        $imagen13->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/The-Jinx.jpg";
        $imagen13->catalogo_id = 5;
        $imagen13->save();

    }
}
