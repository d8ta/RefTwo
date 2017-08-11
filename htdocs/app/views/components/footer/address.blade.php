<?php
$location = \Project\Models\Location::getDefault();
?>

<address class="address">
    <div class="address__headline">{{$location->getTitle()}}</div>
    <div class="address__text editor-content">
        <p>
    	    @if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
            <span>{!!$location->getStreet()!!}</span><br>
            <span class="headquarters__locations__location__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
            <span><?php echo __('Tel'); ?>: {{$location->getTel()}}</span><br>
            @if($location->getFax() && strlen($location->getFax()))<span><?php echo __('Fax'); ?>: {{$location->getFax()}}</span><br>@endif
            <?php echo __('E-Mail'); ?>: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
        </p>
    </div>
    
</address>


