<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 28/09/2018
 * Time: 16:02
 */

    //header("Location: ". ROOT . '/calendar');

    $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
    $currentYear=0;
    $currentMonth=0;

    $currentDay=0;
    $currentDate=null;
    $daysInMonth=0;
    $naviHref = null;
    $naviQuery = null;
    $giornoSelezionato = 0;
    $startOfWeek = 0;
    $giorniDelMese = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    // echo $_POST["date"];

    if(isset($_POST["date"]))
        $giornoSelezionato = $_POST["date"];

    if(!isset($_POST['year']) && !isset($_POST['month']))
    {
        if(isset($_POST["date"]))
        {
            $year = date("Y", strtotime($_POST["date"]));
            $month = date("m", strtotime($_POST["date"]));

        }
        else
        {
            $year = date("Y",time());
            $month = date("m",time());
        }
    }
    else
    {
        if($_POST["date"] != null)
        {
            $year = date("Y", strtotime($_POST["date"]));
            $month = date("m", strtotime($_POST["date"]));

        }
        else
        {
            $year = $_POST['year'];
            $month = $_POST['month'];
        }
    }



    $currentYear=$year;
    $currentMonth=$month;
    $daysInMonth=_daysInMonth($month,$year);

    if($year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0))
        $giorniDelMese[1] = 29;

    $content='<form id="formCalendario" method="post" action="calendar"><input type="hidden" name="date" id="date"/><input type="hidden" name="month" id="month"/><input type="hidden" name="year" id="year"/><div id="calendar" class="row">'.
        '<div class="box col-xs-12 seven-cols">'. _createNavi($year, $month).
        '</div>'.
        '<div class="box-content col-xs-12">'.
        '<div class="labelNew row">
                        <div class="seven-cols">'._createLabels().'</div>
                    </div>';
    $content.='<div class="clear"></div>';
    $content.='<div class="dates cols-xs-12">';

    $weeksInMonth = _weeksInMonth($month,$year);
    // Create weeks in a month

    for( $i=0; $i<$weeksInMonth; $i++ )
        for($j=1;$j<=7;$j++)
            $content.=_showDay($i*7+$j, $currentMonth, $currentYear, $daysInMonth, $giorniDelMese);

    $content.='</div>';
    $content.='<div class="clear"></div>';
    $content.='</div>';
    $content.='</div></form>';
    echo $content;


    function _showDay($cellNumber, $currentMonth, $currentYear, $daysInMonth, $giorniDelMese)
    {
        global $currentDay, $startOfWeek, $giornoSelezionato;
        if($currentDay==0)
        {
            $firstDayOfTheWeek = date('N',strtotime($currentYear.'-'.$currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek))
                $currentDay=1;
        }

        if( ($currentDay!=0)&&($currentDay<=$daysInMonth) )
        {
            $currentDate = date('Y-m-d',strtotime($currentYear.'-'.$currentMonth.'-'.($currentDay)));
            $cellContent = $currentDay;
            $currentDay++;
        }
        else
        {
            $currentDate =null;
            $cellContent=null;
        }

        if($cellNumber%7==1)
            $string = "<div class='row seven-cols'>";
        else
            $string = "";

        if($currentDate == null)
            $string .= '<div id="li-" class="col-xs-1 text-center" style="visibility:hidden;">'.$cellContent.'</div>';
        else
        {
            if($startOfWeek == 0 || $cellNumber%7==1)
                $inizioRiga = " starterBox";
            else
                $inizioRiga = "";

            if($cellNumber%7==0 || $giorniDelMese[$currentMonth - 1] == $cellContent)
                $fineRiga = " enderBox";
            else
                $fineRiga = "";

            if($currentDate < Date('Y-m-d', time()))
                $string .= '<div id="li-'.$currentDate.'" class="col-xs-1 text-center' . $inizioRiga . $fineRiga . '" style="background-color: #AAAAAA; ">'.$cellContent.'</div>';
            else if(_isClosed($currentDate))
                $string .= '<div id="li-'.$currentDate.'" class="col-xs-1 text-center' . $inizioRiga . $fineRiga . '" style="background-color: rgb(255, 128, 0); ">'.$cellContent.'</div>';
            else if(_hasNoStagione($currentDate))
                $string .= '<div id="li-'.$currentDate.'" class="col-xs-1 text-center' . $inizioRiga . $fineRiga . '" style="background-color: rgb(64, 134, 51); ">'.$cellContent.'</div>';
            else
            {
                $string .= '<a onclick="invio(\''.$currentDate.'\');"><div id="li-'.$currentDate.'" class="';

                if(isset($_POST["date"]) && $_POST["date"] == $currentDate)
                    $string .= ' selezionato col-xs-1' . $inizioRiga . $fineRiga . ' text-center">'.$cellContent.'</div></a>';
                else
                    $string .= ' col-xs-1' . $inizioRiga . $fineRiga . ' text-center">'.$cellContent.'</div></a>';
            }

            $startOfWeek++;
        }
        if($cellNumber%7==0)
            $string .= "</div>";

        return $string;
    }


    function _createNavi($currentYear, $currentMonth)
    {
        $mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $nextMonth = $currentMonth==12?1:intval($currentMonth)+1;
        $nextYear = $currentMonth==12?intval($currentYear)+1:$currentYear;
        $preMonth = $currentMonth==1?12:intval($currentMonth)-1;
        $preYear = $currentMonth==1?intval($currentYear)-1:$currentYear;

        return
            '<div class="header row">'.
            '<a class="prev col-xs-2 text-center" onclick="invio1(\''.sprintf('%02d',$preMonth).'\', \''.$preYear.'\');">Prev</a>'.
            '<span class="title col-xs-8 text-center">'.date('Y',strtotime($currentYear.'-'.$currentMonth.'-1')) . " " . $mesi[date('n',strtotime($currentYear.'-'.$currentMonth.'-1')) - 1] . '</span>'.
            '<a class="next col-xs-2 text-center" onclick="invio1(\''.sprintf('%02d',$nextMonth).'\', \''.$nextYear.'\');">Next</a>'.
            '</div>';


    }

    /**
     * create calendar week labels
     */
    function _createLabels()
    {
        $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
        $content='';

        for($i = 0; $i < 7; $i++)
        {
            $content.='<div class="title col-xs-1" style="text-align: center;">'.$dayLabels[$i].'</div>';
        }

        return $content;
    }

    /**
     * calculate number of weeks in a particular month
     */
    function _weeksInMonth($month,$year)
    {
        if( null==($year) )
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        // find number of days in this month
        $daysInMonths = _daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay)
            $numOfweeks++;

        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    function _daysInMonth($month,$year)
    {

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }
        
    function _isClosed($day)
    {
        return false;
    }
    
    function _hasNoStagione($day)
    {
        return false;
    }
?>