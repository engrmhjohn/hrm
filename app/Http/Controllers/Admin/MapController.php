<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Location;

class MapController extends Controller
{
    public function takeUrl()
    {
        return view('admin.map_coordinator.url');
    }

    public function getCoordinates(Request $request)
    {
        $url = $request->input('url');

        if (empty($url)) {
            return redirect(route('admin.manage.location'))->with('message', 'Invalid/Empty Link!');
        }

        $client = new Client();

        try {

            $response = $client->get($url);

            // Get the HTML content from the response
            $html = $response->getBody()->getContents();

            // Extract the latitude and longitude values using regular expressions
            $pattern = '/@([-0-9.]+),([-0-9.]+),/';
            preg_match($pattern, $html, $matches);

            if (count($matches) === 3) {
                $latitude = $matches[1];
                $longitude = $matches[2];

                // Create a new Location model instance and save the values
                $location = new Location();
                $location->url = $url;
                $location->latitude = $latitude;
                $location->longitude = $longitude;
                $location->save();

                // Pass the latitude and longitude values to the view
                return redirect(route('admin.manage.location'))->with('message', 'Successfully Added!');
            }

            throw new \Exception('Latitude and longitude not found in the URL.');
        } catch (\Exception $e) {
            // Handle any errors that occurred during the process
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function manageLocation() {
        return view('admin.map_coordinator.index', [
            'locations' => Location::all(),
        ]);
    }

    public function editUrl($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.map_coordinator.edit_url', compact('location'));
    }

    public function updateUrl(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $url = $request->input('url');

        if (empty($url)) {
            return redirect(route('admin.manage.location'))->with('message', 'Invalid/Empty Link!');
        }

        $client = new Client();

        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();

            $pattern = '/@([-0-9.]+),([-0-9.]+),/';
            preg_match($pattern, $html, $matches);

            if (count($matches) === 3) {
                $latitude = $matches[1];
                $longitude = $matches[2];

                $location->url = $url;
                $location->latitude = $latitude;
                $location->longitude = $longitude;
                $location->save();

                return redirect(route('admin.manage.location'))->with('message', 'Successfully updated!');
            }

            throw new \Exception('Latitude and longitude not found in the URL.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function deleteLocation($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect(route('admin.manage.location'))->with('message', 'Successfully Deleted!');
    }

    // ...
}
