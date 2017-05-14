<?php
namespace Drupal\gplaces\Controller;
use Drupal\Core\Url;
// Change following https://www.drupal.org/node/2457593
use Drupal\Component\Utility\SafeMarkup;

// Pull in joshtronic google places php wrapper
use joshtronic\GooglePlaces;

/**
 * Controller routines for GPlaces pages.
 */
class GPlacesController
{
    /**
     * Carries out a standard Google Places search with the search srting passed
     * This callback is mapped to the path
     * 'gplaces/search/{searchstr}'.
     *
     * @param string $searchstr
     *   the string to be used to carry out the Google Places search
     * @return array $search_results
     */
    public function search($searchstr)
    {
        // Default settings.
        $config = \Drupal::config('gplaces.settings');
        // Page title and Google Places API key.
        $page_title = $config->get('gplaces.page_title');
        $api_key = $config->get('gplaces.google_places_api_key');

        // TODO Perform Google Plces search here

        // initialise a Joshtronic/GooglePlaces instance
        $jt_google_places = new GooglePlaces($api_key);


        $jt_google_places->location = array(-33.86820, 151.1945860);
        $jt_google_places->radius   = 800;
        $results                    = $jt_google_places->nearbySearch();

        //put results into an array for page display
        $element['#search_results'] = array();

        $element['#search_results'][] = 'Reasult One ' . $searchstr;
        $element['#search_results'][] = 'Result Two' . $api_key;
        //$element['#search_results'][] = $results;

        $element['#title'] = SafeMarkup::checkPlain($page_title);
        $element['#theme'] = 'gplaces';

        return $element;
    }
}