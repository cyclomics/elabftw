<?php declare(strict_types=1);
/**
 * @author Nicolas CARPi <nico-git@deltablot.email>
 * @author Marcel Bolten <github@marcelbolten.de>
 * @copyright 2021 Nicolas CARPi
 * @see https://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */

namespace Elabftw\Services\AdvancedSearchQuery\Grammar;

use Elabftw\Services\AdvancedSearchQuery\Interfaces\FieldType;
use Elabftw\Services\AdvancedSearchQuery\Interfaces\Term;
use Elabftw\Services\AdvancedSearchQuery\Interfaces\Visitable;
use Elabftw\Services\AdvancedSearchQuery\Interfaces\Visitor;
use Elabftw\Services\AdvancedSearchQuery\Visitors\VisitorParameters;
use function filter_var;
use function strtolower;

class Field implements Term, Visitable, FieldType
{
    public function __construct(private string $field, private SimpleValueWrapper $valueWrapper)
    {
    }

    public function accept(Visitor $visitor, VisitorParameters $parameters): mixed
    {
        return $visitor->visitField($this, $parameters);
    }

    public function getValue(): string
    {
        return $this->valueWrapper->getValue();
    }

    public function getFieldType(): string
    {
        return filter_var(strtolower($this->field), FILTER_SANITIZE_STRING) ?: '';
    }
}
