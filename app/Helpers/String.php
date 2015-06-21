<?php namespace App\Helpers;

class String
{
    private static $charMap =
    [
      'e' => ['é','è','ê','ë','É','È','Ê','Ë'],
      'a' => ['à','â','À','Â'],
      'c' => ['ç']
    ];

    public static function slugify ( $string )
    {
      foreach ( self::$charMap as $normalized => $charSet )
      {
        $string = str_replace( $charSet, $normalized, $string );
      }

      // replace non letter or digits by -
      $string = preg_replace('~[^\\pL\d]+~u', '-', $string);

      // trim
      $string = trim($string, '-');

      // transliterate
      $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

      // lowercase
      $string = strtolower($string);

      // remove unwanted characters
      $string = preg_replace('~[^-\w]+~', '', $string);

      if (empty($string))
      {
        return 'n-a';
      }

      return $string;
    }

}