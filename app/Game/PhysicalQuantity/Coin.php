<?php declare(strict_types = 1);

namespace App\Game\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Coin extends AbstractPhysicalQuantity
{
	use HasSIUnitsTrait;

	protected static $unitDefinitions;

	public static function initialize()
	{
		// Main Coin
		$unit = UnitOfMeasure::nativeUnitFactory('maravedi');
		$unit->addAlias('maravedí');
		$unit->addAlias('maravedies');
		$unit->addAlias('maravedíes');
		$unit->addAlias('m');
		$unit->addAlias('mv');
		static::addUnit($unit);

		self::dobla(); // This coin is widely used across the peninsula with different names but same value
		self::real(); // This coin is also used in more than one place with the same value
		self::coronaDeCastilla();
		self::coronaDeAragon();
		self::reinoDeGranada();
		self::reinoDeNavarra();
		self::reinoDePortugal();
	}

	private static function dobla(): void
	{
		$dobla = UnitOfMeasure::linearUnitFactory('Dobla de Oro', 36);

		$dobla->addAlias('Dobla');

		// Castilla
		$dobla->addAlias('Dobla de Oro Castellana');
		$dobla->addAlias('dobla castellana');
		$dobla->addAlias('dbc');

		// Granada
		$dobla->addAlias('Dobla de Oro Granadina');
		$dobla->addAlias('dobla granadina');
		$dobla->addAlias('dbg');

		// Portugal
		$dobla->addAlias('Dobra de Ouro Portuguesa');
		$dobla->addAlias('Dobra de Ouro');
		$dobla->addAlias('Dobra');
		$dobla->addAlias('dbr');
		$dobla->addAlias('dbp');

		self::addUnit($dobla);
	}

	private static function real(): void
	{
		$real = UnitOfMeasure::linearUnitFactory('Real de Plata', 3);
		$real->addAlias('Real de Prata');
		$real->addAlias('rear de prata');
		$real->addAlias('real castellano');
		$real->addAlias('real');
		$real->addAlias('rear');
		$real->addAlias('r');
		self::addUnit($real);
	}

	private static function coronaDeCastilla(): void
	{
		$dinero = UnitOfMeasure::linearUnitFactory('Dinero de Vellón', 1/10);
		$dinero->addAlias('dinero castellano');
		$dinero->addAlias('dc');
		self::addUnit($dinero);
	}

	private static function coronaDeAragon(): void
	{
		$florin = UnitOfMeasure::linearUnitFactory('Florín de Oro Aragonés', 33);
		$florin->addAlias('florín aragonés');
		$florin->addAlias('florin aragones');
		$florin->addAlias('fa');
		self::addUnit($florin);

		$croat = UnitOfMeasure::linearUnitFactory('Croat de Plata', 3);
		$croat->addAlias('croat');
		$croat->addAlias('cr');
		self::addUnit($croat);

		$diner = UnitOfMeasure::linearUnitFactory('Diner de Vellón', 1/4);
		$diner->addAlias('diner');
		$diner->addAlias('diner aragones');
		$diner->addAlias('da');
		self::addUnit($diner);
	}

	private static function reinoDeGranada(): void
	{
		$dinar = UnitOfMeasure::linearUnitFactory('Dinar de Oro', 18);
		$dinar->addAlias('dinar');
		$dinar->addAlias('d');
		self::addUnit($dinar);

		$dirham = UnitOfMeasure::linearUnitFactory('Dírham de Plata', 1.5);
		$dirham->addAlias('dirham');
		$dirham->addAlias('dr');
		self::addUnit($dirham);

		$felus = UnitOfMeasure::linearUnitFactory('Felús de Cobre', 1/20);
		$felus->addAlias('felus');
		$felus->addAlias('fl');
		self::addUnit($felus);
	}

	private static function reinoDeNavarra(): void
	{
		$florin = UnitOfMeasure::linearUnitFactory('Florín de Oro Navarro', 26);
		$florin->addAlias('florin navarro');
		$florin->addAlias('fn');
		self::addUnit($florin);

		$sueldo = UnitOfMeasure::linearUnitFactory('Sueldo de Plata', 2);
		$sueldo->addAlias('sueldo de plata');
		$sueldo->addAlias('sueldo');
		$sueldo->addAlias('sd');
		self::addUnit($sueldo);

		$dinero = UnitOfMeasure::linearUnitFactory('Dinero de Vellón Navarro', 1/6);
		$dinero->addAlias('dinero navarro');
		$dinero->addAlias('dn');
		self::addUnit($dinero);
	}

	private static function reinoDePortugal(): void
	{
		$gentil = UnitOfMeasure::linearUnitFactory('Gentil de Ouro', 27);
		$gentil->addAlias('gentil portugues');
		$gentil->addAlias('gentil');
		$gentil->addAlias('g');
		self::addUnit($gentil);

		$barbuda = UnitOfMeasure::linearUnitFactory('Barbuda de Bolhão', 1);
		$barbuda->addAlias('barbuda de bolhão');
		$barbuda->addAlias('barbuda');
		$barbuda->addAlias('br');
		$barbuda->addAlias('b');
		self::addUnit($barbuda);

		$dinheiros = UnitOfMeasure::linearUnitFactory('Dinheiros de Bolhão', 1/30);
		$dinheiros->addAlias('dinheiros de bolhao');
		$dinheiros->addAlias('dinheiros');
		$dinheiros->addAlias('dinheiro');
		$dinheiros->addAlias('dnh');
		self::addUnit($dinheiros);
	}
}
