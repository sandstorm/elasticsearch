<?php

require_once(t3lib_extMgm::extPath('elasticsearch') . '/Resources/Private/PHP/guzzle.phar');

class Tx_Elasticsearch_Controller_BackendController extends Tx_Extbase_MVC_Controller_ActionController {
	public function indexAction() {

	}
	public function setupMappingsAction() {
		$be = new Guzzle\Service\Client('http://localhost:9200');
		$request = $be->put('public');
		$mapping = array(
			'typo3' => array(
				'properties' => array(
					'id'           => array('type' => 'string'),
					'site'         => array('type' => 'string'),
					'siteHash'     => array('type' => 'string'),
					'appKey'       => array('type' => 'string'),
					'type'         => array('type' => 'string'),
					'contentHash'  => array('type' => 'string'),

						// system fields
					'uid'          => array('type' => 'long'),
					'pid'          => array('type' => 'string'),
					'typeNum'      => array('type' => 'long'),
					'created'      => array('type' => 'string'),
					'changed'      => array('type' => 'string'),
					'language'     => array('type' => 'long'),

						// Access
					'access'       => array('type' => 'string'),
					'endtime'       => array('type' => 'string'),

						// Content
					'title'        => array('type' => 'string'),
					'subTitle'     => array('type' => 'string'),
					'navTitle'     => array('type' => 'string'),
					'author'       => array('type' => 'string'),
					'description' => array('type' => 'string'),
					'abstract'     => array('type' => 'string'),
					'content'      => array('type' => 'string'),
					'url'          => array('type' => 'string'),

						// Keywords
					'keywords'     => array('type' => 'string'),

						// Content Extractor
					'tagsH1'       => array('type' => 'string'),
					'tagsH2H3'     => array('type' => 'string'),
					'tagsH4H5H6'   => array('type' => 'string'),
					'tagsInline'   => array('type' => 'string'),
					'tagsA'        => array('type' => 'string'),
				)
			)
		);
		$x = array(
			'settings' => array(
				'index' => array(
					'number_of_shards' => 5,
					'number_of_replicas' => 1,
					'analysis' => array(
						'analyzer' => array(
							'default' => array(
								'type' => 'snowball',
								'language' => 'German'
							)
						)
					)
				)
			),
			'mappings' => $mapping,

		);
		$request->setBody(json_encode($x));
		$request->send();
		return "FOo";
	}
}