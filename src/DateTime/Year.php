<?php
/*
 * This file is part of the Borobudur-ValueObject package.
 *
 * (c) Hexacodelabs <http://hexacodelabs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Borobudur\ValueObject\DateTime;

use Borobudur\Serialization\ValuableInterface;
use Borobudur\ValueObject\Caster\CastableInterface;
use Borobudur\ValueObject\Caster\ValuableCasterTrait;
use Borobudur\ValueObject\Comparison\ComparisonInterface;
use Borobudur\ValueObject\Comparison\ComparisonTrait;
use Borobudur\ValueObject\Exception\InvalidValueException;

/**
 * @author      Iqbal Maulana <iq.bluejack@gmail.com>
 * @created     3/27/16
 */
class Year implements ValuableInterface, ComparisonInterface, CastableInterface
{
    use ComparisonTrait, ValuableCasterTrait;

    /**
     * @var int
     */
    public $year;

    /**
     * Constructor.
     *
     * @param int $year
     *
     * @throws InvalidValueException
     */
    public function __construct($year)
    {
        if (strlen((string) $year) < 4 || strlen((string) $year) > 4) {
            throw new InvalidValueException(sprintf('Invalid year.'));
        }

        $this->year = (int) $year;
    }
    
    /**
     * @return int
     */
    public function getValue()
    {
        return $this->year;
    }
}
