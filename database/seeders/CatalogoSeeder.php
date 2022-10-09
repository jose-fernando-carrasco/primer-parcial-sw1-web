<?php

namespace Database\Seeders;

use App\Models\Catalogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Catalogos Idalia
        $catalogo1 = new Catalogo();
        $catalogo1->titulo = "Arquitectura";
        $catalogo1->descripcion = "es una forma muy específica y artística de fotografía que requiere mucho más que solo apuntar y disparar. Incluye desde fotografiar interiores y exteriores de edificios, su contexto, así como puentes y otras estructuras.";
        $catalogo1->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Idalia+Carrasco/Catalogos/Arquitectura/fotografia-arquitectura.jpg";
        $catalogo1->fotografo_id = 1;
        $catalogo1->save();

        $catalogo2 = new Catalogo();
        $catalogo2->titulo = "Artistica";
        $catalogo2->descripcion = "es aquella que el autor ha creado con el fin de transmitir un sentimiento o una sensación y no, solamente, busquen captar el momento que están presenciando. Lo más valorado en este estilo fotográfico es la intención.";
        $catalogo2->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Idalia+Carrasco/Catalogos/Artistica/fotografia-artistica.jpg";
        $catalogo2->fotografo_id = 1;
        $catalogo2->save();

        $catalogo3 = new Catalogo();
        $catalogo3->titulo = "Autor";
        $catalogo3->descripcion = "lo que se fotografía es la acción misma de fotografiar”. Antes de ser una reproducción de la realidad, la fotografía es un acto a través del cual se produce la grabación de una situación luminosa, en un lugar y momentos determinados.";
        $catalogo3->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Idalia+Carrasco/Catalogos/Autor/fotografia-autor.jpg";
        $catalogo3->fotografo_id = 1;
        $catalogo3->save();

        $catalogo4 = new Catalogo();
        $catalogo4->titulo = "Reportaje";
        $catalogo4->descripcion = "es una actividad artística e informativa, de crónica social y de memoria histórica. Se trata de una nueva forma de periodismo, que utiliza imágenes para narrar historias así como para dar a conocer noticias.";
        $catalogo4->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Idalia+Carrasco/Catalogos/Reportaje/reportaje-fotografico.jpg";
        $catalogo4->fotografo_id = 1;
        $catalogo4->save();

        //Catalogos Julio Iglesias
        $catalogo5 = new Catalogo();
        $catalogo5->titulo = "Documental";
        $catalogo5->descripcion = "consiste en una serie de imágenes que reflejan una realidad con propósitos sociales, culturales o científicos. Existe un fuerte compromiso entre el fotógrafo y el estudio del tema que se desea tratar";
        $catalogo5->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Documental/fotografia-documental.jpg";
        $catalogo5->fotografo_id = 2;
        $catalogo5->save();

        $catalogo6 = new Catalogo();
        $catalogo6->titulo = "Publicitario";
        $catalogo6->descripcion = "presenta fielmente todos los atributos de cierto objeto. Su forma, color, textura, transparencia o tamaño, etcétera. Además, visualmente debe parecer muy atractivo y característicamente subjetivas.";
        $catalogo6->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Publicitario/fotografia-publicitaria.jpg";
        $catalogo6->fotografo_id = 2;
        $catalogo6->save();

        $catalogo7 = new Catalogo();
        $catalogo7->titulo = "Deportes";
        $catalogo7->descripcion = "dedicada a capturar momentos relacionados con los deportes. Como puedes ver, se trata de un concepto amplio, ya que existen multitud de deportes, cada uno con sus características y estilo propios.";
        $catalogo7->url = "https://mycontenedor23.s3.amazonaws.com/Fotografos/Julio+Iglesia/Catalogos/Deportes/fotografia-deportiva.jpg";
        $catalogo7->fotografo_id = 2;
        $catalogo7->save();

    }
}
