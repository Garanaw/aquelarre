<?php

declare(strict_types=1);

namespace Database\Seeders\Spell;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Aquelarre\Spell\Infrastructure\DBFluent\Form;

class SpellFormsSeeder extends Seeder
{
    protected string $table = 'spell_forms';

    public function run(): bool
    {
        return $this->db->table($this->table)->insert($this->getData());
    }

    protected function getData(): array
    {
        return collect([
            Form::summon()->description('Se trata de una convocatoria realizada con métodos mágicos para llamar a nuestra presencia a algún tipo de entidad, como ánimas, demonios elementales, demonios mayores o incluso al propio Lucifer. Deben usarse con mucha prudencia, pues nunca se sabe con qué humor puede presentarse la entidad invocada'),
            Form::hex()->description('Una acción, lectura o declamación que sirve como fórmula mágica para llevar a cabo el hechizo. Probablemente sea la forma más fácil de utilizar, pero en ocasiones requiere una preparación muy meticulosa o particular'),
            Form::potion()->description('Una pócima o bebedizo que se fabrica con los ingredientes del hechizo y que debe ingerirse para que surta efecto. Se trata también de una forma relativamente fácil de usar, pero que requiere preparar la poción con antelación para tenerla lista'),
            Form::talisman()->description('En este caso, el hechizo se aloja en un objeto, que llegado el momento debe activarse para mostrar sus efectos. Aunque también es otra de las formas relativamente sencillas de utilizar, siempre cabe la posibilidad de que perdamos el talismán, lo que nos obligaría a fabricar otro. Al igual que ocurre con las pociones, el tiempo de fabricación de los talismanes también se basa en Alquimia, aunque es mucho más laborioso, ya que el tiempo de elaboración es mayor y es imposible crear más de un talismán al mismo tiempo'),
            Form::ointment()->description('La última de las formas es similar a las dos anteriores, pero en este caso los componentes del hechizo se utilizan para producir una pasta o bálsamo que el mago debe untarse, lo que puede retrasar bastante el tiempo de ejecución. Al igual que las pociones, los ungüentos también deben prepararse con antelación usando la competencia de Alquimia'),
        ])->toArray();
    }
}
