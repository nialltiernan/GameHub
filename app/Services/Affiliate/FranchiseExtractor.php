<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

class FranchiseExtractor
{

    private const KNOWN_BRANDS = ['lego', 'fifa', 'nfl', 'ea sport', 'nba', 'world of warships'];
    private string $title;

    public function execute(string $title): string
    {
        $this->title = strtolower($title);
        return $this->transformTitleToBrand();
    }

    private function transformTitleToBrand(): string
    {
        $knownBrand = $this->checkForKnownBrands();
        if ($knownBrand) {
            return $knownBrand;
        }

        $this->removeThe();
        $this->convertRomanNumeralsToDecimal();
        $this->removeSuffixSubTitle();
        $this->removeSuffixHD();
        $this->removeSuffixNumber();
        $this->removeSuffixYear();

        return $this->title;
    }

    private function checkForKnownBrands(): ?string
    {
        foreach (self::KNOWN_BRANDS as $brand)
        {
            if ($this->doesTitleContainBrandName($brand)) {
                return $brand;
            }
        }
        return null;
    }

    private function doesTitleContainBrandName(string $brand): bool
    {
        return strpos($this->title, $brand) !== false;
    }

    private function removeThe()
    {
        $this->title = str_replace('the ', '', $this->title); // remove "the"
    }

    private function convertRomanNumeralsToDecimal()
    {
        $this->title = str_replace(' ii:', ' 2:', $this->title);
        $this->title = str_replace(' iii:', ' 3:', $this->title);
        $this->title = str_replace(' iv:', ' 4:', $this->title);
        $this->title = str_replace(' v:', ' 5:', $this->title);
        $this->title = str_replace(' vi:', ' 6:', $this->title);
        $this->title = str_replace(' vii:', ' 7:', $this->title);
        $this->title = str_replace(' iix:', ' 8:', $this->title);
        $this->title = str_replace(' ix:', ' 9:', $this->title);
        $this->title = str_replace(' x:', ' 10:', $this->title);
        $this->title = str_replace(' xi:', ' 11:', $this->title);
        $this->title = str_replace(' xii:', ' 12:', $this->title);
        $this->title = str_replace(' xiii:', ' 13:', $this->title);
        $this->title = str_replace(' xiv:', ' 14:', $this->title);
        $this->title = str_replace(' xv:', ' 15:', $this->title);
        $this->title = str_replace(' xvi:', ' 16:', $this->title);
        $this->title = str_replace(' xvii:', ' 17:', $this->title);
        $this->title = str_replace(' xviii:', ' 18:', $this->title);
        $this->title = str_replace(' xviv:', ' 19:', $this->title);
        $this->title = str_replace(' xx:', ' 20:', $this->title);

        $this->title = (string) preg_replace('( ii$)', '', $this->title);
        $this->title = (string)  preg_replace('( iii$)', '', $this->title);
        $this->title = (string) preg_replace('( iv$)', '', $this->title);
        $this->title = (string) preg_replace('( v$)', '', $this->title);
        $this->title = (string) preg_replace('( vi$)', '', $this->title);
        $this->title = (string) preg_replace('( vii$)', '', $this->title);
        $this->title = (string) preg_replace('( viii$)', '', $this->title);
        $this->title = (string) preg_replace('( ix$)', '', $this->title);
        $this->title = (string) preg_replace('( x$)', '', $this->title);
        $this->title = (string) preg_replace('( xi$)', '', $this->title);
        $this->title = (string) preg_replace('( xii$)', '', $this->title);
        $this->title = (string) preg_replace('( xiii$)', '', $this->title);
        $this->title = (string) preg_replace('( xiv$)', '', $this->title);
        $this->title = (string) preg_replace('( xv$)', '', $this->title);
        $this->title = (string) preg_replace('( xvi$)', '', $this->title);
        $this->title = (string) preg_replace('( xvii$)', '', $this->title);
        $this->title = (string) preg_replace('( xviii$)', '', $this->title);
        $this->title = (string) preg_replace('( xiv$)', '', $this->title);
        $this->title = (string) preg_replace('( xx$)', '', $this->title);
    }

    private function removeSuffixSubTitle()
    {
        $this->title = (string) preg_replace('( \d: .*$) ', '', $this->title); // witcher 2: assassins of kings
        $this->title = (string) preg_replace('(\d: .*$) ', '', $this->title); // runner2: future legend of rhythm alien
        $this->title = (string) preg_replace('(: episode .*$)', '', $this->title); // tales from borderlands: episode 2 - atlas mugged
        $this->title = (string) preg_replace('(: season .*$)', '', $this->title); // walking dead: season two - episode: a house divided
        $this->title = (string) preg_replace('(: .*$)', '', $this->title); // dark souls: prepare to die edition
    }

    private function removeSuffixHD()
    {
        $this->title = (string) preg_replace('( hd$)', '', $this->title);
    }

    private function removeSuffixNumber()
    {
        $this->title = (string) preg_replace('( \d$) ', '', $this->title); // Halo 2 => Halo
    }

    private function removeSuffixYear()
    {
        $this->title = (string) preg_replace('( 2k\d\d$)', '', $this->title); // NBA 2K14
        $this->title = (string) preg_replace('( 2k\d$)', '', $this->title); // College Hoops 2K8
        $this->title = (string) preg_replace('( \'\d\d$)', '', $this->title); // MotoGP '06
        $this->title = (string) preg_replace('( 20\d\d$)', '', $this->title); // Pro Evolution Soccer 2014
        $this->title = (string) preg_replace('( \d\d$)', '', $this->title); // Pro Evolution Soccer 14
    }
}
