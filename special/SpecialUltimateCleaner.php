<?php

class SpecialUltimateCleaner extends SpecialPage {

	public function __construct() {
		parent::__construct( 'UltimateCleaner', 'ultimatecleaner' );
	}

	public function execute( $subPage ) {
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return;
		}

		$this->setHeaders();
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'ultimatecleaner' )->text() );

		$numPages = SiteStats::pages();

		$out->addHTML(
			Linker::link(
				SpecialPage::getTitleFor( 'UltimateCleanerTrustedUsers' ),
				wfMessage( 'ultimatecleaner-view-trusted-users' )->text(),
				array( 'target' => '_blank' )
			)
		);

		$out->addHTML( '<h2>' . $this->msg( 'ultimatecleaner-spam-pages-list-heading' )->text() . '</h2>' );

		$out->addHTML( '<div id="pagination"></div>' );

		$out->addHTML(
			Html::openElement( 'form', array(
					'method' => 'post',
					'id' => 'UltimateCleaner-delete-pages',
				)
			)
		);

		$out->addHTML( '<div id="UltimateCleaner-select-options"></div>' );

		$out->addHTML( '<input type="submit" value="'
			. $this->msg( 'ultimatecleaner-delete-selected' ) . '" style="display:none;">' );
		$out->addHTML( Html::openElement( 'div', array(
			'id' => 'UltimateCleaner-page-list',
		) ) );

		$out->addHTML( Html::closeElement( 'div' ) );
		$out->addHTML( '<input type="submit" value="'
			. $this->msg( 'ultimatecleaner-delete-selected' ) . '" style="display:none;">' );
		$out->addHTML( Html::closeElement( 'form' ) );
	}

	function getGroupName() {
		return 'spam';
	}
}