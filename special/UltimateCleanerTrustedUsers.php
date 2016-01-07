<?php

class UltimateCleanerTrustedUsers extends SpecialPage {

	public function __construct() {
		parent::__construct( 'UltimateCleanerTrustedUsers', 'UltimateCleaner' );
	}

	public function execute( $subPage ) {
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return;
		}
		$this->setHeaders();
		$out = $this->getOutput();
		$request = $this->getRequest();


		
	}
}
