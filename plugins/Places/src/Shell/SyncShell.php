<?php
namespace Places\Shell;

use Cake\Console\Shell;
use GuzzleHttp\Client;

/**
 * Sync shell command.
 */
class SyncShell extends Shell
{
    public function hotels()
    {
        $this->loadModel('Places.Places');

        $this->out('Starting hotels sync!');
        $this->hr();

        $api = new Client();
        $result = $api
            ->get('http://hotel.qantas.com.au/api/v1/search.json?&adults=1&children=0&infants=0&location=melbourne&daysToCheckIn=21&numberOfNights=1&sortBy=deals&sortDir=asc&limit=12')
            ->json();

        foreach ($result['results'] as $r) {
            $data = [
                'category_id' => 1,
                'api_id'      => $r['property_id'],
                'title'       => $r['name'],
                'address'     => "{$r['street_address']}, {$r['suburb']}",
                'image_url'   => $r['card_image_url'],
                'rating'      => (float)$r['rating'],
                'price'       => (int)$r['lowest_total_cost_of_stay'],
                'lat'         => $r['latitude'],
                'lng'         => $r['longitude'],
            ];

            if (!$place = $this->Places->findByCategoryIdAndApiId(1, $data['api_id'])->first()) {
                $place = $this->Places->newEntity();
                $this->out("New hotel \"{$data['title']}\" created");
            } else {
                $this->out("Hotel #{$place->id} \"{$data['title']}\" updated");
            }

            $place = $this->Places->patchEntity($place, $data);
            $this->Places->save($place);
        }

        $this->hr();
        $this->out('Finished!');

    }
}
