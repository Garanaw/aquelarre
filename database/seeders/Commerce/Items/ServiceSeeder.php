<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Item;
use Database\Seeders\Contracts\DataProvider;

class ServiceSeeder extends DataProvider
{
    public function getData(): array
    {
        return collect([
            Item::service('Alojamiento trabajando')->description('Se trabaja durante el día por el alojamiento de la noche. No todas las posadas lo aceptan'),
            Item::service('Alojamiento medio')->description('Incluye pasar la noche en una estancia común'),
            Item::service('Alojamiento completo')->description('Incluye pasar la noche en una estancia común, una comida y fuego si hace frío'),
            Item::service('Armero (metal)')->description('Por cada punto de Resistencia que te repare en una armadura de metal'),
            Item::service('Armero (cuero)')->description('Por cada punto de Resistencia que te repare en una armadura de cuero'),
            Item::service('Barbero')->description('Por cada trabajo que realice (sacar una muela, hacer la barba, lavar la cabeza, realizar una sangría, etc)'),
            Item::service('Barquero')->description('Por el paso de un río para una persona (animales y mercancías se pagan aparte)'),
            Item::service('Bufón')->description('Por cada mes de servicio'),
            Item::service('Carretero')->description('Por arroba transportada y legua recorrida'),
            Item::service('Criado')->description('Por cada mes de servicio'),
            Item::service('Curandero')->description('Por cada tirada de Medicina o Sanar que realice'),
            Item::service('Entierro')->description('Incluye ataúd, amortajamiento, sepultura y el diezmo para el sacerdote'),
            Item::service('Esclavo')->description('El precio de un esclavo puede multiplicarse hasta x10 según su edad y utilidad'),
            Item::service('Entregar una Carta')->description('Por cada día de viaje previsto'),
            Item::service('Escriba')->description('Por cada carta o escrito redactado'),
            Item::service('Guía')->description('Por cada día de trabajo acompañando a los personajes'),
            Item::service('Habitación privada')->description('Incluye pasar la noche en una habitación propia, con puerta individual'),
            Item::service('Habitación privada completa')->description('Incluye pasar la noche en una habitación propia, con puerta individual, una comida y fuego si hace frío'),
            Item::service('Establo')->description('Alimento y resguardo para un caballo por noche'),
            Item::service('Hombre de Armas')->description('Por cada mes de servicio. Posee caballo propio y experiencia como jinete y guerrero'),
            Item::service('Maestro')->description('Por cada semana de enseñanza'),
            Item::service('Médico')->description('Por cada tirada de Medicina o Sanar que realice'),
            Item::service('Misas')->description('Por cada misa (el doble si es cantada), dedicada a un difunto o a cualquier otra conmemoración'),
            Item::service('Partera')->description('Muchas veces la partera, en zonas rurales, trabaja por la voluntad o por la comida'),
            Item::service('Peón')->description('Por cada día trabajado'),
            Item::service('Prostituta de Clase Baja')->description('Por noche o servicio'),
            Item::service('Prostituta de clase alta')->description('Por noche o servicio'),
            Item::service('Soldado Bisoño')->description('Por cada mes de servicio'),
            Item::service('Soldado Experto')->description('Por cada mes de servicio'),
        ])->toArray();
    }
}
