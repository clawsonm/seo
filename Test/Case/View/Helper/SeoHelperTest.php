<?php
App::import('Helper', 'Html');
App::import('Model', 'Seo.SeoMetaTag');
App::import('Model', 'Seo.SeoCanonical');
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('SeoHelper', 'Seo.View/Helper');

class SeoHelperTest extends CakeTestCase {

	public $fixtures = array(
		'plugin.seo.seo_meta_tag',
		'plugin.seo.seo_redirect',
		'plugin.seo.seo_uri',
		'plugin.seo.seo_title',
		'plugin.seo.seo_canonical',
		'plugin.seo.seo_a_b_test',
	);

	public function setUp() {
		parent::setUp();
		$Controller = new Controller();
		$View = new View($Controller);
		$this->Seo = new SeoHelper($View);
		$this->Seo->Html = new HtmlHelper($View);
		$cacheEngine = SeoUtil::getConfig('cacheEngine');
		if (!empty($cacheEngine)) {
			Cache::clear($cacheEngine);
		}
	}

	public function testGetABTestJS() {
		$result = $this->Seo->getABTestJS(array('SeoABTest' => array('slug' => 'home') ));
		$this->assertEquals('_gaq.push([\'_setCustompublic\',4,\'ABTest\',\'home\',3]);', $result);
	}

	public function testCanonical() {
		$result = $this->Seo->canonical('/');
		$this->assertEquals('<link rel="canonical" href="http://localhost/">', $result);

		$result = $this->Seo->canonical();
		$this->assertTrue(empty($result));

		$result = $this->Seo->canonical('/about');
		$this->assertEquals('<link rel="canonical" href="http://localhost/about">', $result);
	}

	public function testHoneyPot() {
		$result = $this->Seo->honeyPot();
		$this->assertTrue(!empty($result));
	}

	public function testMetaTags() {
		$_SERVER['REQUEST_URI'] = '/';
		$result = $this->Seo->metaTags();
		$this->assertEquals('<meta http-equiv="description" content="home page description content" /><meta http-equiv="keywords" content="home page keywords content" /><meta http-equiv="robots" content="home page robots content" />', $result);

		$result = $this->Seo->metaTags(array('keywords' => 'ignore me'));
		$this->assertEquals('<meta http-equiv="description" content="home page description content" /><meta http-equiv="keywords" content="home page keywords content" /><meta http-equiv="robots" content="home page robots content" />', $result);

		$result = $this->Seo->metaTags(array('insert' => 'me'));
		$this->assertEquals('<meta http-equiv="description" content="home page description content" /><meta http-equiv="keywords" content="home page keywords content" /><meta http-equiv="robots" content="home page robots content" /><meta name="insert" content="me" />', $result);
	}

	public function testMetaTagsWithHttpEquiv() {
		$_SERVER['REQUEST_URI'] = '/';
		$result = $this->Seo->metaTags();
		$this->assertEquals('<meta http-equiv="description" content="home page description content" /><meta http-equiv="keywords" content="home page keywords content" /><meta http-equiv="robots" content="home page robots content" />', $result);
	}

	public function testMetaTagsWithOutAny() {
		$_SERVER['REQUEST_URI'] = '/uri_has_no_meta';
		$result = $this->Seo->metaTags();
		$this->assertEquals('', $result);
	}

	public function testMetaTagsWithRegEx() {
		$_SERVER['REQUEST_URI'] = '/posts';
		$result = $this->Seo->metaTags();
		//$this->assertEquals('<meta name="default" content="content_default" /><meta name="description_default" content="content_default_2" />', $result);
	}

	public function testmetaTagsTagsDirectMatchShouldOverwrite() {
		$_SERVER['REQUEST_URI'] = '/doggies';
		$result = $this->Seo->metaTags();
		//$this->assertEquals('<meta name="direct_match" content="direct_match_content" />', $result);
	}

	public function testmetaTagsWithWildCard() {
		$_SERVER['REQUEST_URI'] = '/uri_for_meta_wild_card/wild_card';
		$result = $this->Seo->metaTags();
		//$this->assertEquals('<meta name="wild_card_match" content="wild_card_match_content" />', $result);
	}

	public function testTitleForUri() {
		$_SERVER['REQUEST_URI'] = '/doggies';
		$result = $this->Seo->title();
		$this->assertEquals('<title></title>', $result);
	}

	public function testTitleForUriWithDefault() {
		$_SERVER['REQUEST_URI'] = '/blahNotDefined';
		$results = $this->Seo->title('default');
		$this->assertEquals('<title>default</title>', $results);
	}

	public function tearDown() {
		parent::tearDown();
		unset($this->SeometaTagsTag);
		ClassRegistry::flush();
	}

}