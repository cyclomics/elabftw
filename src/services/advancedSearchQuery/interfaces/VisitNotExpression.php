<?php declare(strict_types=1);
/**
 * @author Nicolas CARPi <nico-git@deltablot.email>
 * @author Marcel Bolten <github@marcelbolten.de>
 * @copyright 2022 Nicolas CARPi
 * @see https://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */

namespace Elabftw\Services\AdvancedSearchQuery\Interfaces;

use Elabftw\Services\AdvancedSearchQuery\Collectors\InvalidFieldCollector;
use Elabftw\Services\AdvancedSearchQuery\Collectors\WhereCollector;
use Elabftw\Services\AdvancedSearchQuery\Grammar\NotExpression;
use Elabftw\Services\AdvancedSearchQuery\Visitors\VisitorParameters;

interface VisitNotExpression
{
    public function visitNotExpression(NotExpression $not_expression, VisitorParameters $parameters): InvalidFieldCollector | WhereCollector | int;
}
