<?php

namespace App\Logging;

class LoggingTest {
	public function __invoke($logger) {
		foreach ($logger->getHandlers as $handler) {
			$handler->setTest(
				new LineTest('[%datetime%]: %message% %context%')
			);
		}

	}
}