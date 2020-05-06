<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Driver;
use DB;
class SteamController extends Controller
{

  

    public function check(){

    //Get all Users from DB 
         
    
    $query = Driver::select('*')
            ->get()->load('user')->toArray();

            $count = count($query);
         

    $key = env('STEAM_API_KEY');

     for( $i=0; $i<$count; $i++)
    {
        // Parsing the URL to trim it 
       $url = parse_url($query[$i]['user']['steam_id']);

        if(strpos($url['path'],'profile'))  // Checking Which type of steam link is provider 
         {
         $trim = trim($url['path'],'/profiles');  // Trimming the Url string
        
        // Calling the Steam API to fetch the latest username 
        $connect = curl_init();
        curl_setopt($connect,CURLOPT_URL,'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$key.'&steamids='.$trim);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        $str = curl_exec($connect);  
        curl_close ($connect);
        $json = json_decode($str,true);

      if($json['response']['players']==NULL)
      {
          echo "Invalid Steam ID";
      }
      else
      {
      $checkalias=$json['response']['players']['0']['personaname'];

      echo "<br>".$checkalias." Driver id ".$query[$i]['id']."<br>";
      }
      }



      // Handling Vanity Urls



      
      elseif(strpos($url['path'],'id')) {

        
        // Resolving Vanity URL to Steamid64

        $trim = trim($url['path'],'/id');
        $connect = curl_init();
        curl_setopt($connect,CURLOPT_URL,'https://api.steampowered.com/ISteamUser/ResolveVanityURL/v1/?key='.$key.'&vanityurl='.$trim);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        $str = curl_exec($connect);  
        $httpCode = curl_getinfo($connect, CURLINFO_HTTP_CODE);
        curl_close ($connect);
        $json = json_decode($str,true);

         if($json['response']['success']==1)
           {
         $steam64 = $json['response']['steamid'];

            $connect = curl_init();
            curl_setopt($connect,CURLOPT_URL,'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$key.'&steamids='.$steam64);
            curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
            $str = curl_exec($connect);  
            curl_close ($connect);
            $json = json_decode($str,true);
           
           $checkalias=$json['response']['players']['0']['personaname'];
     
           echo "<br>".$checkalias . " Driver id ". $query[$i]['id']."<br>";
       }
       else
       {
           echo "Invalid Vanity URL";
       }
    
      }

      else
      {
          echo "Invalid URL";
      }
    


   }
    }

  
}
