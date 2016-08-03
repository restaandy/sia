<?php
if( !function_exists('encode_url') ) {

 function encode_url($string, $url_safe=TRUE)
{

    $ret = $this->encrypt->encode($string);

    if ($url_safe)
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }

    return $ret;
}
}
if( !function_exists('decode_url') ) {
    
  function decode_url($string)
{
        
    $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

    return $this->encrypt->decode($string);
}
}
?>