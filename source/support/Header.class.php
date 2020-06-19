<?php

namespace Source\support;

class Header{
   public static function headConfig(){
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Academic Register</title>
        <link rel='stylesheet href='../css/estilo.css'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    </head>";
   }

   public static function headerSimples(){
       echo "
            <header>
                <nav class='navbar scrolling-navbarnavbar-default navbar-static-top text-light bg-primary'>
                    
                    <div class='navbar-brand'>
                        <a class='navbar-brand text-white' href='#'>
                            <img src='https://images.vexels.com/media/users/3/153709/isolated/preview/9e60d6f09cfb53076bf8fdefaf01a3ce---cone-de-tra--ado-de-chap--u-de-formatura-by-vexels.png' width='30' height='30' class='d-inline-block align-top' alt='' loading='lazy'>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            Academic Register
                        </a>
                    </div>
                    
                </nav>
            </header>";        
   }
}