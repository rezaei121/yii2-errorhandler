<?php
namespace developit\errorhandler;

use Yii;
use yii\web\Response;
use developit\errorhandler\GoogleCustomSearch;
use Serps\SearchEngine\Google\GoogleClient;
use Serps\HttpClient\CurlClient;
use Serps\Core\Http\StackingHttpClient;
use Serps\SearchEngine\Google\GoogleUrl;
use Serps\Core\Browser\Browser;

class ErrorHandlerAction extends \yii\web\ErrorAction
{
    public function run()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $item = Yii::$app->request->get('item');
        $term = 'yii2 ' . Yii::$app->request->get('search');
        switch ($item)
        {
            case 'google':
                return $this->_result($term);
                break;
            case 'stackoverflow':
                return $this->_result($term, 'stackoverflow.com');
                break;
            case 'yiiframework':
                return $this->_result($term, 'yiiframework.com');
                break;
            default:
                return [];

        }
    }


    private function _result($term, $site = null)
    {
        $userAgent = "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36";
        $browser = new Browser(new CurlClient(), $userAgent);
        // Create a google client using the browser we configured
        $googleClient = new GoogleClient($browser);
        // Create the url that will be parsed
        $googleUrl = new GoogleUrl();
        if($site != null)
        {
            $googleUrl->setParam('as_sitesearch', $site);
        }
        $googleUrl->setSearchTerm($term);
        $response = $googleClient->query($googleUrl);

        $result = [];
        foreach($response->getNaturalResults() as $r){
            $result[$r->title] = $r->url;
        }
        return !empty($result)? $result : '';
    }
}
