<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class CommoditySeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::commodity('Buey')->beast()->description('Un ejemplar de buey, toro castrado usado como animal de tiro o de carga'),
            Item::commodity('Cabra')->beast()->description('Un ejemplar de cabra, que se cría especialmente por su leche'),
            Item::commodity('Cabrito')->beast()->description('Un ejemplar de cabrito, que es la cría de la cabra de hasta 4 meses de edad'),
            Item::commodity('Capón')->beast()->description('Un ejemplar de capón, con una carne más fina y de mayor peso que los pollos camperos normales'),
            Item::commodity('Carnero')->beast()->description('Un ejemplar de carnero, que se cría por su carne, que es muy valorada'),
            Item::commodity('Cerdo')->beast()->description('Un ejemplar de cerdo, criado para ser comido por entero (de morro a pezuña)'),
            Item::commodity('Conejo')->beast()->description('Un ejemplar de conejo. Por sorprendente que parezca su consumo está permitido en cuaresma'),
            Item::commodity('Gallina')->beast()->description('Un ejemplar de gallina, criada por sus huevos y su carne'),
            Item::commodity('Gallo')->beast()->description('Un ejemplar de gallo, criado como semental del corral o por su carne'),
            Item::commodity('Ganso')->beast()->description('Un ejemplar de ganso, criado por su carne y por su hígado'),
            Item::commodity('Gato')->beast()->description('Un ejemplar de gato doméstico. El precio puede multiplicarse por 10 según su raza y exotismo'),
            Item::commodity('Gerifalte Neblí')->beast()->description('Un ejemplar de halcón, que se utiliza para cetrería. Eran famosos éstos de Niebla (Huelva)'),
            Item::commodity('Oveja')->beast()->description('Un ejemplar de oveja, criada por su lana, su leche y su carne'),
            Item::commodity('Paloma')->beast()->description('Un ejemplar de paloma, que se puede domesticar para llevar mensajes (recorren 18 leguas al día)'),
            Item::commodity('Perdiz')->beast()->description('Un ejemplar de perdiz, que junto al faisán, es el plato preferido por los nobles amantes de la caza'),
            Item::commodity('Perro')->beast()->description('Un ejemplar de perro doméstico. El precio puede multiplicarse por 10 según su raza y exotismo'),
            Item::commodity('Perro de Caza')->beast()->description('Un ejemplar de perro utilizado en cacerías. El precio puede multiplicarse por 10 según su raza'),
            Item::commodity('Pollo')->beast()->description('Un ejemplar de pollo, criada por su carne'),
            Item::commodity('Ternera')->beast()->description('Un ejemplar de ternera, que es la vaca que se ha criado por lo menos hasta los 6 meses de edad'),
            Item::commodity('Toro')->beast()->description('Un ejemplar de toro, criado como semental'),
            Item::commodity('Vaca')->beast()->description('Un ejemplar de vaca, criada por su leche y su carne'),
            Item::commodity('Algodón')->good()->description('Mil libras de algodón'),
            Item::commodity('Cera')->good()->description('Mil libras de cera'),
            Item::commodity('Cuero')->good()->description('Mil libras de cuero'),
            Item::commodity('Especias')->good()->description('Mil libras de especias (canela, pimienta, mostaza, clavo, azafrán, etc.)'),
            Item::commodity('Hierro')->good()->description('Mil libras de hierro'),
            Item::commodity('Lana')->good()->description('Mil libras de lana'),
            Item::commodity('Leña')->good()->description('Mil libras de leña'),
            Item::commodity('Lino')->good()->description('Mil libras de lino hilado en madejas'),
            Item::commodity('Madera')->good()->description('Mil libras de madera, aunque puede aumentar el precio si se trata de una madera exótica'),
            Item::commodity('Piedra')->good()->description('Mil libras de piedra para la construcción'),
            Item::commodity('Sebo')->good()->description('Mil libras de sebo'),
            Item::commodity('Seda')->good()->description('Mil libras de telas de seda procedente de Asia a través de Venecia'),
            Item::commodity('Trigo')->good()->description('Mil libras de trigo sin moler'),
            Item::commodity('Vino')->good()->description('Mil cuartillos de vino'),
            Item::commodity('Aceituní')->fabric()->description('25 varas de paño de seda procedente de Oriente en forma de terciopelo de color aceituna'),
            Item::commodity('Berví')->fabric()->description('25 varas de paño de lana de cierta calidad procedente de la ciudad de Wervic1, en Flandes'),
            Item::commodity('Brocado')->fabric()->description('25 varas de paño de seda de la mejor calidad bordado con motivos en relieve de hilo de oro y plata'),
            Item::commodity('Contray')->fabric()->description('25 varas de paño de lana fino procedente de Coutrai, en Flandes'),
            Item::commodity('Damasco')->fabric()->description('25 varas de paño de seda, variedad del brocado, con dibujos formados por la trama del propio tejido'),
            Item::commodity('De Londres')->fabric()->description('25 varas de paño de lana de calidad de procedencia inglesa. De color escarlata y de gran calidad'),
            Item::commodity('Fustán')->fabric()->description('25 varas de tela gruesa mezcla de algodón y lino, con pelo por una de las caras. Para mantos y jubones'),
            Item::commodity('Lienzo')->fabric()->description('25 varas de tela de lino o cáñamo de escasa calidad empleada para camisetas, toallas, manteles, sábanas, etc.'),
            Item::commodity('Pardillo')->fabric()->description('25 varas de paño de lana tosco, grueso y basto sin teñir. Utilizado por gente de baja condición social'),
            Item::commodity('Pardo')->fabric()->description('25 varas de paño de lana de poca calidad y color gris oscuro usado por las gentes más humildes'),
            Item::commodity('Sanjuanes')->fabric()->description('25 varas de paño de lana de la mejor calidad que se fabrica en la Península'),
            Item::commodity('Tercenel')->fabric()->description('25 varas de paño de seda fino utilizado para estandartes, banderas y adornos de trompetas'),
            Item::commodity('Velarte')->fabric()->description('25 varas de paño de lana lustroso de color negro. Para capas, sayos y otras prendas exteriores de abrigo'),
            Item::commodity('Aceite de Candil')->various()->description('Un cuartillo de aceite de candil, que dura 24 horas'),
            Item::commodity('Agujas')->various()->description('20 agujas de coser'),
            Item::commodity('Aljaba')->various()->description('Carcaj para ballesta o arco'),
            Item::commodity('Anteojos')->various()->description('Invento reciente. Los fabrican los cristaleros de forma individual para la persona que los va a llevar'),
            Item::commodity('Antorchas')->various()->description('Tres antorchas con una duración de dos horas (cada una)'),
            Item::commodity('Arcón')->various()->description('Arca de madera con herrajes metálicos'),
            Item::commodity('Baraja de Naipes')->various()->description('Fabricados con pergamino'),
            Item::commodity('Bota de Vino')->various()->description('Bota de cuero de cabra que puede contener hasta un azumbre de vino'),
            Item::commodity('Bacía')->various()->description('Pieza o taza de metal, ancha y redonda, que usan los barberos para humedecer y jabonar la barba'),
            Item::commodity('Caja')->various()->description('Cofrecillo de madera con su llave'),
            Item::commodity('Cálamo')->various()->description('Caña hueca con la punta cortada oblicuamente usada para escribir. A veces se usan plumas de ave'),
            Item::commodity('Cáliz')->various()->description('Copón para administrar la misa que incorpora su patena (el platillo para cubrirlo y recibir la hostia)'),
            Item::commodity('Candil')->various()->description('Lámpara portátil que se alimente de aceite'),
            Item::commodity('Candado')->various()->description('Candado grande y redondo'),
            Item::commodity('Cazo')->various()->description('Un cazo de azófar (latón) con una capacidad de un cuartillo'),
            Item::commodity('Cirio')->various()->description('Vela de cera larga y gruesa. Dura casi 24 horas, pero ilumina relativamente poco'),
            Item::commodity('Clavos')->various()->description('Cincuenta clavos metálicos de gran longitud (medio pie)'),
            Item::commodity('Cranequín')->various()->description('Artefacto utilizado para tensar arbalestas'),
            Item::commodity('Componentes Químicos')->various()->description('Una selección de componentes químicos comunes (azufre, cuarzo, cal viva, hollín, salitre, plomo, etc.)'),
            Item::commodity('Cruz de Altar')->various()->description('Crucifijo de bulto, dorado y pintado, para colocar sobre un altar'),
            Item::commodity('Crucifijo')->various()->description('Crucifijo de madera para colgar del cuello. Si es de ébano serán 20 maravedíes, de azabache 17, de plata 60, de oro 180'),
            Item::commodity('Cuerda')->various()->description('Diez varas de cuerda de cáñamo. Muy voluminosa'),
            Item::commodity('Devociones')->various()->description('Estampas de devoción de tamaño mediano'),
            Item::commodity('Escalera')->various()->description('Escalera de madera de cinco varas de longitud'),
            Item::commodity('Escribanía')->various()->description('Caja portátil que traen los escribanos, compuesta de una vaina para las plumas y un tintero con su tapa'),
            Item::commodity('Esmeril')->various()->description('Piedra de afilar'),
            Item::commodity('Espejo')->various()->description('Objeto de lujo. Espejo de mano de metal bruñido o azogado (de vidrio sobre lámina metálica)'),
            Item::commodity('Estera')->various()->description('Pequeña alfombra de esparto para cubrir el suelo o para dormir'),
            Item::commodity('Flauta')->various()->description('Instrumento de viento de madera o hueso'),
            Item::commodity('Flechas')->various()->description('Flechas para arco'),
            Item::commodity('Ganzúas')->various()->description('Llavero con ganzúas y alambres. Es difícil encontrar un vendedor, por eso su alto precio'),
            Item::commodity('Garfio')->various()->description('Gancho de metal curvo y puntiagudo'),
            Item::commodity('Hisopo')->various()->description('Mango de madera con una bola metálica en un extremo utilizado para esparcir agua bendita'),
            Item::commodity('Incensario')->various()->description('Braserillo con cadenillas y tapa que se utiliza en templos y procesiones para perfumar con incienso'),
            Item::commodity('Instrumentos de Alquimista')->various()->description('Pequeño laboratorio de alquimista: alquitara, atanor, matraces, redomas, retortas, probetas, romana...'),
            Item::commodity('Instrumentos de Peso y Medida')->various()->description('Juego de pesas, balanzas e instrumentos de medida (varas, celemines, cuartillos, etc.). Ideal para cambistas, comerciantes y tenderos'),
            Item::commodity('Laúd')->various()->description('Instrumento de cuerda pulsada fabricado en madera, habitual en el mundo islámico'),
            Item::commodity('Libro de Horas')->various()->description('Un devocionario barato y simple, utilizado en la Iglesia o para las plegarias en el hogar'),
            Item::commodity('Libro Sagrado Guarnecido')->various()->description('Se trata de un libro sagrado (Corán, Biblia, etc.], iluminado con figuras y adornado con oro y plata'),
            Item::commodity('Libro en Blanco')->various()->description('Una serie de cuartillas cosidas y en blanco para poder tomar notas, dibujar o llevar las cuentas'),
            Item::commodity('Lienzos')->various()->description('Por cada vara de lienzo de lino, usado para limpiar heridas o secarse'),
            Item::commodity('Navaja de Barbero')->various()->description('Cuchillo con pequeña hoja plegable usada por barberos para afeitar o motilar (cortar el pelo)'),
            Item::commodity('Maletas de vaqueta')->various()->container()->description('Las valijas en las que se llevan vestidos de camino o ropa. Con su cadena y candado'),
            Item::commodity('Manta')->various()->description('Paño grueso de lana, para resguardarse del frío de lana merina o castellana. Para caballos cuesta 24 maravedíes'),
            Item::commodity('Martillo')->various()->description('Martillo de hierro de artesano'),
            Item::commodity('Menorah')->various()->description('Candelabro judío de nueve brazos. Si es oro, costará 1.800 maravedíes'),
            Item::commodity('Odre')->various()->description('Cuero de cabra que puede contener hasta un azumbre de líquido'),
            Item::commodity('Pala')->various()->description('Pala de hierro con mango de madera'),
            Item::commodity('Pergaminos')->various()->description('Una resma (unos 500 folios) de pergamino'),
            Item::commodity('Pico')->various()->description('Pico de hierro con mango de madera'),
            Item::commodity('Portacartas')->various()->description('Las bolsas o valijas en las que se llevan las cartas'),
            Item::commodity('Pretina para daga')->various()->description('Cinturón y vaina para una daga'),
            Item::commodity('Pretina para espada')->various()->description('Cinturón y vaina para una espada'),
            Item::commodity('Rejuelas de tener lumbre')->various()->description('Braserillo pequeño portátil, de madera forrado en hoja de lata. Para calentar pies y manos'),
            Item::commodity('Reloj de Arena')->various()->description('Instrumento mecánico que sirve para medir de manera visual un determinado transcurso de tiempo'),
            Item::commodity('Retablo')->various()->description('Retablo portátil con un corazón de oro "de monjas"'),
            Item::commodity('Romana')->various()->description('Instrumento de medición que se utiliza desde la Antigüedad para pesar mercancías'),
            Item::commodity('Saco')->various()->container()->description('Saca de paño burdo'),
            Item::commodity('Tenazas')->various()->description('Herramienta utilizada para sujetar, arrancar o cortar otros objetos'),
            Item::commodity('Tenacillas de barbero')->various()->description('Para extraer muelas'),
            Item::commodity('Tijeras')->various()->description('Usadas por barberos para cortar y arreglar barbas y cabellos'),
            Item::commodity('Tinta')->various()->description('Un cuartillo de tinta negra compuesto de negro de humo y goma'),
            Item::commodity('Virotes')->various()->description('Saetas de ballesta'),
            Item::commodity('Yesquero')->various()->description('Juego de eslabón (normalmente en forma de anillo) y pedernal'),
            Item::commodity('Zaque')->various()->description('Odre pequeño que sólo contiene un cuartillo de líquido'),
            Item::commodity('Albardas')->accoutrement()->noStorable()->description('Silla y arreos para una montura de carga'),
            Item::commodity('Alforjas')->accoutrement()->noStorable()->container()->description('Alforjas de cuero para una silla de montar'),
            Item::commodity('Aparejo Básico')->accoutrement()->noStorable()->description('Incluye la silla de montar, el bocado y las bridas para la silla'),
            Item::commodity('Aparejo de Lujo')->accoutrement()->noStorable()->description('También lleva una silla, un bocado y bridas, pero de mejor calidad, con la silla repujada en cuero'),
            Item::commodity('Bardas')->accoutrement()->description('Armadura metálica para caballos'),
            Item::commodity('Bardas de Vaqueta')->accoutrement()->description('Armadura de cuero para caballos'),
            Item::commodity('Espuelas')->accoutrement()->description('El par de espuelas'),
            Item::commodity('Gualdrapa')->accoutrement()->description('Cobertor de lana para las ancas y el lomo del caballo, protegiendo al jinete del pelo y el sudor'),
            Item::commodity('Herraduras')->accoutrement()->description('Cuatro herraduras para una montura'),
        ])->toArray();
    }
}
