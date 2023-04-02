<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Icon;

class ImageCollectController extends Controller
{

    public function cats()
    {
        // $cats = Category::take(4)->get();
        $cats  = Category::all();
        $count = $cats->count();
        echo $count, '<br>';
        foreach ($this->gen($cats) as $i => $cat) {
            // if ($i > 0) continue;
            echo '<br>', ($i + 1) . '================================================', '<br>';

            $rand    = round(rand(1, 100));
            $heroUrl = $this->makeImageUrl($rand, 1920, 1080);
            echo 'HERO STARTED.', '<br>';
            $hero = $this->scrape($heroUrl, "cats/{$cat->slug}", 'hero');

            $mainUrl = $this->makeImageUrl($rand, 600, 315);
            echo 'MAIN STARTED.', '<br>';
            $main = $this->scrape($mainUrl, "cats/{$cat->slug}", 'main');

            if (!$hero && !$main) continue;
        }
    }

    public function items()
    {
        // $items = Item::take(4)->get();
        $items = Item::all();
        $count = $items->count();
        echo $count, '<br>';
        foreach ($this->gen($items) as $i => $item) {
            echo '<br>', ($i + 1) . '================================================', '<br>';

            $rand    = round(rand(1, 100));
            $itemDir = "items/{$item->slug}";

            try {
                echo 'HERO STARTED.', '<br>';
                $heroUrl = $this->makeImageUrl($rand);
                $hero    = $this->scrape($heroUrl, $itemDir, 'hero');

                echo 'MAIN STARTED.', '<br>';
                $mainUrl = $this->makeImageUrl($rand, 600, 315);
                $main    = $this->scrape($mainUrl, $itemDir, 'main');
                foreach ($item->features as $j => $feature) {
                    echo '-------------------------------', '<br>';
                    echo "　{$i}-{$j} FEATURE STARTED.", '<br>';
                    $featureRand = round(rand(1, 100));
                    $featureUrl  = $this->makeImageUrl($featureRand, 600, 400);
                    $filename    = 'feature_' . ($j + 1);
                    $featureRes  = $this->scrape($featureUrl, $itemDir, $filename);

                    if (!$featureRes) {
                        continue 1;
                    }
                }
            } catch (\Exception $e) {
                if (file_exists($itemDir)) {
                    rmdir($itemDir);
                    echo $itemDir . ' DELETED.', '<br>';
                }
                echo ($i + 1) . ' SKIPPED.', '<br>';
                continue;
            }
        }
    }

    public function icons()
    {
        $icons = Icon::all();
        $count = $icons->count();
        echo $count, '<br>';
        foreach ($this->gen($icons) as $i => $icon) {
            echo '<br>', ($i + 1) . '================================================', '<br>';

            $rand    = round(rand(1, 100));
            $iconDir = "icons";

            try {
                echo 'ICON STARTED.', '<br>';
                $iconUrl = $this->makeImageUrl($rand, 64, 64);
                $icon    = $this->scrape($iconUrl, $iconDir, $icon->slug);
            } catch (\Exception $e) {
                echo ($i + 1) . ' SKIPPED.', '<br>';
                continue;
            }
        }
    }

    public function scrape($url, $dir, $filename)
    {
        echo $dir . ' STARTED.', '<br>';

        $img_dir = public_path() . "/images/{$dir}";
        $file    = $img_dir . "/{$filename}.jpg";

        if (file_exists($file)) {
            echo "{$file} ALREADY EXISTS", '<br>';
            return false;
        }

        if ($img_data = @file_get_contents($url)) {
            if (!is_dir($img_dir)) {
                echo "{$img_dir} NOT EXISTS", '<br>';
                mkdir($img_dir, 0777, true);
                echo "{$img_dir} CREATED", '<br>';
            }

            file_put_contents($file, $img_data);
            echo $file . ' CREATION SUCCESS', '<br>';
            return true;
        } else {
            throw new \Exception($url . ' COULD NOT GET.', 1);
        }
        $http_response_header = [];
    }

    public function makeImageUrl($rand = null, $width = 1200, $height = 630)
    {
        $url = "https://api.unsplash.com/photos/random?orientation=landscape&client_id=" . config('app.unsplash_access_key');
        echo $url, '<br>';
        $json = file_get_contents($url);
        $arr = json_decode($json, true);

        return $arr['urls']['regular'];
    }

    public function gen($models)
    {
        foreach ($models as $model) {
            yield $model;
        }
    }
}
