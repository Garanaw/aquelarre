<?php

declare(strict_types=1);

namespace Database\Seeders\Core\SocialPosition;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society\SocietyLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class SocialPositionSeeder extends Seeder
{
    protected string $table = 'social_positions';

    public function run(): void
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
    }

    public function getData(): array
    {
        /** @var SocietyLoader $societies */
        $societies = tap(
            value: $this->getLoader(SocietyLoader::class),
            callback: static fn (SocietyLoader $loader) => $loader->load()
        );

        return [
            [
                'name' => 'Alta Nobleza',
                'society_id' => $societies->christian(),
                'has_title' => true,
                'description' => 'El escalafón más alto de la sociedad medieval, grandes propietarios de tierra instalados en castillos, ciudades o en la corte, donde aconsejan al rey sobre la política a seguir —cuando no lo controlan directamente—. Vuelve a tirar 1D10 para averiguar el título nobiliario que posee la familia del PJ, título que sólo heredará el personaje si sus padres mueren, es de sexo masculino y es además el primogénito de la familia. Si los padres siguen vivos, es mujer o no es el primogénito, sólo tendrá título de caballero (o dama para las mujeres).',
            ],
            [
                'name' => 'Baja Nobleza',
                'society_id' => $societies->christian(),
                'has_title' => true,
                'description' => 'Gentes ennoblecidas por el rey o por un noble en reconocimiento a sus méritos —sobre todo en el campo de batalla— o los hijos de nobles que no han heredado el título de su padre. Poseen todos los privilegios que supone pertenecer al estamento nobiliario, pero cuentan con muy pocas propiedades —a veces, ninguna—, por lo que suelen estar al servicio del rey o de otro noble más poderoso que ellos. Vuelve a tirar 1D10 para averiguar qué título posee la familia del PJ, que sólo podrá heredar el personaje cuando mueran sus padres, siempre y cuando sea varón y el primogénito de la familia. Si no se dan esos factores, el PJ sólo tendrá el título de hidalgo.',
            ],
            [
                'name' => 'Burguesía',
                'society_id' => $societies->christian(),
                'has_title' => false,
                'description' => 'Se consideran burgueses a todas aquellas personas que, sin pertenecer a la nobleza, han conseguido el suficiente grado de poder económico —en muchas ocasiones, mucho mayor que el de algunos nobles— como para imponer sus opiniones en la sociedad medieval, a pesar de no disfrutar de los privilegios de los estamentos superiores. Suelen residir en las mayores ciudades de los reinos.',
            ],
            [
                'name' => 'Villano',
                'society_id' => $societies->christian(),
                'has_title' => false,
                'description' => 'Son todos aquellos plebeyos que residen en las ciudades, personas de condición humilde que no están al servicio de los nobles y que trabajan para ellos mismos o, en muchos casos, para algún rico burgués de la ciudad.',
            ],
            [
                'name' => 'Campesino',
                'society_id' => $societies->christian(),
                'has_title' => true,
                'description' => 'La clase más baja de la sociedad medieval cristiana. Existen tres clases diferentes de campesinos, así quetira 1D10 para comprobar a cuál de ellas pertenece tu PJ',
            ],
            [
                'name' => 'Esclavo',
                'society_id' => $societies->christian(),
                'has_title' => false,
                'description' => 'Al igual que los musulmanes, también los reinos cristianos utilizan esclavos, en su mayor parte prisioneros de guerras infieles, ya que la Iglesia prohíbe esclavizar a otro cristiano. El esclavo es considerado propiedad de su señor al que, al menos legalmente, el personaje deberá obedecer. El señor será un PNJ controlado por el DJ u otro de los personajes jugadores si así lo designa el jugador o el DJ.',
            ],
            [
                'name' => 'Burguesía',
                'society_id' => $societies->judaic(),
                'has_title' => false,
                'description' => 'Los judíos burgueses son aquéllos enriquecidos gracias a sus oficios o negocios y que pueden llegar a relacionarse con las grandes familias aristocráticas e incluso con el propio rey. Algunos de ellos ostentan cargos de verdadero poder en sus reinos.',
            ],
            [
                'name' => 'Villano',
                'society_id' => $societies->judaic(),
                'has_title' => false,
                'description' => 'Se trata de aquellos trabajadores judíos de carácter humilde que habitan en las juderías de las ciudades dedicándose a su profesión, habitualmente la artesanía, ya sea como profesional independiente o al servicio de un rico burgués.',
            ],
            [
                'name' => 'Alta Nobleza',
                'society_id' => $societies->muslim(),
                'has_title' => true,
                'description' => 'Al igual que ocurre en los reinos cristianos, el mundo islámico también posee estamentos aristocráticos, basados en su mayor parte en el linaje al que se pertenece y en el conocimiento de la tradición y la ley coránica, aunque muchos han sido desplazados por los descendientes de funcionarios y burócratas. Vuelve a tirar 1D10 para averiguar el título que posee la familia del PJ, ya que al igual que ocurre en la sociedad cristiana, el personaje sólo heredará el título si sus padres mueren, es de sexo masculino y es además el primogénito de la familia. Si los padres siguen vivos, es mujer o no es el primogénito, sólo se le considerará con el mismo rango que un sa´id.',
            ],
            [
                'name' => 'Baja Nobleza',
                'society_id' => $societies->muslim(),
                'has_title' => true,
                'description' => 'En la sociedad islámica también existen miembros de la clase nobiliaria que tienen poco más que el título de sus antepasados y muy escasas propiedades. Vuelve a tirar 1D10 para averiguar el título que posee la familia del PJ y que, al contrario de lo que ocurre en la Alta Nobleza, también ostenta tu personaje',
            ],
            [
                'name' => 'Mercader',
                'society_id' => $societies->muslim(),
                'has_title' => false,
                'description' => 'Son dueños de las grandes fortunas del reino nazarí, poderosos terratenientes emparentados con la vieja aristocracia tribal y la burocracia del sultán.',
            ],
            [
                'name' => 'Ciudadano',
                'society_id' => $societies->muslim(),
                'has_title' => false,
                'description' => 'Son los habitantes humildes de las ciudades granadinas que suelen ejercer los oficios de artesano y pequeño comerciante agrupados en gremios u oficios, como ocurre en los reinos cristianos.',
            ],
            [
                'name' => 'Campesino',
                'society_id' => $societies->muslim(),
                'has_title' => true,
                'description' => 'De forma parecida a la sociedad cristiana, los campesinos musulmanes rara vez son dueños de la tierra que trabajan, aunque las condiciones de vida que disfrutan suelen ser mejores en el reino nazarí.',
            ],
            [
                'name' => 'Esclavo',
                'society_id' => $societies->muslim(),
                'has_title' => false,
                'description' => 'La clase más baja de la sociedad islámica; antiguos prisioneros de guerra o cautivos de África o del norte de Europa utilizados como mano de obra barata o guardaespaldas de su señor. Algunos de ellos son castrados en su niñez para convertirlos en eunucos, por los que se conseguía un alto precio en los mercados esclavistas del reino (si tu PJ es de sexo masculino tira 1D10: si obtienes un 9 o un 10, serás un eunuco). Los personajes que adquieran esta posición social deben tener en cuenta que se les considera propiedad privada de su señor al que, al menos legalmente, deberán obedecer. El señor será un PNJ controlado por el DJ u otro de los personajes jugadores si así lo designa el jugador o el DJ.',
            ],
        ];
    }
}
