<?php
namespace sashsvamir\scrollTop;

use yii\base\Widget;
// use yii\helpers\Json;
// use yii\helpers\Html;


/**
 * ScrollTop Widget
 */
class ScrollTop extends Widget
{
	/**
	 * Scroll length offset (from top) when button appear
	 * @var int
	 */
	public $offset = 700;

	/**
	 * Whether using native botton's styles or user css
	 * @var bool
	 */
	public $nativeStyle = true;

    /**
     * @inheritdoc
     */
    public function run()
    {
    	$view = $this->getView();
        $view->registerAssetBundle('yii\web\JqueryAsset');

    	if ($this->nativeStyle) {
    		ScrollTopAsset::register($view);
	    }

    	$js = // language=js
		    "
			var button = '<a id=\"scrollUp\" href=\"#\" title=\"Наверх\"></a>';
			$('body').append(button);
			
			// show/hide button if scroll
			$(window).scroll(function(){
				if ($(this).scrollTop() > {$this->offset}) {
					$('#scrollUp').fadeIn();
				} else {
					$('#scrollUp').fadeOut();
				}
			});
	
			$('#scrollUp').click(function(){
				$('html, body').animate({ scrollTop: 0 }, 500);
				return false;
			});
		";
	    $view->registerJs($js, $view::POS_READY);
    }
}