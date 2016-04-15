<?php

namespace Vins\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VinsUserBundle extends Bundle
{
	public function getParent()
  	{
    	return 'FOSUserBundle';
  	}
}
