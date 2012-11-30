<?php /* Template Name: Campaign2012 */ ?>
<?php get_header(); ?>
<style type="text/css">
#travelpictures-container {
    float:left;
    margin-right: 30px;
}
h1 {
    color: #666769;
    text-align:center;
    font-size: 20px;
}
h1#top-header {
    font-size: 3em;
}
.landingpage h1 {
    font-size: 3em;
    text-align: left;
}
.landingpage h1, .landingpage h2, .landingpage h3 {
    color: #e06657;
    padding-bottom: 5px;
    padding-top: 20px;
    margin-bottom: 5px;
}

.landingpage p {
    margin-top: 0;
}
</style>

<div id="content">
    <div class="page col-full">
        <section id="main" class="col-left" id="campaign2012">
            <h1 id="top-header">Vi ønsker jer en rigtig god rejse!</h1>

            <div id="travelpictures-container">
                <img src="<?php bloginfo('template_directory'); ?>/images/feriebilleder.jpg" alt="" />
            </div>
            <div class="landingpage">
                <h1>Online booking</h1>
                 Her kan du bestille tid direkte i et af vores 25 vaccinationscentre. Vi har åbent dag, aften og weekends så du ikke behøver tage fri fra job eller hive børnene ud af skolen.
                <h2>Hvor skal I hen?</h2>
                 Her kan du se hvilke vaccinationer der anbefales til dit rejsemål.
                <h2>1/2 pris hvis du er medlem af Danmark</h2>
                 Du får 50% tilskud uanset hvilken gruppe du er medlem af. <a href="/Sikkerrejse/Vacciner/Sygeforsikringen-danmark.aspx">Læs mere her.</a>
                <h2>Alle kan blive vaccineret hos os</h2>
                 Vi har gjort rejsevaccination enkelt og moderne. Du behøver ingen henvisning fra egen læge elller lignende. Du bestiller blot en tid og så klarer vi resten. <img style="float: right;" src="<?php bloginfo('template_directory'); ?>/images/dlvs_logo_long.png" alt="" />
            </div>
    </div>
</div>

<?php get_footer(); ?>
