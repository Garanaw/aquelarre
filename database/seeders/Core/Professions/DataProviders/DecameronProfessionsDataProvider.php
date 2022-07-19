<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Profession\Domain\Dto\ProfessionFluent;
use Database\Seeders\Contracts\DataProvider;

class DecameronProfessionsDataProvider extends DataProvider
{
    public function getData(): array
    {
        /** @var BookLoader $books */
        $books = $this->getLoadedLoader(class: BookLoader::class);

        return collect([
            ProfessionFluent::make(name: 'Alfaqueque')->isBoth()->description('Ya pertenezcan a la Orden de la Merced o sean comerciantes que trabajan por libre, los alfaqueques tienen un único cometido: negociar la liberación de cautivos. Suelen ser personas versadas en el idioma del enemigo y hábiles negociadores, capaces de rebajar el precio de un rescate o sugerir nuevas maneras de pagar el precio convenido (trueques de prisioneros, favores, relaciones de vasallaje, etcétera). Solo a un alfaqueque nombrado por la autoridad competente se le permite negociar en el territorio enemigo, así que muchos de ellos cobran unas cantidades exageradas por sus servicios, aunque otros, especialmente los mercedarios, prefieren que el liberado les deba el favor para recurrir en el futuro a sus servicios si fuera necesario'),
            ProfessionFluent::make(name: 'Cabalista')->isMan()->description('Esta profesión representa al estudiante de la Cábala que, en muchos casos, ha conseguido parte de sus conocimientos gracias a medios no demasiado claros, pues lo habitual es que los cabalistas alcancen la condición de tales con mucha más edad. Eso también supone que los miembros más sabios de su comunidad no los tengan en demasiada estima, debido a su falta de paciencia y quizás a su afán de conocimientos y poder'),
            ProfessionFluent::make(name: 'Cantero')->isMan()->description('Aunque nada impide utilizar la profesión de artesano para representar a un cantero, esta profesión intenta ser un poco más concreta y especializada. Un cantero (a veces llamado albañil) es un profesional de la construcción en el Medievo, desde el humilde peón que ayuda a acarrear materiales hasta el alarife que diseña, proyecta y sufraga un edificio. Suelen ser tipos rudos y acostumbrados al trabajo duro al aire libre, pero también tienen un ojo calculador capaz de localizar los puntos débiles de una estructura con una simple ojeada'),
            ProfessionFluent::make(name: 'Cetrero')->isBoth()->description('Como ya dijimos en su momento, la cetrería es actividad aristocrática, en la que los nobles y reyes compiten entre sí por mostrar sus mejores y más caras aves. Pero cuando los grandes señores no las utilizan en sus cacerías, las aves quedan a cuidado del cetrero, un profesional especializado en la cría, domesticación y adiestramiento de rapaces. Él se encarga de cuidarlas, vigilarlas, curar sus dolencias y fortalecerlas, y es habitual que traten mejor al cetrero que al propio señor que las compró'),
            ProfessionFluent::make(name: 'Frontero')->isMan()->description('Los fronteros son soldados acantonados en la frontera con Granada, hombres duros y recios acostumbrados a una vida llena de privaciones y sobresaltos. Son gentes que duermen con la mano en la espada, dispuestos a salir a defender en cualquier momento la pequeña fortaleza en la que viven y preparados siempre para atacar las posiciones enemigas. Con el tiempo, muchos de ellos se convierten en hombres amargados y callados, endurecidos por años de carencias, lances y desgracias'),
            ProfessionFluent::make(name: 'Rastrero')->isMan()->description('Los rastreros (también llamados fieles del rastro) trabajan a las órdenes de los jueces de frontera y su cometido es encontrar a todo aquel que haya cometido un crimen en el territorio fronterizo que tienen designado. Si descubren que el criminal ha conseguido escapar (ya sea a otro territorio contiguo o al territorio del enemigo), darán aviso a otro rastrero para que continúe la búsqueda. Son personas habituadas a vivir al aire libre, más parecidas a tramperos y cazadores que a servidores de la justicia, pero que en la mayor parte de los casos llevan a cabo su cometido de una forma bastante eficiente'),
            ProfessionFluent::make(name: 'Tornadizo')->isBoth()->description('Los tornadizos son renegados y prófugos del reino de Granada (o renegados y prófugos del reino de Castilla, llamados entonces elches), bautizados en una nueva fe y entregada su lealtad al enemigo. Para los castellanos, los tornadizos son gente valiosa, grandes conocedores del territorio contrario, capaces de hablar su idioma con la suficiente fluidez como para convertirse en trujamanes (intérpretes). Por el contrario, para los granadinos son más que traidores, ya que no solo han renegado de su rey, sino también de su Dios, así que cuando algún tornadizo cae en sus manos, no puede esperar más que días y meses de tormento antes de morir'),
        ])
            ->map(static fn (ProfessionFluent $profession): ProfessionFluent => $profession->book($books->decameron()))
            ->toArray();
    }
}
