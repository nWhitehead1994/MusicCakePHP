<h1>Edit Music</h1>
<?php
    echo $this->Form->create($music);
    echo $this->Form->control('artist');
    echo $this->Form->control('title');
    echo $this->Form->control('genre');
    echo $this->Form->control('year');
    echo $this->Form->button(__('Save Music'));
    echo $this->Form->end();
?>