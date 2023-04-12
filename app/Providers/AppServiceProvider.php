<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SystemInformation;
use Illuminate\Support\Facades\Blade;
use App\Models\Ngostatus;
use App\Models\Renew;
use App\Models\Namechange;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $ongoingNgoStatus = Ngostatus::where('status','Ongoing')->latest()->get();
        $ongoingNgoRenewStatus = Renew::where('status','Ongoing')->latest()->get();
        $ongoingNgoNameChangeStatus = Namechange::where('status','Ongoing')->latest()->get();


        Blade::directive('numberToWord', function ($num) {

            $num  = ( string ) ( ( int ) $num );

            if( ( int ) ( $num ) && ctype_digit( $num ) )
            {
                $words  = array( );

                $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

                $list1  = array('','one','two','three','four','five','six','seven',
                    'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                    'fifteen','sixteen','seventeen','eighteen','nineteen');

                $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                    'seventy','eighty','ninety','hundred');

                $list3  = array('','thousand','million','billion','trillion',
                    'quadrillion','quintillion','sextillion','septillion',
                    'octillion','nonillion','decillion','undecillion',
                    'duodecillion','tredecillion','quattuordecillion',
                    'quindecillion','sexdecillion','septendecillion',
                    'octodecillion','novemdecillion','vigintillion');

                $num_length = strlen( $num );
                $levels = ( int ) ( ( $num_length + 2 ) / 3 );
                $max_length = $levels * 3;
                $num    = substr( '00'.$num , -$max_length );
                $num_levels = str_split( $num , 3 );

                foreach( $num_levels as $num_part )
                {
                    $levels--;
                    $hundreds   = ( int ) ( $num_part / 100 );
                    $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                    $tens       = ( int ) ( $num_part % 100 );
                    $singles    = '';

                    if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
                {
                    $commas = $commas - 1;
                }

                $words  = implode( ', ' , $words );

                $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
                if( $commas )
                {
                    $words  = str_replace( ',' , ' and' , $words );
                }
            }else if( ! ( ( int ) $num ) ){
                $words = 'Zero';
            }else{
                $words = '';
            }

            return $words;
        });



        $icon_name = SystemInformation::value('icon');
        $logo_name = SystemInformation::value('logo');
        $ins_name = SystemInformation::value('System_name');
        $ins_add = SystemInformation::value('Address');

        $ins_vat = SystemInformation::value('vat');

        $ins_phone = SystemInformation::value('Phone');



        view()->share('ongoingNgoStatus', $ongoingNgoStatus);
        view()->share('ongoingNgoRenewStatus', $ongoingNgoRenewStatus);
        view()->share('ongoingNgoNameChangeStatus', $ongoingNgoNameChangeStatus);



        view()->share('ins_name', $ins_name);
        view()->share('logo',  $logo_name);
        view()->share('icon', $icon_name);
        view()->share('ins_add', $ins_add);
        view()->share('ins_phone', $ins_phone);
        view()->share('ins_vat', $ins_vat);
    }
}
