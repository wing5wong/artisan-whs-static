@extends('_layouts.standard')
@section('title', 'Chicago')
@section('content')
    <style>
        @font-face {
            font-family: BOD_I;
            src: url("/assets/production_chicago/BOD_I.ttf") format("truetype");
        }

        @font-face {
            font-family: MinionPro;
            font-weight: bold;
            src: url("/assets/production_chicago/MinionPro-Regular.otf") format("opentype");
        }

        @font-face {
            font-family: LTCBodoni;
            src: url("/assets/production_chicago/LTC Bodoni 175 W01 Regular.ttf") format("truetype");
        }

        @font-face {
            font-family: AlkalineBold;
            font-weight: bold;
            src: url("/assets/production_chicago/AlkalineBold.otf") format("opentype");
        }

        .chicago {
            font-family: LTCBodoni
        }

        .header {
            border-top: 4px solid #111;
            border-bottom: 4px solid #111;
            font-family: AlkalineBold;
            text-align: center;
            padding: 0.3em;
            margin-bottom: 1em;

        }

        .header-gold {
            color: #ca974d
        }

        .header-purple {
            color: #733b96
        }

        .purple-circle {
            border-radius: 50px;
            background-color: #733b96;
            display: block;
            color: #fff;
        }
    </style>
    <div class="chicago">
        <img src="/assets/production_chicago/header with credits_black.png" alt="">

        <img src="/assets/production_chicago/chicago header_gold.png" alt="">



        <h2 class="header header-gold">Performances</h2>
        WEDNESDAY, 7th of May
        THURSDAY, 8 of May
        FRIDAY, 9th of May
        Venue: ROYAL WHANGANUI OPERA HOUSE

        <h2 class="header header-gold">Summary</h2>
        In "Roaring Twenties" Chicago, chorine Roxie Hart murders
        a faithless lover and convinces her hapless husband, Amos, to
        take the rap ... until he finds out he's been duped and turns on
        Roxie. Convicted and sent to death row, Roxie and another
        "Merry Murderess," Velma Kelly, vie for the spotlight and
        the headlines, ultimately joining forces in search of the
        "American Dream": fame, fortune, and acquittal.
        CONTENT WARNINGS: PG11 +
        Adult Themes, Drinking, Drugs & Smoking, Mild Language, Depictions
        of Violence/Death, Sexual Content


        <h2 class="header header-gold">Cast List</h2>

        <h2 class="header header-gold">Character Descriptions</h2>

        <h2 class="header header-gold">History</h2>
        Chicago first opened on Broadway at the 46th Street Theatre
        in New York City on June 3, 1975. The production, directed
        and choreographed by Bob Fosse, ran for 936 performances.
        On Nov 14, 1996, a revival of the show opened on Broadway
        at the Richard Rodgers Theatre. It later transferred to
        Shubert Theatre, and then to the Ambassador Theatre,
        where, more than two decades later, it continues to run,
        logging nearly 10,000 performances


        <h2 class="header header-purple">"WHS Production Contract</h2>

        <h2 class="header header-gold">Important Dates</h2>
        AUDITIONS - October 18TH 2024 2PM -5PM
        CAST LIST POSTED - OCTOBER 25TH

        <div class="purple-circle">
            PLEASE JOIN
            CHICAGO - WHS PRODUCTION '25
            FACEBOOK PAGE FOR
            The Latest Rehearsal Information
        </div>
        BY ARRANGEMENT WITH ORiGiN™ THEATRICAL
        ON BEHALF OF SAMUEL FRENCH, A Concord Theatricals Company

    </div>
@endsection
