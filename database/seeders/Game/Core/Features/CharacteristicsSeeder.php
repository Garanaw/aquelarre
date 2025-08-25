<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features;

use App\Game\Core\Features\Characteristics\Domain\Enum\Prefix;
use Garanaw\SeedableMigrations\Seeder;

class CharacteristicsSeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('characteristics')->insert($this->getData());
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'Fuerza',
                'prefix' => Prefix::STRENGTH->value,
                'latin' => 'Vis',
                'primary' => true,
                'description' => 'Mide la fuerza bruta del personaje, su capacidad muscular: cuanto más alta sea, más peso podrá cargar, levantar o arrojar; más potencia y energía tendrán sus brazos, piernas o manos; más firme será su zancada y más difícil será derribarlo. Se puede tirar por Fuerza para derribar una puerta, para apresar a una persona, para levantar un carromato o para resistir una carga. Incide directamente en el uso de competencias para el manejo de grandes armas, como los espadones o las hachas.',
            ],
            [
                'name' => 'Agilidad',
                'prefix' => Prefix::AGILITY->value,
                'latin' => 'Agilitas',
                'primary' => true,
                'description' => 'Determina la destreza y coordinación muscular del personaje, su velocidad, la rapidez de sus movimientos, la elasticidad de su cuerpo y su ligereza al caminar. Un personaje tendrá que tirar por Agilidad para realizar algún tipo de acrobacia, para agarrarse rápidamente a un objeto, para evitar ser golpeado por un objeto que le cae encima o si queremos que pase por un lugar estrecho. Es la característica base de competencias como Correr, Esquivar, Saltar o Sigilo.',
            ],
            [
                'name' => 'Habilidad',
                'prefix' => Prefix::ABILITY->value,
                'latin' => 'Calliditas',
                'primary' => true,
                'description' => 'Representa la coordinación manual que posee el personaje, la soltura necesaria para llevar a cabo buena parte de las acciones que necesitan del uso de las manos. Se puede tirar por Habilidad para llevar a cabo trabajos manuales delicados, para limpiar los engranajes de una ballesta, para modelar una figura con piedra o madera, o para mantener horizontal una bandeja llena de jarras y viandas. Además, Habilidad es la característica principal de un buen número de competencias, desde Espadas a Escamotear, pasando por Sanar o Forzar Mecanismos.',
            ],
            [
                'name' => 'Resistencia',
                'prefix' => Prefix::RESILIENCE->value,
                'latin' => 'Vigor',
                'primary' => true,
                'description' => 'Esta competencia mide la salud física del personaje, su fortaleza frente a las enfermedades, los venenos u otras agresiones similares, y la cantidad de daño que es capaz de soportar antes de perder el conocimiento o morir. Será necesario realizar tiradas de Resistencia para aguantar toda una noche sin dormir, para evitar un  esmayo, para mantenerse sereno en una competición de bebida o para no caer exhausto tras una larga carrera. Esta característica no incide en ninguna de las competencias, pero repercute directamente en los Puntos de Vida del personaje.',
            ],
            [
                'name' => 'Percepción',
                'prefix' => Prefix::PERCEPTION->value,
                'latin' => 'Perceptio',
                'primary' => true,
                'description' => 'Representa el grado de captación sensorial que poseen las facultades perceptivas del personaje (vista, oído, gusto, tacto y olfato), el nivel de consciencia que posee sobre el mundo que le rodea y que es capaz de aprehender a través de sus cinco sentidos. Aunque sólo nos veremos en muy contadas ocasiones en la obligación de hacer tiradas de Percepción, ya que las competencias de Descubrir, Escuchar y Degustar cubren casi todas las posibilidades, puede que determinadas situaciones lo exijan, como palpar en la oscuridad para encontrar la salida de un lugar o sentir un ligero descenso de la temperatura en una habitación.',
            ],
            [
                'name' => 'Comunicación',
                'prefix' => Prefix::COMMUNICATION->value,
                'latin' => 'Communicat',
                'primary' => true,
                'description' => 'Mide la capacidad de diálogo que posee el personaje, su labia, su desparpajo, su habilidad para hacerse escuchar y para convencer a todos aquéllos que hablan con él, lo cómodo o confiado que se sienta el personaje en sus relaciones con los que le rodean. Todas aquellas competencias que implican un intercambio de palabras entre personajes, como Comerciar, Elocuencia o Idioma, se basan en esta característica; sin embargo, en ocasiones debemos tirar directamente por Comunicación; por ejemplo, si deseamos transmitir por señas lo que queremos decir a una persona que no nos entiende, o si queremos relatar una historia que la gente recuerde mucho tiempo después de ser contada.',
            ],
            [
                'name' => 'Cultura',
                'prefix' => Prefix::CULTURE->value,
                'latin' => 'Doctrina',
                'primary' => true,
                'description' => 'Esta característica representa los conocimientos generales que el personaje ha aprendido a lo largo de su vida, ya procedan de una vida dedicada al estudio o de aquellos saberes que se aprenden trabajando o escuchando las historias de los mayores. Deberemos tirar por Cultura para comprobar si nuestro personaje es capaz de recordar acontecimientos históricos pasados —la coronación de un rey, la fecha de una batalla importante...—, reconocer personalidades importantes del reino —aunque sólo conozca su nombre de oídas—, u orientarse por el interior de un castillo basándose en la distribución habitual de este tipo de construcciones. Si has jugado a otros juegos de rol puede ser que confundas la característica Cultura con el rasgo de Inteligencia que se usa en muchos de ellos, pero nada más alejado de la realidad: en Aquelarre la inteligencia del personaje no es un valor numérico, ya que es la misma que demuestre su jugador en la partida; la Cultura simplemente indica los conocimientos y saberes que posee el personaje.',
            ],
            [
                'name' => 'Suerte',
                'prefix' => Prefix::LUCK->value,
                'latin' => 'Fortuna',
                'primary' => false,
                'description' => 'Representa la buena o mala fortuna del personaje, una característica que le permitirá sobrevivir a situaciones verdaderamente difíciles gracias a una mezcla de coraje, arrojo y, sobretodo, azar. Todos los personajes tendrán siempre una Suerte total igual a la suma de su Comunicación, Percepción y Cultura, un valor que sólo subirá o bajará si lo hacen las características en las que se basa.
                Suerte = Comunicación + Percepción + Cultura',
            ],
            [
                'name' => 'Templanza',
                'prefix' => Prefix::TEMPERANCE->value,
                'latin' => 'Temperantia',
                'primary' => false,
                'description' => 'Si hemos descrito la característica Resistencia como la fortaleza física del personaje, la Templanza sería su fortaleza mental, su ánimo, su fuerza de voluntad, ese espíritu interior que nos permite sobreponernos a las penalidades, a las visiones más dantescas, al horror y al tormento. Se calcula tirando 5D10 y sumando 25 al resultado, y aunque es un valor que puede aumentar o disminuir conforme vayamos jugando, lo hará en muy raras ocasiones. Templanza = 25 + 5D10',
            ],
            [
                'name' => 'Racionalidad',
                'prefix' => Prefix::RATIONALITY->value,
                'latin' => 'Rationalitas',
                'primary' => false,
                'description' => 'El mundo de Aquelarre se encuentra dividido en dos visiones diferentes y contrapuestas: por un lado, el mundo físico, palpable y, según el hombre del Medievo, creado por Dios a su imagen y semejanza, un mundo que podemos captar con nuestros sentidos y con la fuerza de nuestra fe, el mundo de la Racionalidad. Pero, por otro lado, el mundo intangible e ilusorio de la magia, la oscuridad y el diablo, un mundo donde es posible realizar conjuros y donde habitan las criaturas más fantásticas que imaginarse puede, el mundo de la Irracionalidad. La Racionalidad (RR) y la Irracionalidad (IRR) miden la fuerza de las creencias del personaje en una u otra visión y se calculan de la siguiente manera: divide 100 puntos entre RR e IRR sin asignar a ninguna de ellas menos de 25. Te recomendamos que asignes una buena puntuación a IRR si deseas que tu personaje pueda realizar hechizos y, al contrario, aumenta tu RR si deseas utilizar rituales de fe.
                Divide 100 entre RR e IRR (mínimo 25 puntos)',
            ],
            [
                'name' => 'Irracionalidad',
                'prefix' => Prefix::IRRATIONALITY->value,
                'latin' => 'Insania',
                'primary' => false,
                'description' => 'El mundo de Aquelarre se encuentra dividido en dos visiones diferentes y contrapuestas: por un lado, el mundo físico, palpable y, según el hombre del Medievo, creado por Dios a su imagen y semejanza, un mundo que podemos captar con nuestros sentidos y con la fuerza de nuestra fe, el mundo de la Racionalidad. Pero, por otro lado, el mundo intangible e ilusorio de la magia, la oscuridad y el diablo, un mundo donde es posible realizar conjuros y donde habitan las criaturas más fantásticas que imaginarse puede, el mundo de la Irracionalidad. La Racionalidad (RR) y la Irracionalidad (IRR) miden la fuerza de las creencias del personaje en una u otra visión y se calculan de la siguiente manera: divide 100 puntos entre RR e IRR sin asignar a ninguna de ellas menos de 25. Te recomendamos que asignes una buena puntuación a IRR si deseas que tu personaje pueda realizar hechizos y, al contrario, aumenta tu RR si deseas utilizar rituales de fe. Divide 100 entre RR e IRR (mínimo 25 puntos)',
            ],
            [
                'name' => 'Puntos de Vida',
                'prefix' => Prefix::VITALITY->value,
                'latin' => 'Quae Vita',
                'primary' => false,
                'description' => 'Más tarde o más temprano tu personaje recibirá daño, ya proceda del ataque de un enemigo, de una caída, una llama, la garra de una criatura demoníaca o de mil y un peligros más. En todo caso, ese daño afectará a la salud del personaje, que se verá resentida en mayor o menor grado, y puede llegar a causar, en casos extremos —y a veces demasiado frecuentes—, la muerte del personaje. Para representar la cantidad de daño que el personaje puede recibir antes de caer inconsciente o morir existen los Puntos de Vida (PV), que siempre serán iguales al valor que tengamos en la característica Resistencia, por lo que bajarán si ésta baja, aunque no ocurre lo contrario: si se te reducen los PV, algo normal en una partida de Aquelarre, la RES mantendrá su valor. PV = RES',
            ],
            [
                'name' => 'Aspecto',
                'prefix' => Prefix::ASPECT->value,
                'latin' => 'Apparentia',
                'primary' => false,
                'description' => '¿Es tu personaje una monstruosidad andante que sólo se diferencia de un sapo en que no croa o, por el contrario, tiene un rostro tan bello que es capaz de provocar guerras y de hacer que un millar de barcos se hagan a la mar en su busca? Eso lo sabremos en cuanto calcules el Aspecto (ASP) de tu personaje, un rasgo que representa su apariencia física, su hermosura o falta de ella. Para ello, tira 4D6, sumando +2 al resultado si tu PJ es de sexo femenino, y obtendrás el Aspecto de tu personaje. Si deseas saber a qué equivale exactamente el valor que has obtenido, consulta la Tabla de Aspecto que aparece en el capítulo segundo (pág. 90). ASP = 4D6 (+2 si el PJ es mujer)',
            ],
            [
                'name' => 'Edad',
                'prefix' => Prefix::ASPECT->value,
                'latin' => 'Saeculi',
                'primary' => false,
                'description' => 'Llega el momento de decidir qué edad tendrá tu personaje, y aunque en el ámbito de reglas la edad no conlleva ningún modificador al resto de características o competencias, lo cierto es que a nivel narrativo será una elección muy importante, más de lo que pueda parecer en un principio, ya que un personaje demasiado joven puede ser menospreciado por la gente de más edad y al contrario, si decidimos tener demasiada edad nos puede alcanzar rápidamente la vejez, especialmente si vamos a jugar una campaña que transcurra a lo largo de varios años. Eres libre de escoger la edad que tendrá tu personaje, aunque deberá estar entre los 17 y los 26 años. En caso de que te dé igual la edad o no tengas tiempo para escoger tira 1D10 y súmale 16 al resultado. Edad = Elige entre 17 y 26 años (o tira 16+1D10)',
            ],
            [
                'name' => 'Altura',
                'prefix' => Prefix::HEIGHT->value,
                'latin' => 'Altitudo',
                'primary' => false,
                'description' => 'Vamos a calcular la altura que posee nuestro personaje. Para ello consulta la Tabla de Altura y Peso, basándote en la Fuerza o en la Resistencia del PJ, lo que quiera el jugador: te indicará una altura en varas, aunque eres libre, si lo deseas, de variar su altura hacia arriba o hacia abajo, aunque no más de 0,10 varas',
            ],
            [
                'name' => 'Peso',
                'prefix' => Prefix::WEIGHT->value,
                'latin' => null,
                'primary' => false,
                'description' => 'Por último, vamos a calcular el peso que posee nuestro personaje. Para ello consulta la Tabla de Altura y Peso, basándote en la Fuerza o en la Resistencia del PJ, lo que quiera el jugador: te indicará un peso en libras, aunque eres libre, si lo deseas, de variar su peso hacia arriba o hacia abajo, aunque no más de 15 libras.',
            ],
            [
                'name' => 'Iniciativa',
                'prefix' => Prefix::INITIATIVE->value,
                'latin' => null,
                'primary' => false,
                'description' => 'Tirada que indica en qué momento del asalto podemos actuar.'
            ]
        ];
    }
}
