{if $page_name == 'index'}
    <div class="main-content container">
        <div class="row">
            <div class="image keys"> </div>
            <div class="image bulb"> </div>

            <div class="main-description">
                <h1> {$bleboxTopSliderData->title} </h1> 
                <h2> {$bleboxTopSliderData->subtitle} </h2>
                <a href="{$bleboxTopSliderData->button_uri}" class="button button-rounded blue"> {$bleboxTopSliderData->button_text} </a>
            </div>

            <div class="image ipad"> </div>
            <div class="image phone"> </div>
        </div>
    </div> 
{/if}