<?php declare(strict_types=1);
/**
 * @author Nicolas CARPi <nico-git@deltablot.email>
 * @copyright 2012 Nicolas CARPi
 * @see https://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */

namespace Elabftw\Models;

use Elabftw\Elabftw\ContentParams;

class LinksTest extends \PHPUnit\Framework\TestCase
{
    private Experiments $Experiments;

    protected function setUp(): void
    {
        $this->Experiments = new Experiments(new Users(1, 1), 3);
    }

    public function testCreateReadDestroy(): void
    {
        $id = $this->Experiments->Links->create(new ContentParams('1'));
        $links = $this->Experiments->Links->read(new ContentParams());
        $this->assertIsArray($links);
        $this->Experiments->Links->setId($id);
        $this->Experiments->Links->destroy();
    }
}
